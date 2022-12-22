import React, { useState } from 'react'
import {useSelector,useDispatch} from 'react-redux'
import {toast} from 'react-toastify';
import {useNavigate} from 'react-router-dom'

function AddContact() {
  const [name,setName] = useState('');
  const [email,setemail] = useState('');
  const [number,setnumber] = useState('');
  const contacts = useSelector((state)=>state);
  const dispatch = useDispatch();
  const navigate = useNavigate();
  
  
  const handleSubmit = (e) => {
    e.preventDefault();

    const checkEmail =  contacts.find(contact=> contact.email === email && email);
    const checkNumber =  contacts.find(contact=> contact.number === number && number);

    if(checkEmail){
      return toast.error('This email is already Exists !');
    }
    if(checkNumber){
      return toast.error('This Number is already Exists !');
    }
    
    if(!email || !number || !name){
      return toast.warning('Please Fill in fields !');
    }
    const data = {
      id : contacts[contacts.length-1].id + 1,
      name,
      email,
      number
    }

    dispatch({type : "ADD_CONTACT",payload : data});
    toast.success("Student Added Successfully");
    navigate('/');

  }
  return (
    <div className='container'>
        <h1 className='display-3 text-center my-5'>
              Add Student 
            </h1>
        <div className='row'>
            
            <div className='col-md-6 shadow mx-auto p-5'>
              <form onSubmit={handleSubmit}>
                <div className='form-group m-2'>
                  <input type="text" placeholder='Name' className='form-control' value={name} onChange={e=>setName(e.target.value)}/>
                </div>
                <div className='form-group m-2'>
                  <input type="email" placeholder='Email' className='form-control'value={email} onChange={e=>setemail(e.target.value)}/>
                </div>
                <div className='form-group m-2'>
                  <input type="number" placeholder='Phone Number' className='form-control'value={number} onChange={e=>setnumber(e.target.value)}/>
                </div>
                <div className='form-group m-2'>
                  <button type='submit' className='btn btn-dark'>Add Student</button>
                  <button type='reset' className='btn btn-info mx-2'>clear</button>
                </div>
              </form>
            </div>
        </div>
    </div>
  )
}

export default AddContact