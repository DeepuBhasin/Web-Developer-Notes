import React, { useEffect, useState } from "react";
import { v4 as uuid } from 'uuid';
import Header from './Header';
import AddContact from './AddContact';
import ContactList from './ContactList';
import { BrowserRouter as Router, Switch, Route,Routes,Link } from 'react-router-dom'
function App() {
  const LOCAL_STORAGE_KEY = "contacts";
  const [contacts, setContact] = useState([]);
  useEffect(() => {
    if (contacts.length > 0) {
      localStorage.setItem(LOCAL_STORAGE_KEY, JSON.stringify(contacts))
    }
  }, [contacts]);

  useEffect(() => {
    let reteriveContacts = JSON.parse(localStorage.getItem(LOCAL_STORAGE_KEY));
    if (reteriveContacts) {
      setContact(reteriveContacts);
    }
  }, []);

  const addContactHandler = (contact) => {
    setContact([...contacts, { id: uuid(), ...contact }])
  }

  const removeContactHandler = (id) => {
    const newContactList = contacts.filter((contact) => {
      return contact.id !== id;
    });
    setContact(newContactList);
  }

  return (
    <div className="ui container">
      <Router>
        <Header />
        <br/><br/><br/>
        <Routes>
          <Route path="/add" element={<AddContact addContactHandler={addContactHandler} />}/>
          <Route path="/" element={<ContactList contacts={contacts} getContactId={removeContactHandler} />}/>
        </Routes>
      </Router>
    </div>
  );
}

export default App;
