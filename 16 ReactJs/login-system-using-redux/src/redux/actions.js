import axios from 'axios';
import { GET_USERS_FAIL, GET_USERS_REQUEST, GET_USERS_SUCCESS } from './constants';
export const userAction = () => async (dispatch) => {
    try {
        dispatch({ type: GET_USERS_REQUEST });
        const { data } = await axios.get('https://jsonplaceholder.typicode.com/posts');
        setTimeout(()=>{
            dispatch({ type: GET_USERS_SUCCESS, payload: data });
        },3000)
    } catch (error) {
        dispatch({
            type: GET_USERS_FAIL,
            payload: error.data && error.response.data.message ? error.response.data.message : error.message
        })
    }
}

