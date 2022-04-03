<template>
   <div>
        <div v-for="item in tasks" :key="item.id">
        <h3>{{item.text}}</h3>
    </div>
   </div>
</template>
<script>
export default {
    name :  'TaskComponent',
    props:{
        tasks : Array
    }    
}
</script>
<style scoped>

</style>