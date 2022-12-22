import { useEffect, useState } from "react";

function App() {
  let [data, setData] = useState(0);
  let cssObject = { 
    width:`${data}%`, 
    height:'40px', 
    backgroundColor:'lightGreen',
    color:'black',
    textAlign : 'center',
    fontSize : '27px',
    fontStyle : 'Bold',
    transition: 'width 1s',
  }
  useEffect(() => {
    let timer = setTimeout(() => {
      setNewWidth();
    }, 100);
    return ()=>{
      clearTimeout(timer);
    }
  }, [data,setNewWidth]);

  function setNewWidth() {
    if (data < 100) {
      setData(data + 1);
    }
  }
  
  return (
    <div className="App">
        <div style={cssObject}>{data}%</div>
       <h2 style={{textAlign:'center'}}>{data === 100 ? "Process Completed Successfully" : null}</h2>
      </div>
  );
}

export default App;
