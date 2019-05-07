<template>
<div id="app">
  <input type="text" v-model="text">
  <h2 :class="red">{{text}}</h2>
  <button @click="trigger_get()">Axios GET</button>
  <button @click="trigger_post()">Axios POST</button>
  <button @click="trigger_both()">Axios BOTH</button>
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
      url: '/backend'
    }
  },
  computed: {
  },
  methods: {
    trigger_both () {
      function send_msg () {
        return axios.post('/backend/server.php', qs.stringify({msg: 'Message from POST'}))
      }
      function send_author () {
        return axios.get('/backend/server.php', {params: {author: 'mee'}})
      }

      axios.all([send_msg(), send_author()])
        .then(
          axios.spread((msg, author) => {
            console.log(msg, author)
          })
        )
        .catch(err => {
          console.log(err)
        })
    },
    trigger_post () {
      axios.post(this.url, qs.stringify({
        msg: 'sent by POST method'
      }))
        .then(response => {
          console.log(response)
        })
        .catch(error => {
          if (error.response) {
            // successful request + response
            console.log('successful request + response')
            console.log(error.response)
          } else if (error.request) {
            // successful request BUT NO response recieved
            console.log('successful request BUT NO response recieved')
            console.log(error.request)
          } else {
            // no request sent out...
            console.log('no request sent out')
            console.log(error.message)
          }
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
