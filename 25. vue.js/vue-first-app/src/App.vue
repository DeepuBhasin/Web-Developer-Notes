<template>
  <div>
    <form @submit.prevent="addName">
      <input type="text" name="firstname" v-model.trim="firstname"/>
      <button type="submit">Click Me </button>
    </form>
  </div>
</template>
<script>

export default {
  name: "App",
  data() {
    return {
      firstname: "",
      results : [],
    }
  },
  methods: {
    addName() {
      if(this.firstname.length === 0 ){
          alert('Enter First Name');
          return false;
      }else {
          fetch('https://vue-http-demo-1b46a-default-rtdb.firebaseio.com/survesy.json',{
            method : 'GET',
            headers : {
              'Content-type':'application/json'
            },
          }).then((response)=>{
            return response.json();
          }).then((responseNew)=>{
            let results = [];
            for(const id in responseNew){
              results.push({
                id : id,
                name : responseNew[id].name
              });
              this.results = results;
            }
            
          });
        }
        console.log(this.results);
    },
  },
};
</script>
