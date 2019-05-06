<template>
  <div>
    <h1>HELLO FROM TWO</h1>
    <ul>
      <li v-for="(item, index) in sale_product_list" :key="index">Product :{{item.product}} / Sale Price: {{item.price}}</li>
    </ul>
  </div>
</template>

<script>
import {mapGetters} from 'vuex'
export default {
  name: 'two',
  computed: {
    // sale_product_list () {return this.$store.getters.sale_product_list}
    ...mapGetters([
      'sale_product_list'
    ])
  }
}
</script>

<style scoped>
  div {
    background-color: orange;
    padding: 20px ;
  }
  h1 {
    background-color: red;
    color: #fff;
  }
  ul {
    list-style-type: none;
  }
  li {
    background-color: blue;
    color: white;
    padding: 10px;
    margin: 10px 0;
  }
</style>
