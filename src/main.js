// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import 'font-awesome/css/font-awesome.min.css'
import 'bootstrap/dist/css/bootstrap.min.css'
Vue.config.productionTip = false

Vue.component('com', {
  render: (h) => {
    var p1 = h('p', { attrs: { title: 'the first P' } }, 'text1')
    var p2 = h('p', 'text2')
    return h('div', [p1, p2])
  }
})
/* eslint-disable no-new */

new Vue({
  el: '#app',
  components: { App },
  template: '<App/>'
})
