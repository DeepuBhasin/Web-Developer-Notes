import React from "react";
import user from '../images/user.png'

function ContactCard(props) {
    const {id,name,email} = props.contact;
    return (
        <div className="item" key={id} data-id={id}>
            <img className="ui avatar image" src={user} alt="user"/>
            
            <div className='content'>
                <div className='header'>{name}</div>
                {email}
            </div>
            <i className='trash alternate outline icon' style={{ color: 'red', marginTop: '7px',position : 'relative', float  : 'right'}} onClick={()=>props.clickHandler(id)}></i>
            
        </div>
    )
}

export default ContactCard