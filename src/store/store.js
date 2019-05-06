import vue from 'vue'
import vuex from 'vuex'
vue.use(vuex)

const store = {
  state: {
    product_list: [
      {product: 'apple', price: 5},
      {product: 'orange', price: 3},
      {product: 'peach', price: 4},
      {product: 'grape', price: 2}
    ]
  },
  getters: {
    sale_product_list (state) {
      return state.product_list.map(item => {
        return {
          product: item.product,
          price: item.price / 2
        }
      })
    }
  },
  mutations: {
    mutate_all_price (state, argument) {
      if (argument[0]) {
        state.product_list.forEach(item => {
          item.price += argument[1]
        })
      } else {
        state.product_list.forEach(item => {
          item.price -= argument[1]
        })
      }
    }
  },
  actions: {}
}
export default new vuex.Store(store)
