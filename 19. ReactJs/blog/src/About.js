import { Link,Outlet } from "react-router-dom";

function About(){
    return (
      <div>
        <h1>About Page</h1>
        <p>Welcome to About Page</p>
        <Link to="user" state={{name:'Deepinder',age : 28}}>User</Link>
        <Outlet/>
      </div>
    )
  }

export default About;   