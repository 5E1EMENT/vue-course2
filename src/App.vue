<template>
<div id="app">
  <input type="text" v-model="text">
  <h2 :class="red">{{text}}</h2>

  <router-view></router-view>
  <router-link :to="{name: 'first', params:{msg:'HELLO'}}"><button class="btn btn-dark">1</button></router-link>
  <router-link :to="{name: 'second'}"><button class="btn btn-dark">2</button></router-link>
</div>

</template>

<script>

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
