<template>
  <div>
      <todo-item @click="handleDelete">{{content}}</todo-item>
  </div>
</template>

<script>
export default{
  props: ['content', 'index'],
  methods: {
    handleDelete () {
      this.$emit('delete', this.index)
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
