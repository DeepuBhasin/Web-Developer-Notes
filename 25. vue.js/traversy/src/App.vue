<template>
  <div class="container">
  <AddComoponent/>
  <FilterComponent/>
  <TodoComponent/>
  </div>
  
</template>

<script>
import AddComoponent from './components/AddComoponent.vue'
import TodoComponent from './components/TodoComponent.vue'
import FilterComponent from './components/FilterComponent.vue'

export default {
  name: 'App',
  components: {
    TodoComponent,
    AddComoponent,
    FilterComponent
    
  }
}
</script>

<style>
body {
  font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
  line-height: 1.6;
  background: #e8f7f0;
}
.container {
  max-width: 1100px;
  margin: auto;
  overflow: auto;
  padding: 0 2rem;
}
</style>