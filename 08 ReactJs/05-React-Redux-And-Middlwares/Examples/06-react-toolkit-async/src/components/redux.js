import { configureStore, createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import axios from "axios";

// Url Address
export const apiURL = 'https://jsonplaceholder.typicode.com/posts';

// initial State
const initialState = {
    loading: false,
    error: undefined,
    posts: [],
}

// action
const fetchPosts = createAsyncThunk('posts/fetch', async (payload, { rejectWithValue, getState, dispatch }) => {
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


const searchPost = createAsyncThunk('post/fetch', async (payload, { rejectWithValue, getState, dispatch }) => {
    const res = await axios.get(`${apiURL}/${payload}`);
    return [res.data];
});

// slice 
const postsSlice = createSlice({
    name: 'posts',
    initialState,
    extraReducers: (builder) => {
        builder.addCase(fetchPosts.pending, (state, action) => {
            state.loading = true;
            state.error = undefined;
        })
        builder.addCase(fetchPosts.fulfilled, (state, action) => {
            state.loading = false;
            state.posts = action.payload;
            state.error = undefined;
        });
        builder.addCase(fetchPosts.rejected, (state, action) => {
            state.loading = false;
            state.error = action.error.message;
            state.posts = [];
        });
        builder.addCase(searchPost.pending, (state, action) => {
            state.loading = true;
            state.error = undefined;
        })
        builder.addCase(searchPost.fulfilled, (state, action) => {
            state.loading = false;
            state.posts = action.payload;
            state.error = undefined;
        });
        builder.addCase(searchPost.rejected, (state, action) => {
            state.loading = false;
            state.error = action.error.message;
            state.posts = [];
        });
    }
});


// Generate reducer 
const postsReducer = postsSlice.reducer;

const store = configureStore({
    reducer: {
        posts: postsReducer
    }
})

export { store, fetchPosts, searchPost };