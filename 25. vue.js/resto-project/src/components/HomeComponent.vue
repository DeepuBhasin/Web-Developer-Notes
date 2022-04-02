<template>
<div class="home-component">
    <HeaderComponent />
    <h1>Hello {{name}} , Welcome on Home page </h1>
    <table border="1">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Number</th>
            <th>Action</th>
        </tr>
        <tr v-for="item in restaurants" :key="item.id">
            <td>{{item.id}}</td>
            <td>{{item.name}}</td>
            <td>{{item.number}}</td>
            <td>
                <router-link :to="'/update/'+item.id">Update</router-link>
                <button v-on:click="deleteRestaurant(item.id)"> Delete</button>
            </td>
        </tr>
    </table>
</div>
</template>

<script>
import HeaderComponent from './HeaderComponent.vue'
import axios from 'axios';
export default {
    name: 'HomeComponent',
    components: {
        HeaderComponent
    },
    data() {
        return {
            name: '',
            restaurants: []
        }
    },
    methods: {
        async deleteRestaurant(id) {
            let result = await axios.delete('http://localhost:3000/resturant/' + id);

            if (result.status === 200) {
                this.load();
            }else {
                alert('There is technical ')
            }
        },
        async load() {
            
            if (localStorage.getItem('user-info') === null) {
                this.$router.push({
                    name: 'Login'
                });
            }

            let result = await axios.get('http://localhost:3000/resturant');
            this.restaurants = result.data;
        }
    },
    async mounted() {
        this.load();
    }
}
</script>

<style scoped>
td,
th {
    width: 160px;
    height: 40px;
}
</style>
