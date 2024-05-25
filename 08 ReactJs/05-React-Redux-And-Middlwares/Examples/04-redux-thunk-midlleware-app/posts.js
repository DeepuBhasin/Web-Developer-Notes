const { createStore, applyMiddleware } = require("redux");
const axios = require("axios");
const thunk = require("redux-thunk").default;

// initial Post State
const initialState = {
    posts: [],
    error: "",
    loading: false
};

// Action constants
const FETCH_REQUEST = "FETCH_REQUEST";
const FETCH_SUCCESS = "FETCH_SUCCESS";
const FETCH_FAILED = "FETCH_FAILED";


// Action creator
const fetchPostRequestAction = () => {
    // Action
    return {
        type: FETCH_REQUEST,
    }
}

const fetchPostSuccessAction = (payload) => {
    return {
        type: FETCH_SUCCESS,
        payload: payload
    }
}

const FetchPostFailedAction = (payload) => {
    return {
        type: FETCH_FAILED,
        payload: payload
    }
}

// MiddleWare [Redux Thunk] (action to make request)
const getPostApi = () => {
    return async (dispatch, getState) => {
        try {
            console.log('Current State', getState());
            dispatch(fetchPostRequestAction());
            const data = await axios.get('https://jsonplaceholder.typicode.com/posts');
            dispatch(fetchPostSuccessAction(data.data));

        } catch (error) {
            dispatch(FetchPostFailedAction(error.message))
        }
    }
}


// Reducer
const postReducer = (state = initialState, action) => {
    switch (action.type) {
        case FETCH_REQUEST: {
            return { ...state, loading: true };
        }
        case FETCH_SUCCESS: {
            return { ...state, loading: false, posts: action.payload }
        }
        case FETCH_FAILED: {
            return { ...state, loading: false, error: action.payload }
        }
        default: {
            return { ...state };
        }
    }
};

// Root Reducer
const rootReducer = postReducer;

// store with middleware
const store = createStore(rootReducer, applyMiddleware(thunk));

// subscribe 
store.subscribe(() => {
    const data = store.getState()

    console.log("--------------------Output ------------------------------");
    console.log('users', data);

});

// dispatch
store.dispatch(getPostApi());
