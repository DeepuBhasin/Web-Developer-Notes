import axios from "axios";
import { fetchPostsRequest, fetchPostsSuccess, fetchPostsFail, fetchPostRequest, fetchPostSuccess, fetchPostFail } from "./actions";

// Url Address
export const apiURL = 'https://jsonplaceholder.typicode.com/posts';

// Redux Thunks
export const getAllPostThunk = () => {
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

export const getSinglePostThunk = (id) => {
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