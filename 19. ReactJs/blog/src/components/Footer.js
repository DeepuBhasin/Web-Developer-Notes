import React from 'react'
import {CommonContext} from './CommonContext.js'

class Footer extends React.Component {

  render(){
    return (
      <CommonContext.Consumer>
        {
            ({color})=>(
                <h1 style={{backgroundColor:color, color:'white'}}>Hello , this is Footer page</h1>
            )
        }
      </CommonContext.Consumer>
    )
  }
}


export default Footer;
