<template>
<div>
  <com></com>
  <comp></comp>
</div>
</template>

<script>
import comp from './components/comp'
export default {
  components: {
    comp
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
#reading-mode {
  max-width: 700px;
  border: 2px solid red;
  margin: 0 auto;
}
#editing-mode {
  max-width: 700px;
  border: 2px solid blue;
  margin: 0 auto;
}
  .fa {
    font-size: 36px;
    cursor: pointer;
  }
  .warning {
    border: 2px solid red;
  }
</style>
