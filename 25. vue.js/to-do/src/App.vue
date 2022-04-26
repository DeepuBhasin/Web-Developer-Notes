<template>
<div id="app">
    <div class="container">
        <AddProdcts/>
        <TodoComponent />
    </div>
</div>
</template>
<script> 
import TodoComponent from './components/TodoComponent.vue'
import AddProdcts from './components/AddProducts.vue';

export default {
    name: 'App',
    components: {
        TodoComponent,
        AddProdcts
    }
}
</script>
