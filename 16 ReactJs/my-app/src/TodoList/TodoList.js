import React, { useState } from 'react'
import './TodoList.css';


function TodoList() {
  let [data,setData] = useState({todoItem: '',todoList : []});
  let [editId,updateEditId]= useState(0)

  const addTodoItem = ()=>{
    if(data.todoItem.length <=0){
      alert('Please Enter your Task');
      return false;
    }
    let todoArray = data.todoList;
    let id = Math.floor(Math.random() * 100) + 1;
    todoArray.push({'id':id,'value' : data.todoItem});
    setData({todoItem:'',todoList:todoArray});
  }
  const deleteItem = (id) =>{
    let todoArray = data.todoList;
    todoArray = todoArray.filter((item,key)=>{
      return item.id !== id;
    });
    setData({todoItem:'',todoList:todoArray});
  }
  const editItem =(id) =>{
    let todoArray = data.todoList;
    let [toDoData] = todoArray.filter((item)=>{
      return item.id === id;
    });
    setData({...data,todoItem:toDoData.value});
    updateEditId(toDoData.id);
  }

  const saveItem = (id) => {
    let todoArray = data.todoList;
    let index = todoArray.findIndex((person)=> {
      return person.id === id;
    });
    
    todoArray[index] = {[id]:id,'value':data.todoItem};
    setData({todoItem:'',todoList:todoArray});
    updateEditId(0);

  }
  const todoCompleteList = data.todoList.map((item,key)=>{
    return <li className='itemClass' key={item.id}>{item.value} 
      <button className='btn btn-primary' onClick={()=>{editItem(item.id)}}>Edit</button>
      <button className='btn btn-danger' onClick={()=>{deleteItem(item.id)}}>Delete</button>
    </li> 
  })

  const addEditBtn = editId == 0 ? <button className='btn btn-success' onClick={()=>{addTodoItem()}}>Add Item</button> :  <button className='btn btn-primary' onClick={()=>{saveItem(editId)}}>Save</button>
  return (
    <div className='wrapper'>
      <div className='model'></div>
      <h1>Todo Application</h1>
      
      <input className='form-input' type="text" name='todoItem' value={data.todoItem} onChange={(e)=>setData({...data,todoItem: e.target.value})}/>
      {addEditBtn}
      <ol>{data.todoList.length > 0 ? todoCompleteList : null}</ol>
    </div>
  )
}

export default TodoList