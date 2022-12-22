import React from 'react'
class Child extends React.Component{
    componentWillUnmount(){
        console.log('Child Component Unmount Successfully');
    }
    render(){
        return (
            <div>
                <h1>{this.props.data.name}</h1>
            </div>
        )
    }
        
    
}

export default Child