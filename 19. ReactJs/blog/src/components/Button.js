import React from 'react'
import {CommonContext} from './CommonContext.js'

function Button(){
    return (
      <CommonContext.Consumer>
        {
            ({updateColor})=>(
                <div>
                    <button onClick={()=>updateColor('black')}>Update Black</button>
                    <button onClick={()=>updateColor('green')}>Update Green</button>
                    <button onClick={()=>updateColor('yellow')}>Update Yellow</button>
                    <button onClick={()=>updateColor('Red')}>Update Red</button>
                </div>    
            )   
        }
      </CommonContext.Consumer>
    )
  }


export default Button;
