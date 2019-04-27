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

import $ from 'jquery'
export default {
  data () {
    return {
      car_info_set: [],
      err_msg: 'sorry, no car in record',
      src: require('./logo.png'),
      url: 'http://php-server/server.php'
    }
  },
  computed: {},
  components: {},
  created () {
    this.jq_request_response()
  },
  methods: {
    jq_request_response () {
      let that = this
      $.ajax({
        url: that.url,
        method: 'POST',
        data: {
          range: 'all'
        }
      }).always(() => {
        that.car_info_set = []
        that.err_msg = ''
      })
        .done((data) => {
          let result = JSON.parse(data)
          if (result[0]) {
            that.car_info_set = result[1]
          } else {
            that.err_msg = result[1]
          }
        })
        .fail((data) => {
          that.err_msg = data.statusText
        })
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
