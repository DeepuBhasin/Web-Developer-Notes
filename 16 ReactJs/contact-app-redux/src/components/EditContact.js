import React, { useState,useEffect } from 'react'
import {useSelector,useDispatch} from 'react-redux'
import {toast} from 'react-toastify';
import {useNavigate,Link,useParams} from 'react-router-dom'

function Home() {
    const {id} = useParams();
    
    const contacts = useSelector(state=>state);
    const navigate = useNavigate();
    const dispatch = useDispatch();
    const currentContact = contacts.find(contact => contact.id === parseInt(id))

    const [name,setName] = useState('');
    const [email,setemail] = useState('');
    const [number,setnumber] = useState('');


    useEffect(()=>{
      if(currentContact) {
        setName(currentContact.name);
        setemail(currentContact.email);
        setnumber(currentContact.number);
      }
    },[currentContact]);


    const handleSubmit = (e) => {
      e.preventDefault();
  
      const checkEmail =  contacts.find(contact=> contact.id  !==  id && contact.email === email && email);
      const checkNumber =  contacts.find(contact=>contact.id  !==  id && contact.number === number && number);
  
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
        id : parseInt(id),
        name,
        email,
        number
      }
      dispatch({type : "UPDATE_CONTACT",payload : data});
      toast.success("Student updated Successfully");
      navigate('/');
    }


    return (
    <div className='container'>
        {currentContact ? (
          <>
            <h1 className='display-3 text-center my-5'>
              Edit Student {id}
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
                  <button type='submit' className='btn btn-dark'>Update Student</button>
                  <Link to="/" className='btn btn-danger mx-3'>Cancel</Link>
                </div>
              </form>
            </div>
        </div>
          </> 
        ):(
          <h1 className='display-3 my-5 text-center'>Student with id {id} is not exist</h1>
        )}
    </div>
  )
}

export default Home