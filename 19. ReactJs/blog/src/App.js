import React from 'react'
import {CommonContext} from './components/CommonContext.js'
import Main from './components/Main.js'
import Button from './components/Button.js'
import Header from './components/Header.js';
import Footer from './components/Footer.js';



class App extends React.Component {

  constructor (){
    super();
      this.updateColor = (color)=>{this.setState({
          color:color})
      };
      
      this.state={
          color:'black', 
          updateColor : this.updateColor
        };
    
  }

  render(){
    return (
      <CommonContext.Provider value={this.state}>
        <Header/>
        <h1>Complete Easy exmaple for context API</h1>
        <p>Change Background Color</p>
        <Main/>
        <Button/>
        <Footer/>
      </CommonContext.Provider>
    )
  }
}


export default App;
