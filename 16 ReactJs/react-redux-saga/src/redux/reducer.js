import { ADD_TO_CART,REMOVE_FROM_CART ,SET_CART_DATA} from "./constants";
const initilaValue = { phone: 10 , products :[]};
export const cartData = (state = initilaValue, action) => {
   
    switch(action.type){
        case ADD_TO_CART:
         return {
            ...state, 
            phone : state.phone + 1
         }
         case REMOVE_FROM_CART:
         return {
            ...state,
            phone : state.phone - 1
         } 
         case SET_CART_DATA:
         return {
            ...state,
            products : [action.data]
         }   
         default :
         return state;
    }
}