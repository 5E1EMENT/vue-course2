export default {
  bind (el, bindings, vnode) {
    console.log(el.parentNode)
  },
  inserted (el) {
    console.log(el.parentNode)
  },
  update (el, binding) {
    console.log(binding)
  },
  unbind (el) {
    console.log(el.parentNode)
  }
}
