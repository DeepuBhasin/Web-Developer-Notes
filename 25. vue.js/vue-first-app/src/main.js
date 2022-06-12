import { createApp } from 'vue'
import App from './App.vue'
import HelloWorld from './components/HelloWorld.vue';

const app = createApp(App);
app.component('HelloWorld',HelloWorld);
app.mount('#app')
