import { FETCH_POSTS_FAILURE, FETCH_POSTS_REQUEST, FETCH_POSTS_SUCCESS, SEARCH_POST_FAILURE, SEARCH_POST_REQUEST, SEARCH_POST_SUCCESS } from "./constants";


// Actions Creator
export const fetchPostsRequest = () => {
    return {
        type: FETCH_POSTS_REQUEST
    }
}

export const fetchPostsSuccess = (payload) => {
    return {
        type: FETCH_POSTS_SUCCESS,
        payload: payload
    }
}

export const fetchPostsFail = (payload) => {
    return {
        type: FETCH_POSTS_FAILURE,
        payload: payload
    }
}

export const fetchPostRequest = (payload) => {
    return {
        type: SEARCH_POST_REQUEST,
        payload: payload
    }
}

export const fetchPostSuccess = (payload) => {
    return {
        type: SEARCH_POST_SUCCESS,
        payload: payload
    }
}

export const fetchPostFail = (payload) => {
    return {
        type: SEARCH_POST_FAILURE,
        payload: payload
    }
}

