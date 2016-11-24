<template>
<div class="container is-full" v-bind:style="{background: 'url(' + image +') center center / cover no-repeat fixed', overflow: 'hidden'}">
    <slot></slot>
</div>
</template>

<script>
  export default {
    props: {
      image: String,
      required: true
    }
  }
</script>

