<template>
  <div>
    <h1>HELLO FROM ONE</h1>
    <ul>
      <li v-for="(item, index) in list" :key="index">Product:{{item.product}} / Price: {{item.price}}</li>
    </ul>
  </div>
</template>

<script>
export default {
  data () {
    return {
    }
  },
  computed: {
    list: function () {
      return this.$store.state.product_list
    }
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
