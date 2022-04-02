<template>
    <div class="home-component">
        <HeaderComponent />
        <h1>Hello, Welcome on Update Restaurent page </h1>
         <form class="add">
            <input type="text" name="" id="name" placeholder="Enter Name" v-model="restaurant.name">
            <input type="text" name="" id="address" placeholder="Enter address" v-model="restaurant.address">
            <input type="text" name="" id="contact" placeholder="Enter contact" v-model="restaurant.number">
            <button type="button" v-on:click="updateRestaurant">Update</button>
        </form>
    </div>    
</template>
<script>
import HeaderComponent from './HeaderComponent.vue'
import axios from 'axios';
export default {
    name : 'UpdateComponent',
    components : {
        HeaderComponent
    }, data(){
        return {
            restaurant :{
                name : '',
                address :'',
                number : ''
            }
        }
    },
    methods:{
       async updateRestaurant(){
                let id = this.$route.params.id; 
                
                let result = await axios.put('http://localhost:3000/resturant/'+id,{
                    name : this.restaurant.name,
                    address : this.restaurant.address,
                    number : this.restaurant.number
                });

            if(result.status == 200){
               
               this.$router.push({name:'Home'});
            }
        }
    },
    async mounted(){
        if (localStorage.getItem('user-info') === null) {
            this.$router.push({
                name: 'Login'
            });
        }
        
        let id = this.$route.params.id;

        let result = await axios.get('http://localhost:3000/resturant/'+id);
        
        this.restaurant.name = result.data.name;
        this.restaurant.address = result.data.address;
        this.restaurant.number = result.data.number;
    }
}
</script>
<style scoped>

</style>