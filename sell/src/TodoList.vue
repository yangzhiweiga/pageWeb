<template>
  <div>
    <!--<img src="./assets/logo.png">-->
    <!--<router-view/>-->
    <div>
      <input v-model="inputValue"/>
      <button @click="handelSubmit">提交</button>
    </div>
    <div>
      <ul>
        <todo-item v-for="(item,index) of list" :key="index" :content="item" :index="index" @delete="deleteClick">
          {{item}}
        </todo-item>
      </ul>
    </div>
  </div>
</template>

<script>
import TodoItem from './components/TodoItem'

export default {
  components: {
    'todo-item': TodoItem
  },
  data () {
    return {
      inputValue: '',
      list: []
    }
  },
  methods: {
    handelSubmit () {
      this.list.push(this.inputValue)
      this.inputValue = ''
    },
    deleteClick (index) {
      this.list.splice(index, 1)
    }
  }
}
</script>

<style>

</style>
