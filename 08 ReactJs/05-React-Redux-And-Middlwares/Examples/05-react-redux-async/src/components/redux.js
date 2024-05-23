import axios from "axios";
import { applyMiddleware, combineReducers, createStore } from "redux"
import { composeWithDevTools } from "redux-devtools-extension";
import thunk from "redux-thunk";

// Url Address
export const apiURL = 'https://jsonplaceholder.typicode.com/posts';

// initial State
const initialState = {
    loading: false,
    error: "",
    posts: [],
    post: {}
}

// Action Constants
const FETCH_POSTS_REQUEST = "FETCH_POSTS_REQUEST";
const FETCH_POSTS_SUCCESS = " FETCH_POSTS_SUCCESS";
const FETCH_POSTS_FAILURE = " FETCH_POSTS_FAILURE";

const SEARCH_POST_REQUEST = "SEARCH_POST_REQUEST";
const SEARCH_POST_SUCCESS = " SEARCH_POST_SUCCESS";
const SEARCH_POST_FAILURE = " SEARCH_POST_FAILURE";

// Actions Creator
const fetchPostsRequest = () => {
    return {
        type: FETCH_POSTS_REQUEST
    }
}

const fetchPostsSuccess = (payload) => {
    return {
        type: FETCH_POSTS_SUCCESS,
        payload: payload
    }
}

const fetchPostsFail = (payload) => {
    return {
        type: FETCH_POSTS_FAILURE,
        payload: payload
    }
}

const fetchPostRequest = (payload) => {
    return {
        type: SEARCH_POST_REQUEST,
        payload: payload
    }
}

const fetchPostSuccess = (payload) => {
    return {
        type: SEARCH_POST_SUCCESS,
        payload: payload
    }
}

const fetchPostFail = (payload) => {
    return {
        type: SEARCH_POST_FAILURE,
        payload: payload
    }
}



// Redux Thunks
const fetchPostsAction = () => {
    return async (dispatch, getState) => {
        dispatch(fetchPostsRequest());
        try {
            let data = await axios.get(apiURL);
            dispatch(fetchPostsSuccess(data.data));
        } catch (error) {
            dispatch(fetchPostsFail(error.message))
        }
    }
}

const fetchPostAction = (id) => {
    return async (dispatch, getState) => {
        dispatch(fetchPostRequest());
        try {
            let data = await axios.get(`${apiURL}/${id}`);
            dispatch(fetchPostSuccess(data.data));
        } catch (error) {
            dispatch(fetchPostFail(error.message))
        }
    }
}

// Reducers 
const postsReducer = (state = initialState, action) => {
    switch (action.type) {
        case FETCH_POSTS_REQUEST: {
            return { ...state, loading: true, error: "" }
        }
        case FETCH_POSTS_SUCCESS: {
            return { ...state, posts: action.payload, loading: false, error: "" }
        }
        case FETCH_POSTS_FAILURE: {
            return { ...state, posts: [], loading: false, error: action.payload }
        }
        case SEARCH_POST_REQUEST: {
            return { ...state, loading: true, error: "" }
        }
        case SEARCH_POST_SUCCESS: {
            console.log(action.payload);
            return { ...state, posts: [action.payload], loading: false, error: "" }
        }
        case SEARCH_POST_FAILURE: {
            return { ...state, posts: {}, loading: false, error: action.payload }
        }
        default: {
            return state;
        }
    }
}


const rootReducer = combineReducers({
    postsData: postsReducer
})
const store = createStore(rootReducer, composeWithDevTools(applyMiddleware(thunk)));

export { fetchPostsAction, fetchPostAction, store };