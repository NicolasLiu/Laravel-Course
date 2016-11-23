<template>
    <div class="quill-editor">
        <slot></slot>
    </div>
</template>

<script>
import Quill from 'quill'

var toolbarOptions = [
  ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
  ['blockquote', 'code-block'],

  //[{ 'header': 1 }, { 'header': 2 }],               // custom button values
  [{ 'list': 'ordered'}, { 'list': 'bullet' }],
  [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
  [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
  //[{ 'direction': 'rtl' }],                         // text direction

  //[{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
  [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

  [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
  //[{ 'font': [] }],
  [{ 'align': [] }],
  ['link', 'image', 'video'],
  ['clean']                                         // remove formatting button
];

export default {

  props: {
    options: {
      type: Object,
      default: () => ({
        modules: {
          toolbar: toolbarOptions
        },
        theme : 'snow'
      })
    },
    autofocus: Boolean
  },

  data () {
    return {
      focused: this.autofocus,
      editor: null
    }
  },

  mounted () {
    this.editor = new Quill(this.$el, this.options)
  },

  watch: {
    focused (val) {
      this.editor[val ? 'focus' : 'blur']()
    }
  }

}
</script>

<style lang="stylus">
@import '~quill/assets/snow'
</style>
