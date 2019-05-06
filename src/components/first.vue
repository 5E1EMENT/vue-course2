<template>
  <div>

    <h2>{{msg}}</h2>
  </div>
</template>

<script>
export default {
  name: 'first',
  computed: {
    msg () {
      return this.$route.params.msg
    }
  }
}
</script>

<style scoped>
  div{
    background-color: black;
    padding: 10px ;
  }
  h2 {
    padding: 20px;
    background-color: red;
    color: white;
  }
</style>
