import {BUY_CAKE} from './CakeTypes'
const initState = {
    numberOfCakes : 10
}

const cakeReducer = (state = initState,action) => {
    switch(action.type){
        case BUY_CAKE: return {
            ...state,
            numberOfCakes : state.numberOfCakes - 1 
        }
        default : return state 
    }
     
}

export default cakeReducer