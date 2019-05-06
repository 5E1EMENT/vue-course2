<template>
<div id="app">
  <one></one>
  <two></two>
</div>

</template>

<script>
import one from './components/one'
import two from './components/two'
export default {
  data () {
    return {
      text: 'some text',
      red: 'red'
    }
  },
  computed: {

  },
  methods: {
  },
  components: {
    one, two
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
