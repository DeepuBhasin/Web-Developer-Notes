const redux = require('redux');
const reduxLogger = require('redux-logger');

const createStore = redux.createStore;
const applyMiddleware = redux.applyMiddleware;
const logger = reduxLogger.createLogger();


function buyCake(){                 // action creator 
    return {                        // action object   
        type : 'BUY_CAKE',
        info : 'First redux action'
    }
}

function buyIceCream(){                 // action creator 
    return {                        // action object   
        type : 'BUY_ICECREAM',
        info : 'second redux action'
    }
}

const intialState = {
    numOfCakes : 10,
    numOfIceCream: 20
}

const reducer = (state = intialState,action)=>{
    switch(action.type){
        case 'BUY_CAKE' : return {
            ...state,
            numOfCakes: state.numOfCakes - 1
        }
        case 'BUY_ICECREAM' : return {
            ...state,
            numOfIceCream: state.numOfIceCream - 1
        }
        default : return state
    }
}

const store = createStore(reducer,applyMiddleware(logger));
console.log('Initial State',store.getState());
const unsubscribe = store.subscribe(()=>{});
store.dispatch(buyCake());
store.dispatch(buyIceCream());
store.dispatch(buyCake());
store.dispatch(buyIceCream());

unsubscribe();