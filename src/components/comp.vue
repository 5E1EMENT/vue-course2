<template>
  <div >
    <ul v-if="list_info.length">
      <li v-for="(el, index) in list_info" :key="index">The brand is {{el.brand}} and model is {{el.model}}</li>
    </ul>
    <p v-else>No item found</p>
  </div>
</template>

<script>
export default {
  data () {
    return {
      list_info: [
        {brand: 'Toyota', model: 'Supra'},
        {brand: 'Toyota', model: 'Supra'},
        {brand: 'Toyota', model: 'Supra'},
        {brand: 'Toyota', model: 'Supra'},
        {brand: 'Toyota', model: 'Supra'}
      ]
    }
  }
}

</script>

<style scoped>

</style>
