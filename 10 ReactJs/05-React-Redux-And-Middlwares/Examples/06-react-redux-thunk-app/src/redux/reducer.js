import { FETCH_POSTS_REQUEST, FETCH_POSTS_SUCCESS, FETCH_POSTS_FAILURE, SEARCH_POST_REQUEST, SEARCH_POST_SUCCESS, SEARCH_POST_FAILURE } from "./constants";

// initial State
const initialState = {
    loading: false,
    error: "",
    posts: [],
    post: {}
}

export const postsReducer = (state = initialState, action) => {
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
