import React from 'react'
import ContactCard from './ContactCard'
import {Link} from 'react-router-dom';
function contactlist(props) {
  const deleteContactHandler = (id)=>{
    props.getContactId(id);
  };
  const renderContactList = props.contacts.map((item)=>{
   return (
    <ContactCard contact={item} key={item.id} clickHandler={deleteContactHandler}/>
   )
  })
  return (
    <div className='main'>
      <h2>Contact List</h2>
      <Link to="/add" className='ui button green right'>Add Contact</Link>
      <div className='ui celled list'>
      {renderContactList}
    </div>
    </div>
  )
}

export default contactlist