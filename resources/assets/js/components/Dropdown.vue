<template>
    <li v-if="isLi" ref="dropdown" :class="classes">
        <slot name="button">
            <a class="dropdown-toggle" role="button" :class="{disabled: disabled}" @keyup.esc="show = false">
                {{ text }}
                <span class="caret"></span>
            </a>
        </slot>
        <ul class="dropdown-menu">
            <slot></slot>
        </ul>

    </li>
    <div v-else ref="dropdown" :class="classes">
        <slot name="before"></slot>
        <slot name="button">
            <button type="button" :class="buttonClassObject" @keyup.esc="show = false" :disabled="disabled">
                {{ text }}
                <span class="caret"></span>
            </button>
        </slot>
        <slot name="dropdown-menu">
            <ul class="dropdown-menu">
                <slot></slot>
            </ul>
        </slot>
    </div>
</template>
<script>
import {coerce} from '../utils/utils.js'
import $ from '../utils/NodeList.js'

export default {
  props: {
    show: {
      twoWay: true,
      type: Boolean,
      coerce: coerce.boolean,
      default: false
    },
    'class': null,
    disabled: {
      type: Boolean,
      coerce: coerce.boolean,
      default: false
    },
    text: {
      type: String,
      default: null
    },
    type: {
      type: String,
      default: 'default'
    }
  },
  computed: {
    buttonClassObject () {
      const { type } = this
      var rtn = {
        'button': true,
        'dropdown-toggle': true
      }
      rtn['is-'+type] = type
      return rtn
    },
    classes () {
      return [{open: this.show, disabled: this.disabled}, this.class, this.isLi ? 'dropdown' : this.inInput ? 'input-group-btn': 'btn-group']
    },
    inInput () { return this.$parent._input },
    isLi () { return this.$parent._navbar || this.$parent.menu || this.$parent._tabset },
    menu () {
      return !this.$parent || this.$parent.navbar
    },
    submenu () {
      return this.$parent && (this.$parent.menu || this.$parent.submenu)
    },
    slots () {
      return this._slotContents
    }
  },
  methods: {
    blur () {
      this.unblur()
      this._hide = setTimeout(() => {
        this._hide = null
        this.show = false
      }, 100)
    },
    unblur () {
      if (this._hide) {
        clearTimeout(this._hide)
        this._hide = null
      }
    }
  },
  mounted () {
    const $el = $(this.$refs.dropdown)
    $el.onBlur((e) => { this.show = false })
    $el.findChildren('.dropdown-toggle').on('click', e => {
      e.preventDefault()
      if (this.disabled) { return false }
      this.show = !this.show
      return false
    })
    $el.findChildren('ul').on('click', 'li>a', e => { this.show = false })
  },
  beforeDestroy () {
    const $el = $(this.$refs.dropdown)
    $el.offBlur()
    $el.findChildren('a,button').off()
    $el.findChildren('ul').off()
  }
}
</script>

<style scoped>
.secret {
  position: absolute;
  clip: rect(0 0 0 0);
  overflow: hidden;
  margin: -1px;
  height: 1px;
  width: 1px;
  padding: 0;
  border: 0;
}
</style>