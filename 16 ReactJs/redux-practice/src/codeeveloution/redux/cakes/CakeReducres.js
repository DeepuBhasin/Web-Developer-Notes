import { BUY_CAKE,INCREASE_CAKE } from "./CakeType";
const initialValue = {
    numOfCakes : 10
}
const cakeReducer = (state = initialValue, action )=>{
    switch(action.type){
        case BUY_CAKE : return {
            ...state,
            numOfCakes : state.numOfCakes -1 
        };
        case INCREASE_CAKE : return {
            ...state,
            numOfCakes : state.numOfCakes + 1 
        };
        default : return state
    }
}

export default cakeReducer;