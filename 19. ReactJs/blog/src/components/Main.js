import React from 'react'
import {CommonContext} from './CommonContext.js'

class Main extends React.Component {

  render(){
    return (
      <CommonContext.Consumer>
        {
            ({color})=>(
                <h1 style={{backgroundColor:color, color:'white'}}>Hello , this is main page</h1>
            )
        }
      </CommonContext.Consumer>
    )
  }
}


export default Main;
