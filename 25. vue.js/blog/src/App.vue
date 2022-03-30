<template>
  <div id="app">
    <h1 v-if="show">{{email}} {{password}}</h1>
    <input type="text" name="email" id="" placeholder="Email" v-model="email"><br/><br/>
    <input type="text" name="password" id="" placeholder="Password" v-model="password"><br/><br/>
    <button @click="addUser()">Add user</button>
    
 </div>
</template>
<script>
import axios from 'axios'
export default {
  name: 'App',
  data(){
    return {
      email:'',
      password:'',
      show:false
    }
  },
  methods:{
    async addUser(){

        let result = await axios.post('http://localhost:3000/users',{
          email:this.email,
          password:this.password
        });

        console.log(result.data);
      }
  }
}
</script>

