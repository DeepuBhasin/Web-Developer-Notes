import axios from "axios";

const state = {
    todos : [
        {id:1, title : "todo One"},
        {id:2, title : "todo Two"},
        {id:3, title : "todo Three"},
    ]
};
const getters = {
    allTodos : (state)=>state.todos
    
};
const actions = {
    async fetchTodos({commit}){
        const response = await  axios.get('https://jsonplaceholder.typicode.com/todos');
        commit('setTodos',response.data);
        
    },
    async addTodo({commit},title){
        const response = await  axios.post('https://jsonplaceholder.typicode.com/todos',{title:title, completed : false});
        commit('newTodo',response.data);
    },
    async deleteTodo({commit},id){
        // remove from the backend
        await axios.delete(`https://jsonplaceholder.typicode.com/todos/${id}`);
        commit('removeTodo',id);
    },
    async filterTodo({commit},e){
         const limit = e.target.value;
         const response = await  axios.get(`https://jsonplaceholder.typicode.com/todos?_limit=${limit}`);
         commit('setTodos',response.data);
    },
    async updateTodo({commit},updTodo){
        let response  =  await  axios.put(`https://jsonplaceholder.typicode.com/todos/${updTodo.id}`,updTodo);
        commit('updateTodo',response.data); 
    } 

};

const mutations ={
    setTodos : (state,todos) => (state.todos = todos),
    newTodo : (state,todos) => state.todos.unshift(todos),
    // remove from the UI 
    removeTodo : (state,id) => state.todos =  state.todos.filter(todos => todos.id !==id),
    updateTodo : (state,updTodo) => {
        const index = state.todos.findIndex(todo=>todo.id === updTodo.id);

        if(index!==-1){
            state.todos.splice(index,1,updTodo);
        }
    }
};

export default {
    state,
    getters,
    actions,
    mutations
}