import React from 'react'
import {connect} from 'react-redux'
import {increaseCake} from '../redux/cakes/CakeActions'

function CakeContainer(props) {
    return (
    <div>
        <button  onClick={()=>props.increaseCake()}>Increase Cakes</button>
    </div>
  )
}
const mapDispatchToProps = dispatch =>{
    return {
        increaseCake : () => dispatch(increaseCake())
    }
}
export default connect(null,mapDispatchToProps)(CakeContainer)