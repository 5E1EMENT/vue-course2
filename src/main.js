// The Vue build version to load with the `import` command

// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
// Components
import Vue from 'vue'
import App from './App'

// Libs
import 'font-awesome/css/font-awesome.min.css'
import 'bootstrap/dist/css/bootstrap.min.css'

// Directives
import test from './directives/test'

// Configs
Vue.config.productionTip = false

/* eslint-disable no-new */
Vue.directive('test', test)

new Vue({
  el: '#app',
  components: { App },
  template: '<App/>'
})
