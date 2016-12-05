<template>
    <div v-html="output"></div>


</template>

<script>

export default {
  props: {
    content: {
      type: String,
      required:true
    }
  },
  computed: {
    output: function () {
      var marked = require('marked');
      marked.setOptions({
        highlight: function (code) {
        return require('highlight.js').highlightAuto(code).value;
      }
      });
      return marked(this.content);
    }
  }
}
</script>




