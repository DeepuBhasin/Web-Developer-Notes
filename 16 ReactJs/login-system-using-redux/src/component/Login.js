import React, { useState } from 'react'

function Login() {
    let [name,setName] =useState('');
    let [email,setEmail] =useState('');
    let [password,setPassword] =useState('');
  return (
    <div className='login'>
        <form className='login__form'>
            <h1>Login Here</h1>
            <input type="text" name='name' placeholder='Enter Name' value={name} onChange={e=>setName(e.target.value)}/><br/>
            <input type="email" name='name' placeholder='Enter Email' value={email} onChange={e=>setEmail(e.target.value)}/><br/>
            <input type="password" name='password' placeholder='Enter password' value={password} onChange={e=>setPassword(e.target.value)}/><br/>
            <button type='submit'>Login</button>
        </form>
    </div>
  )
}

export default Login