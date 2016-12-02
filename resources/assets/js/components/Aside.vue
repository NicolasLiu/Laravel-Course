<template>
  <div class="aside animated slideInLeft"
    v-bind:style="{width:width + 'px'}"
    v-bind:class="{
    left:placement === 'left',
    right:placement === 'right'
    }"
    v-show="show"
    :transition="(this.placement === 'left') ? 'slideleft' : 'slideright'">
    <div class="aside-dialog">
      <div class="aside-content">
        <div class="aside-body">
          <slot></slot>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {coerce, getScrollBarWidth} from '../utils/utils.js'
import $ from '../utils/NodeList.js'

export default {
  props: {
    placement: {
      type: String,
      default: 'right'
    },
    width: {
      type: Number,
      coerce: coerce.number,
      default: 300
    }
  },
  data () {
    return {
      show: false
    }
  },
  watch: {
    show (val) {
      const body = document.body
      const scrollBarWidth = getScrollBarWidth()
      if (val) {
        if (!this._backdrop) {
          this._backdrop = document.createElement('div')
        }
        this._backdrop.className = 'aside-backdrop'
        body.appendChild(this._backdrop)
        body.classList.add('modal-open')
        if (scrollBarWidth !== 0) {
          body.style.paddingRight = scrollBarWidth + 'px'
        }
        // request property that requires layout to force a layout
        var x = this._backdrop.clientHeight
        this._backdrop.classList.add('in')
        $(this._backdrop).on('click', () => this.close())
      } else {
        $(this._backdrop).on('transitionend', () => {
          $(this._backdrop).off()
          try {
            body.classList.remove('modal-open')
            body.style.paddingRight = '0'
            body.removeChild(this._backdrop)
            this._backdrop = null
          } catch (e) {}
        })
        this._backdrop.className = 'aside-backdrop'
      }
    }
  },
  methods: {
    close () {
      this.show = false
    }
  },

  created () {
    (this.$root).aside = this;
    (this.$root).$on('showaside', function () {
      this.aside.show = !this.aside.show
    })
  }
}
</script>


