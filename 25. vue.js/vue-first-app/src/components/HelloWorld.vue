<template>
  <div class="hello">
    <ChildComonent />
    <!-- {{ topics.firstname }} -->
    {{message}}

    <ButtonComponent @click="clickMe($event,name, message)">Click Me</ButtonComponent>
  </div>
</template>

<script>
import ChildComonent from "./ChilldComponent.vue";
import ButtonComponent from './ButtonComponent.vue'
export default {
  name: "HelloWorld",
  components: {
    ChildComonent,
    ButtonComponent
  },

  data() {
    return {
      name: "Deepinder Singh",
      message: "Hello world",
    };
  },
  // inject: ["topics", "clickMe"],
  methods : {
    clickMe(e,name,message){
      alert(name);
      alert(message);
    }
  }
};
</script>
