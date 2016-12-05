<template>
    <div>
        <textarea v-bind:id="editor" v-bind:name="id"></textarea>
        <input type="hidden" v-bind:name="format" value="markdown">
    </div>


</template>

<script>
import SimpleMDE from 'simplemde';

export default {
  props: {
    id: {
      type: String,
      required: true
    },
    placeholder: String,
    content: String,
  },
  data () {
    return {
      editor: this.id + "_editor",
      format: this.id + "_format"
    }
  },
  mounted () {
    if(!window.hljs) {
        window.hljs = require('../highlight.min.js');
    }
    var simplemde = new SimpleMDE({
        element: document.getElementById(this.editor),
        autoDownloadFontAwesome: false,
        autosave: {
            enabled: true,
            uniqueId: this.id,
            delay: 1000,
        },
        initialValue: this.content,
        hideIcons: ["guide"],
        placeholder: this.placeholder,
        spellChecker: false,
        renderingConfig: {
            singleLineBreaks: false,
            codeSyntaxHighlighting: true,
        },
        status: false,
    });
  }
}
</script>

<style lang="css">
    @import '../../sass/simplemde.min.css';
    @import '../../sass/github-style.min.css';
</style>
<style lang="scss">

@import "../../sass/utilities/variables";

.CodeMirror {
    height: 300px;
}
.editor-toolbar.fullscreen {
    top: 50px;
    z-index: $zindex-markdown;
}
.CodeMirror-fullscreen {
    top: 100px;
    z-index: $zindex-markdown;
}
.editor-preview-side {
    top: 100px;
    z-index: $zindex-markdown;
}
</style>


