<template>
<div id="app">
  <p>Upload files (images)</p>
  <input type="file" accept="image/*" ref="file" multiple/>
  <button @click="upload">Upload Image</button>

</div>

</template>

<script>
import axios from 'axios'

export default {
  methods: {
    upload () {
      let formData = new FormData()
      formData.append(0, this.$refs.file.files[0])
      axios.post('/backend/upload.php', formData)
        .then(response => {
          console.log(response)
          if (response.data) {
            alert('image uploaded')
          } else {
            alert('upload failure')
          }
        })
        .catch(err => {
          console.log(err)
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
