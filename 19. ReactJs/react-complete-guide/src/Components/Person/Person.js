import { useState } from 'react';
import Radium from 'radium';
import './Person.css';

const Person = (props) => {
    let [data, setData] = useState('Deepinder');
    let [status, setStatus] = useState(false);
    let myClass = ['italic','fontStyle'];
    
    let button = {
        backgroundColor: 'lightGreen',
        margin:'10px',
        color: 'black',
        cursor : 'pointer',
        padding : '10px',
        width : '100px',
        ':hover' : {
            backgroundColor : 'grey',
            color : 'white'
        }

    }
    


    function setValue(e) {
        setData(e.target.value);
    }


    if (status) {
        myClass.push('red');
    }

    myClass = myClass.join(' ');

    

    return (

        <div className='Person'>
            <div>
                <h1 className={myClass}>{data} </h1>
                <input type="text" onChange={setValue} value={props.name} />
            </div>
            <button style={button} onClick={() => { setStatus(!status) }}>Toggle</button>
        </div>
    )
}


export default Radium(Person);