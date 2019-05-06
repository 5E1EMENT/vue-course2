import Vue from 'vue'
import VueRouter from 'vue-router'
const first = () => import('@/components/first')
const second = () => import('@/components/second')
const child = () => import('@/components/child')
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
    components: {
      default: first,
      child
    }

  },
  {
    name: 'second',
    path: '/component_second',
    component: second
  }
]
export default new VueRouter({routes})
