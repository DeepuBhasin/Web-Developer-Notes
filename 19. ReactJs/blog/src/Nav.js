import {Link} from 'react-router-dom'
function Nav(){
    return (
        <>
                  
        <Link to="/">Home page</Link>
        <br/>
        <Link to="about">About page</Link>
        <br/>
        <Link to="/user">User page</Link>
        </>
    )
}
export default Nav;