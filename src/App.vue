<template>
<div id="app">
  <i v-if='show' @click='show=!show' class="fa fa-pencil-square" title='Edit' aria-hidden="true"></i>
  <i v-if='!show' @click='save' class="fa fa-floppy-o" title='Save' aria-hidden="true"></i>
  <transition name="fade" mode="out-in">
  <div v-if='show' id="reading-mode" key="r">
    <reading :title="title" :author="author" :date="date" :category="category" :theme_color="category_theme_color[category]">
      {{article}}
    </reading>
  </div>
  <div v-if='!show' id="editing-mode" key="e">
    <div :class="{warning: !remain}">
      <label for="">Article title:</label>
      <input class="form-control" type="text" v-model="title" @input="check">
      <span>{{remain}} / {{limit}} </span>
    </div>
    <div>
      <label for="">Author Name: </label>
      <input class="form-control" type="text" v-model="author">
    </div>
    <ul>
      <li v-for="element in category_list" :key="element">
        <label for="">{{element}}</label>
        <input type="radio" :value="element" v-model="category">
      </li>
    </ul>
    <div>
      <label for="">Article</label>
      <textarea class="form-control" v-model="article" name="" id="" cols="30" rows="10"></textarea>
    </div>
  </div>
  </transition>
</div>
</template>

<script>
import reading from './components/reading'
export default {
  data () {
    return {
      limit: 50,
      show: true,
      title: 'A course on Vue.js 2.0',
      article: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad aliquid commodi dolores earum eum inventore ipsam ipsum magnam necessitatibus neque, optio quae qui quis quos reiciendis ut veritatis voluptatem!',
      author: 'Daniil Nikitas',
      date: '2019',
      category: 'Tech',
      category_list: ['Web', 'News', 'Tech', 'World', 'Space'],
      category_theme_color: {
        Web: 'Crimson',
        News: 'Tomato',
        Tech: 'Teal',
        World: 'Green',
        Space: 'Violet'
      }
    }
  },
  computed: {
    remain () {
      return this.limit - this.title.length
    }
  },
  methods: {
    save () {
      let date = new Date()
      let year = String(date.getFullYear())
      let yearTwoDigit = "'" + year.substr(2, 2)
      let month = date.getMonth() + 1
      switch (month) {
        case 1:
          var monthStr = 'Jan'
          break
        case 2:
          var monthStr = 'Feb'
          break
        case 3:
          var monthStr = 'Mar'
          break
        case 4:
          var monthStr = 'Apr'
          break
        case 5:
          var monthStr = 'May'
          break
        case 6:
          var monthStr = 'Jun'
          break
        case 7:
          var monthStr = 'Jul'
          break
        case 8:
          var monthStr = 'Aug'
          break
        case 9:
          var monthStr = 'Sep'
          break
        case 10:
          var monthStr = 'Oct'
          break
        case 11:
          var monthStr = 'Nov'
          break
        case 12:
          var monthStr = 'Dec'
          break
      }
      let day = date.getDay()
      if (day <= 9) {
        day = '0' + day
      }
      let hour = date.getHours()
      let min = date.getMinutes()
      let sec = date.getSeconds()
      let mdy = monthStr + ' ' + day + ' ' + yearTwoDigit
      let hms = hour + ':' + min + ':' + sec
      let ymdhms = mdy + ' ' + hms
      this.date = ymdhms
      this.show = !this.show
    },
    check () {
      if (this.remain < 0) {
        this.title = this.title.substr(0, this.limit)
      }
    }
  },
  components: {
    reading
  }

}
</script>

<style scoped>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
#reading-mode {
  max-width: 700px;
  border: 2px solid red;
  margin: 0 auto;
}
#editing-mode {
  max-width: 700px;
  border: 2px solid blue;
  margin: 0 auto;
}
  .fa {
    font-size: 36px;
    cursor: pointer;
  }
  .warning {
    border: 2px solid red;
  }
  .fade-enter {
    opacity: 0;
  }
  .fade-enter-active {
    transition: all 0.9s;
  }
  .fade-leave-active {
    transition: all 0.9s;
  }
  .fade-leave-to {
    opacity: 0;
  }
</style>
