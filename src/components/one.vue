<template>
  <div>
    <h1>HELLO FROM ONE</h1>
    <ul>
      <li v-for="(item, index) in product_list" :key="index">
        Product:{{item.product}} / Price: {{item.price}}
        <button @click="edit_each_price(true, item)">Up</button>
        <button @click="edit_each_price(false, item)">Down</button>
      </li>
    </ul>
    <button @click="edit_all_price(true)">All Up</button>
    <button @click="edit_all_price(false)">All Down</button>
  </div>
</template>

<script>
import {mapState, mapActions, mapMutations} from 'vuex'
export default {
  data () {
    return {
      margin: 0.5
    }
  },
  computed: {
    ...mapState([
      'product_list'
    ])
  },
  methods: {
    ...mapMutations([
      'mutate_all_price'
    ]),
    ...mapActions([
      'action_each_price'
    ]),
    edit_each_price (direction, item) {
      this.action_each_price([direction, this.margin, item])
      // this.$store.dispatch('action_each_price', [direction, this.margin, item])
    },
    edit_all_price (direction) {
      this.mutate_all_price([direction, this.margin])
      // this.$store.commit('mutate_all_price', [direction, this.margin])
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
