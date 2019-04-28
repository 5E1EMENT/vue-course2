<template>
<div id="app">
  <ul id="list" v-if="car_info_set.length">
    <li v-for="(element, key) in car_info_set" :key="key" class="car_item">
      brand is <b>{{element.brand}}</b>
      model is <b>{{element.model}}</b>
      engine is <b>{{element.engine}}</b>
      gear box is <b>{{element.gear_box}}</b>
      <button class="btn btn-danger" id="delete_item" @click="delete_item(element.car_id)">Delete</button>
      <button class="btn btn-primary" id="edit_item">Edit</button>
    </li>
  </ul>
  <div v-else class="err_list"> {{err_msg}} </div>
  <hr>
  <ul id="create_item">
    <li>
      <span>Brand: </span>
      <input placeholder="please enter brand" class="form-control" type="text" v-model.trim="newItem.brand">
    </li>
    <li>
      <span>Model: </span>
      <input placeholder="please enter model" class="form-control" type="text" v-model.trim="newItem.model">
    </li>
    <li>
      <span>Engine: </span>
      <select class="form-control" name="" id="" v-model="newItem.engine">
        <option value="1">Petrol</option>
        <option value="2">Diesel</option>
        <option value="3">Electric</option>
        <option value="4">Hybrid</option>
        <option value="5">Hydrogen</option>
      </select >
    </li>
    <li>
      <span>Automatic: </span>
      <input class="form-control" type="radio" name="" value="1" v-model="newItem.gearbox">
      <span>Manual: </span>
      <input class="form-control" type="radio" name="" value="2" v-model="newItem.gearbox">
    </li>
    <li>
      <button class="btn btn-dark" :disabled="btn_switch" @click="create_item">Create</button>
    </li>
  </ul>
</div>

</template>

<script>

import $ from 'jquery'
export default {
  data () {
    return {
      newItem: {
        brand: '',
        model: '',
        engine: '3',
        gearbox: '1'
      },
      car_info_set: [],
      err_msg: 'sorry, no car in record',
      src: require('./logo.png'),
      url: 'http://php-server/server.php'
    }
  },
  computed: {
    btn_switch () {
      if (this.newItem.brand.length >= 1 && this.newItem.model.length >= 1) {
        return false
      } else {
        return true
      }
    }
  },
  components: {},
  created () {
    this.retrieve_all()
  },
  methods: {
    retrieve_all () {
      let that = this
      $.ajax({
        url: that.url,
        method: 'POST',
        data: {
          action: 'retrieve_all'
        }
      }).always(() => {
        that.car_info_set = []
        that.err_msg = ''
      })
        .done((data) => {
          let result = JSON.parse(data)
          console.log(result)
          if (result[0]) {
            that.car_info_set = result[1]
          } else {
            that.err_msg = result[1]
          }
        })
        .fail((data) => {
          that.err_msg = data.statusText
        })
    },
    delete_item (carId) {
      let that = this
      $.post({
        url: that.url,
        data: {
          action: 'delete_item',
          car_id: carId
        }
      })
        .always(() => {
          that.car_info_set = []
          that.err_msg = ''
        })
        .done((data) => {
          let result = JSON.parse(data)
          if (result[0]) {
            that.retrieve_all()
          } else {
            that.err_msg = result[1]
          }
        })
        .fail((data) => {
          that.err_msg = data.statusText
        })
    },
    create_item () {
      let that = this
      $.post({
        url: that.url,
        data: {
          action: 'create_item',
          new_item: that.newItem
        }
      })
        .always(() => {
          that.car_info_set = []
          that.err_msg = ''
        })
        .done((data) => {
          let result = JSON.parse(data)
          if (result[0]) {
            that.retrieve_all()
          } else {
            that.err_msg = result[1]
          }
        })
        .fail((data) => {
          that.err_msg = data.statusText
        })
    }
  }
}
</script>

<style scoped>
  #create_item {
    background-color: deepskyblue;
    padding: 10px;
    color: white;
  }
  .err_list {
    background-color: red;
    color: white;
    padding: 20px ;
    font-size: 20px;
  }
  .car_item {
    background-color: green;
    color: white;
    display: flex;
    justify-content: space-evenly;
  }
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
.red {
  color: red
}
.green {
  color: green
}
</style>
