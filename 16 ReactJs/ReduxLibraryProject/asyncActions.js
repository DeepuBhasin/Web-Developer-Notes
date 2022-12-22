const redux = require('redux');
const thunkMiddleware = require('redux-thunk').default;
const axios = require('axios');
const createStore = redux.createStore;
const applyMiddleware = redux.applyMiddleware;
const intialState = {
    loading : false,
    data : [],
    error : ''
};

const FETCH_USERS_REQUEST = 'FETCH_USERS_REQUEST';
const FETCH_USERS_SUCCESS = 'FETCH_USERS_SUCCESS'; 
const FETCH_USERS_FAILURE = 'FETCH_USERS_FAILURE';

const fetchUSersRequest = () =>{
    return {
        type : FETCH_USERS_REQUEST
    }
}

const fetchUSersSuccess = users =>{
    return {
        type : FETCH_USERS_SUCCESS,
        payload : users
    }
}

const fetchUSersFailure= error =>{
    return {
        type : FETCH_USERS_FAILURE,
        payload : error
    }
}


const reducer = (state = intialState, action) => {
switch(action.type) {
    case FETCH_USERS_REQUEST:
        return {
            ...state,
            loading : true
        }
        case FETCH_USERS_SUCCESS:
            return {
            loading : false,
            users : action.payload,
            error : ''
        }    
        case FETCH_USERS_FAILURE:
            return {
            loading : false,
            users : [],
            error : action.payload
        }    
    }
}

const fetchUSers = () => {
    return function(dispatch) {
        dispatch(fetchUSersRequest());

        axios.get('https://jsonplaceholder.typicode.com/posts').then(response=>{

            const users = response.data.map(user => user.id);
            dispatch(fetchUSersSuccess(users));
        }).catch(error=>{
            dispatch(fetchUSersFailure(error.message))
        })
    }
}

const store = createStore(reducer,applyMiddleware(thunkMiddleware));
store.subscribe(()=>{console.log(store.getState())});
store.dispatch(fetchUSers())



