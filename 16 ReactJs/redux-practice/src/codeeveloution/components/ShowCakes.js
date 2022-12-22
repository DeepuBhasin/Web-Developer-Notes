import React from 'react'
import {connect} from 'react-redux'

function CakeContainer(props) {
    return (<div>
        <h2>Number of Cakes - {props.numOfCakes}</h2>
        </div>
  )
}

const mapStateToProps = state =>{
    return {
        numOfCakes : state.numOfCakes
    }
}
export default connect(mapStateToProps)(CakeContainer)