<template>
  <div class="container">
    <HeaderComponent />
    <Button text="Add Task" color="green"/>
    <TaskComponent  :tasks="tasks"/>
    
    <!-- <Button text="Update Task" color="blue"/>
    <Button text="Delete Task" color="red"/> -->
  </div>
</template>

<script lang="ts">
import HeaderComponent from './components/HeaderComponent.vue';
import Button from './components/Button.vue';
import TaskComponent from './components/TaskComponent.vue'

export default {
  name: 'App',
  components : {
    HeaderComponent,
    Button,
    TaskComponent
    
  },
  data(){
  return {
    tasks : [
       {
        id : 1,
        text : 'Doctor appointment',
        day : 'Marsh 1st at 2:30 pm'
      },
      {
        id : 2,
        text : 'Meeting at school',
        day : 'Marsh 3rd at 1:30 pm'
      },
      {
        id : 3,
        text : 'food Shopping',
        day : 'Marsh 3rd at 11:00 am'
      }
    ]
  }
},
created(){
    
  }
}
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap');
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}
body {
  font-family: 'Poppins', sans-serif;
}
.container {
  max-width: 500px;
  margin: 30px auto;
  overflow: auto;
  min-height: 300px;
  border: 1px solid steelblue;
  padding: 30px;
  border-radius: 5px;
}
.btn {
  display: inline-block;
  background: #000;
  color: #fff;
  border: none;
  padding: 10px 20px;
  margin: 5px;
  border-radius: 5px;
  cursor: pointer;
  text-decoration: none;
  font-size: 15px;
  font-family: inherit;
}
.btn:focus {
  outline: none;
}
.btn:active {
  transform: scale(0.98);
}
.btn-block {
  display: block;
  width: 100%;
}
</style>
