<template>
  <ProductsComponent/>
</template>

<script>
import ProductsComponent from './components/ProductsComponent.vue'

export default {
  name: 'App',
  components: {
    ProductsComponent
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
