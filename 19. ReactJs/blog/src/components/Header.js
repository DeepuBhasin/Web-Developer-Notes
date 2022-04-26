import React from 'react'
import {CommonContext} from './CommonContext.js'

class Header extends React.Component {

  render(){
    return (
      <CommonContext.Consumer>
        {
            ({color})=>(
                <h1 style={{backgroundColor:color, color:'white'}}>Hello , this is Header page</h1>
            )
        }
      </CommonContext.Consumer>
    )
  }
}


export default Header;
