<template>
<div class="Profile-component">
    <h1>Profile component</h1>
    <h2>{{name}}</h2>
</div>
</template>
<script>
import {useRoute} from 'vue-router'
export default {
    name: "ProfileComponent",
    data(){
        return {
            name: ''
        }
    },
    mounted(){
        const route = useRoute();
        this.name = route.params.name;
    }
}
</script>
