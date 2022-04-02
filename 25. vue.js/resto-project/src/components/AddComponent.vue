<template>
    <div class="home-component">
        <HeaderComponent />
        <h1>Hello, Welcome on Add Restaurent page </h1>

        <form class="add">
            <input type="text" name="" id="name" placeholder="Enter Name" v-model="restaurant.name">
            <input type="text" name="" id="address" placeholder="Enter address" v-model="restaurant.address">
            <input type="text" name="" id="number" placeholder="Enter number" v-model="restaurant.number">
            <button type="button" v-on:click="addRestaurant">Add</button>
        </form>

    </div>    
</template>
<script>
import HeaderComponent from './HeaderComponent.vue'
import axios from 'axios';
export default {
    name : 'HomeComponent',
    components : {
        HeaderComponent
    },
    data(){
        return {
            restaurant :{
                name : '',
                address :'',
                number : ''
            }
        }
    },
    methods:{
        async addRestaurant(){
            const result = await axios.post('http://localhost:3000/resturant',{
                name : this.restaurant.name,
                address : this.restaurant.address,
                number : this.restaurant.number
            });

            if(result.status==201){
                this.$router.push({name:'Home'});
            }else {
                alert('Technical Error Please try after some time');
            }
        }
    },
    mounted(){
        let user = localStorage.getItem('user-info');
        if(!user){
            this.$router.push({name:'Login'});  
        }
    }
}
</script>
<style scoped>

</style>