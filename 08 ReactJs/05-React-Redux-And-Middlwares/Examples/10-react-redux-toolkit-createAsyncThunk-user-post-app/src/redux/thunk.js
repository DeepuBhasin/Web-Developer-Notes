import { createAsyncThunk } from "@reduxjs/toolkit";
import axios from "axios";

// action
export const fetchPosts = createAsyncThunk('posts/fetch', async (payload, { rejectWithValue, getState, dispatch }) => {
    const res = await axios.get(apiURL);
    return res.data;

    // try {
    //     const res = await axios.get(apiURL);
    //     return res.data;
    // } catch (error) {
    //     // console.log(error);
    //     // console.log(rejectWithValue(error.response));
    //     // return rejectWithValue(error.response.message);
    //     // return rejectWithValue(error.response.status);
    //     return
    // }

});


export const searchPost = createAsyncThunk('post/fetch', async (payload, { rejectWithValue, getState, dispatch }) => {
    const res = await axios.get(`${apiURL}/${payload}`);
    return [res.data];
});