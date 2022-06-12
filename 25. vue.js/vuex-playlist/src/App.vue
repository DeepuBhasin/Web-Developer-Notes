<template>
  <div>
    <h1>{{ counter }}</h1>
    <h1>{{ name }}</h1>
    <h1>{{fullname}}</h1>
    <h1>{{ output() }}</h1>
    <input type="text" v-model="name" placeholder="Enter Name...." />
    <button @click="counter++">Click Me</button>
  </div>
</template>

<script>
export default {
  name: "App",
  data() {
    return {
      name: "",
      counter: "",
    };
  },
  computed:{
    fullname(){
      console.log('computed');
      return this.name;
    }
  },
  methods: {
    output() {
      console.log('methods');
      this.fullname;
      // return this.name;
    },
  },
};
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
