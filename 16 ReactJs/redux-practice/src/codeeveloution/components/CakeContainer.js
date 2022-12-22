import React from 'react'
import {connect} from 'react-redux'
import {buyCake} from '../redux/cakes/CakeActions'

function CakeContainer(props) {
    return (
    <div>
        <button  onClick={()=>props.buyCake()}>Buy Cakes</button>
    </div>
  )
}

const mapDispatchToProps = dispatch =>{
    return {
        buyCake : () => dispatch(buyCake())
    }
}
export default connect(null,mapDispatchToProps)(CakeContainer)