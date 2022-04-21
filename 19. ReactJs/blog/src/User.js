import {useParams} from 'react-router-dom'
function User(){
    const params = useParams();
    const {name,id} = params;
    
    return (
        <div>
            <h1>User Component :: id : {id} name :  {name}</h1>
        </div>
    )
}

export default User;