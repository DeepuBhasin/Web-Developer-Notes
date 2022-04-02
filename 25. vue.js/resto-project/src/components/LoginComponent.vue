<template>
    <div id="sign-up">
        <img class="logo" alt="Vue logo" src="../assets/resto.webp">
        <h1>Login</h1>
        <div class="login">
            <input type="text" id="email" placeholder="Enter Email" v-model="email">
            <input type="password" id="password" placeholder="Enter Password" v-model="password">
            <button v-on:click="login">Login</button>
            <p><router-link to="/sign-up"> Sign up </router-link></p>
        </div>
    </div>
</template>
<script>
import axios from 'axios'
export default {
    name: 'LoginComponent',
    data(){
        return {
            email : '',
            password : ''
        }
    },
    methods:{
        async login(){
            let result  = await axios.get(`http://localhost:3000/user?email=${this.email}&password=${this.password}`); 
            
            if(result.status==200 && result.data.length > 0){
                    localStorage.setItem('user-info',JSON.stringify(result.data));
                    this.$router.push({name:'Home'}); 
                }else {
                    alert('Invalid Email/password');
                }
            }
        },
        mounted(){
        let user = localStorage.getItem('user-info');
        if(user){
            this.$router.push({name:'Home'});  
        }
    }
}
    
</script>
<style scoped>

</style>