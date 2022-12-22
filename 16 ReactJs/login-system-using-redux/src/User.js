import React from 'react'

function User(props){
    const {users} = props; 
  return (
    <>
    <div>User Comp</div>
    <table>
        <thead>
            <tr>
                <th>User Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            {
                users.map(user => {
                    return (
                        <tr key={user.id}>
                            <td>{user.id}</td>
                            <td>{user.title}</td>
                        </tr>
                    )
                })
            }
        </tbody>
    </table>
    </>
  )
}

export default User;