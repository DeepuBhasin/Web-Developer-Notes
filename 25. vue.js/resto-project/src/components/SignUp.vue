<template>
    <div id="sign-up">
        <h1>Sign Up</h1>
        <div class="register">
            <input type="text" name="" id="" placeholder="Enter Name"><br/>
            <input type="text" name="" id="" placeholder="Enter Email"><br/>
            <input type="password" name="" id="" placeholder="Enter Password"><br/>
            <button >Sign Up</button>
        </div>
    </div>
</template>
<script>

export default {
    name : 'SignUp'
}
</script>
<style scoped>
.register input{
    width: 300px;
    height: 40px;
    padding-left: 20px;
    display: block;
    margin-bottom: 30px;
    margin-left: auto;
    margin-right: auto;
    border: 1px solid skyblue;
}
.register button{
    width: 320px;
    height: 40px;
    border: 1px solid skyblue;
    color: #fff;
    background-color: skyblue;
    cursor: pointer;
}
</style>
