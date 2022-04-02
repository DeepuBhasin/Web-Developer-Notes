<template>
    <div id="sign-up">
        <img class="logo" alt="Vue logo" src="../assets/resto.webp">
        <h1>Welcome to Sign Up</h1>
        <div class="register">
            <input type="text" id="name" placeholder="Enter Name" v-model="name">
            <input type="text" id="email" placeholder="Enter Email" v-model="email">
            <input type="password" id="password" placeholder="Enter Password" v-model="password">
            <button v-on:click="signUp">Sign Up</button>
            <p><router-link to="/login"> Login </router-link></p>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    name : 'SignUp',
    data(){
        return {
            name : '',
            email:'',
            password : ''
        }
    },
    methods : {
        async signUp(){
                let result = await axios.post('http://localhost:3000/user',{
                    email : this.email,
                    name : this.name,
                    password : this.password
            });
            console.log(result);

            if(result.status==201){
                localStorage.setItem('user-info',JSON.stringify(result.data));

                // this code is used to redirect using routes 
                
                this.$router.push({name:'Home'});  

            }else{
                alert('Problem in sign up');
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
<style>
</style>
