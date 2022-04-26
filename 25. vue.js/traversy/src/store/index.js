import { createStore } from 'vuex'
import todos from './modules/todo.js'

export default createStore({
  modules: {
    todos
  }
})
