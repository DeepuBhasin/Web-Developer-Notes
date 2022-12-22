import React from 'react'
import {Link} from 'react-router-dom'
import {useSelector,useDispatch} from 'react-redux';
import {toast} from 'react-toastify'

function Home() {
  const contacts = useSelector(state=> state);
  const dispatch = useDispatch();
  function daleteContact(id){
    dispatch({type:"DELETE_CONTACT",payload:id});
    toast.success('Contact Deleted Successfully');
  }

  return (
    <div className='container'>
        <div className='row'>
            <div className='col-md-12 my-5 text-end'>
                <Link to="/add" className='btn btn-outline-dark'>Add Contact</Link>
            </div>
            <div className='col-md-6 mx-auto'>
                <table className='table table-hover'>
                  <thead className='text-white bg-dark text-center'>
                    <tr>
                      <th scope='col'>#</th>
                      <th scope='col'>Name</th>
                      <th scope='col'>Email</th>
                      <th scope='col'>Number</th>
                      <th scope='col'>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    {
                      contacts.map((contact,index)=>{
                        return (<tr key={contact.id}>
                          <td>{index+1}</td>
                          <td>{contact.name}</td>
                          <td>{contact.email}</td>
                          <td>{contact.number}</td>
                          <td>
                            <Link to={`/edit/${contact.id}`} className='btn btn-small btn-primary'>Edit</Link>
                            <button type='button' className='btn btn-danger btn-small mx-2' onClick={()=>daleteContact(contact.id)}>Delete</button>
                          </td>
                        </tr>)
                      })
                    }
                  </tbody>

                </table>

            </div>
        </div>
    </div>
  )
}

export default Home