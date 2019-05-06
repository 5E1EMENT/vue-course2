<template>
  <div>
    <h1>HELLO FROM ONE</h1>
    <ul>
      <li v-for="(item, index) in product_list" :key="index">Product:{{item.product}} / Price: {{item.price}}</li>
    </ul>
  </div>
</template>

<script>
import {mapState} from 'vuex'
export default {
  data () {
    return {
    }
  },
  computed: {
    ...mapState([
      'product_list'
    ])
  }
}
</script>

<style scoped>
  div {
    background-color: #000;
    padding: 20px ;
  }
  ul {
    list-style-type: none;
  }
  li {
    background-color: red;
    color: white;
    padding: 10px;
    margin: 10px 0;
  }
  h1 {
    background-color: blue;
    color: #fff;
  }
</style>
