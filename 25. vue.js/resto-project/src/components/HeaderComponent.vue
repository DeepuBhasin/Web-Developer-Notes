<template>
<div class="nav">
    <router-link to="/"> Home Page </router-link>
    <router-link to="/add">Add Restaurant</router-link>
    <a href="" @click="logout">Logout</a>

</div>
</template>

<script>
export default {
    name: 'HeaderComponent',
    methods: {
        logout() {
            localStorage.clear();
            if (localStorage.getItem('user-info') === null) {
                this.$router.push({
                    name: 'Login'
                });
            }
        }
    },
    
}
</script>

<style scoped>
.nav {
    background-color: #333;
    overflow: hidden;
}

.nav a {
    color: #fff;
    float: left;
    text-align: center;
    padding: 16px 14px;
    text-decoration: none;
    font-size: 14px;
    margin-right: 4px;
}

.nav a:hover {
    background-color: #ddd;
    color: #222;
}
</style>
