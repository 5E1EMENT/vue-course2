<template>
<div id="app">
  <input type="text" v-model="text">
  <h2 :class="red">{{text}}</h2>
  <button @click="trigger_get()">Axios GET</button>
  <button @click="trigger_post()">Axios POST</button>
</div>

</template>

<script>
import axios from 'axios'
import qs from 'qs'

export default {
  data () {
    return {
      text: 'some text',
      red: 'red',
      url: '/backend/server.php'
    }
  },
  computed: {
  },
  methods: {
    trigger_post () {
      axios.post(this.url, qs.stringify({
        msg: 'sent by POST method'
      }))
        .then(response => {
          console.log(response)
        })
        .catch(error => {
          console.log(error)
        })
    },
    trigger_get () {
      axios.get(this.url, {
        params: {
          msg: 'HELLO from AXIOS GET'
        }
      })
        .then(response => {
          console.log(response)
        })
        .catch(error => {
          console.log(error)
        })
    }
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
