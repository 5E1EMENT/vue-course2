import Vue from 'vue'
import VueRouter from 'vue-router'
import first from '@/components/first'
import second from '@/components/second'

Vue.use(VueRouter)
const routes = [
  {
    name: 'root',
    path: '/',
    redirect: {
      name: 'first',
      params: {
        msg: 'WELCOME!'
      }
    }
  },
  {
    name: 'first',
    path: '/component_first/:msg',
    component: first
  },
  {
    name: 'second',
    path: '/component_second',
    component: second
  }
]
export default new VueRouter({routes})
