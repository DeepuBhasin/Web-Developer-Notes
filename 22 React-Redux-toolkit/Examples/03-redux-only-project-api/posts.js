const axios = require("axios");
const { createStore, applyMiddleware } = require("redux");
const thunk = require("redux-thunk").default;

// initial Post State
const initialState = {
    posts: [],
    error: "",
    loading: false
};

// Action constanst
const REQUESTSTARTED = "REQUEST_STARTED";
const FETCHSUCCESS = "FETCH_SUCCESS";
const FETCHFAILED = "FETCH_FAILED";


//Action + Action creator
const fetchPostRequestAction = () => {
    return {
        type: REQUESTSTARTED,
    }
}

const fetchPostSuccessAction = (payload) => {
    return {
        type: FETCHSUCCESS,
        payload: payload
    }
}

const FetchPostFailedAction = (payload) => {
    return {
        type: FETCHFAILED,
        payload: payload
    }
}

// MiddleWare [Redux Thunx] (action to make request)
const fetchPosts = () => {
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
        case REQUESTSTARTED: {
            return { ...state, loading: true };
        }
        case FETCHSUCCESS: {
            return { ...state, loading: false, posts: action.payload }
        }
        case FETCHFAILED: {
            return { ...state, loading: false, error: action.payload }
        }
        default: {
            return { ...state };
        }
    }
};

// store
const store = createStore(postReducer, applyMiddleware(thunk));

// subscribe 
store.subscribe(() => {
    const data = store.getState()

    console.log("--------------------Output ------------------------------");
    console.log('users', data);

});

// dispatch
store.dispatch(fetchPosts());
