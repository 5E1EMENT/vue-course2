<template>
<div id="app">
  <ul id="list" v-if="car_info_set.length">
    <li v-for="(element, key) in car_info_set" :key="key">
      brand is <b>{{element.brand}}</b>
      model is <b>{{element.model}}</b>
    </li>
  </ul>
  <div v-else class="err_list"> {{err_msg}} </div>
  <img :src="src" alt="">
</div>

</template>

<script>

export default {
  data () {
    return {
      ajax: null,
      car_info_set: [],
      err_msg: 'sorry, no car in record',
      src: require('./logo.png'),
      url: 'http://php-server/server.php'
    }
  },
  computed: {},
  components: {},
  created () {
    this.ajax = new XMLHttpRequest()
    this.request()
  },
  methods: {
    request () {
      this.ajax.onreadystatechange = this.response
      this.ajax.open('POST', this.url, true)
      this.ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
      this.ajax.send('range=all')
    },
    response () {
      if (this.ajax.readyState === 4) {
        if (this.ajax.status === 200) {
          this.car_info_set = '' // update vue data
          let result = JSON.parse(this.ajax.responseText)
          if (result[0]) {
            this.car_info_set = result[1]
          } else {
            this.err_msg = result[1]
          }
        }
      }
    }

  }
}
</script>

<style scoped>
  .err_list {
    background-color: red;
    color: white;
    padding: 20px ;
    font-size: 20px;
  }
  li {
    background-color: green;
    color: white;
  }
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
