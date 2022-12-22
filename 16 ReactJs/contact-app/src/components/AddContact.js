import React from 'react'
import {Link,useNavigate} from 'react-router-dom'
class Addcontact extends React.Component{
    constructor(props){
        super(props)
        this.state = {
            name : '',
            email : '',
        }
    }   
    add = (e) =>{
       e.preventDefault();
        if(this.state.name === "" || this.state.email==="") {
            alert('All the Fields are Mandatory');
            return false;
        }
        console.log(this.props);
        // let navigate = useNavigate();
        // this.props.addContactHandler(this.state);
        // this.setState({name:'',email:''});
        // navigate('/');
        
    }
    render(){
        return (
            <div className='ui main'>
                <h2>Add Contact</h2>
                <Link to="/" className='ui button blue right'>List</Link>
                <form className='ui form' onSubmit={this.add}>
                    <div className='field'>
                        <label>Name</label>
                        <input type="text"  name='name' placeholder='Enter Name' value={this.state.name} onChange={(e)=>this.setState({name:e.target.value})}/>
                    </div>
                    <div className='field'>
                        <label>Email</label>
                        <input type="email"  name='email' placeholder='Enter Email' value={this.state.email}  onChange={(e)=>this.setState({email:e.target.value})}/>
                    </div>
                     <button type='submit' className='ui button blue'>Add</button>
                </form>
            </div>
        );
    }
}
export default Addcontact