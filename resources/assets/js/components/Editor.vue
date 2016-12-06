<template>
    <div>
        <div ref="quill" class="quill-editor"></div>
        <input type="hidden" v-bind:name="editor" v-bind:value="editorcontent">
        <input type="hidden" v-bind:name="format" value="richtext">
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

  [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
  //[{ 'header': [1, 2, 3, 4, 5, 6, false] }],

  [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
  //[{ 'font': [] }],
  [{ 'align': [] }],
  ['link', 'image', 'video'],
  ['clean']                                         // remove formatting button
];

export default {

  props: {
    id: {
      type: String,
      required: true
    },
    content: {
      type: String,
      default: null
    },
    readonly: {
      type: Boolean,
      default: false
    },
    autofocus: Boolean
  },

  data () {
    return {
      focused: this.autofocus,
      quill: null,
      editor: this.id + "_editor",
      format: this.id + "_format"
    }
  },
  computed: {
    options: function () {
      if(this.readonly == true) {
        return {
          modules: {
            toolbar: null
          },
          readOnly: true
        };
      }
      return {
        modules: {
          toolbar: toolbarOptions
        },
        theme : 'snow',
      };
    },
    editorcontent: function () {
      if(this.quill == undefined) {
        return "";
      }
      return JSON.stringify(this.quill.getContents());
    }
  },
  mounted () {
    this.quill = new Quill(this.$refs.quill, this.options);
    this.quill.setContents(JSON.parse(this.content));
  },

  watch: {
    focused (val) {
      this.quill[val ? 'focus' : 'blur']()
    }
  }

}
</script>

<style lang="stylus">
@import '~quill/assets/snow'
.ql-container.ql-snow
  height: 300px
</style>
