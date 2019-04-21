<template>
  <div>
    <h1>{{title}}</h1>
    <hr>
    <slot></slot>
    <hr>
    <div>Created by <h2>{{author}}</h2> and last edited at <span>{{date}}</span></div>
    <div :style="{background: theme_color}"> <b>{{category}}</b></div>
  </div>
</template>

<script>
export default {
  name: 'reading',
  props: ['title', 'author', 'date', 'category', 'theme_color'],
  data () {
    return {
    }
  },
  methods: {
  }
}
</script>

<style scoped>

</style>
