import React,{useState,useEffect} from 'react'
import {useDispatch,useSelector} from 'react-redux';
import {userAction} from './redux/actions'
import  User  from './User';

function App() {

  const dispatch = useDispatch();
  const userList = useSelector(state => state.userList);
  
  const {loading,users, error} = userList;
  useEffect (()=>{
    dispatch(userAction());
  },[dispatch]);
    
  return (
    <div>
      <h1>Hello World </h1>
      {loading ? <h1>loading ....</h1> : error ? <h1>{error}</h1> : <User users={users}/>}
    </div>
  )
}

export default App