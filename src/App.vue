<template>
<div id="app">
  <ul>
    <li v-for="(el, key) in text" :key="key"> {{el}}</li>
  </ul>
</div>

</template>

<script>
import myMixin from './mixins/test'
export default {
  mixins: [myMixin],
  computed: {
  },
  methods: {
  },
  components: {
  }

}
</script>

<style scoped>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
.red {
  color: red
}
.green {
  color: green
}
</style>
