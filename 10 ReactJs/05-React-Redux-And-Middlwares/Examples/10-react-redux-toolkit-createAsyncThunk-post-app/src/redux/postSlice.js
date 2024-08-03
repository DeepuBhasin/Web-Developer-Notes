import { createSlice, createAsyncThunk } from "@reduxjs/toolkit";
import axios from "axios";

// Initial State
const initialState = {
    loading: false,
    error: '',
    posts: [],
};

// API URL
const apiURL = 'https://jsonplaceholder.typicode.com/posts';

// Async Thunks
export const fetchPosts = createAsyncThunk(
    'posts/fetchAll',
    async (payload, { rejectWithValue, getState, dispatch }) => {
        try {
            const response = await axios.get(apiURL);
            return response.data;
        } catch (error) {
            // customizing error
            return rejectWithValue(error.message);
        }
    }
);

export const searchPost = createAsyncThunk(
    'posts/fetchById',
    async (payload, { rejectWithValue, getState, dispatch }) => {
        try {
            const response = await axios.get(`${apiURL}/${payload}`);
            return [response.data]; // Return as an array to match posts state
        } catch (error) {
            return rejectWithValue(error.message);
        }
    }
);

// Slice
const postsSlice = createSlice({
    name: 'posts',
    initialState,
    extraReducers: (builder) => {
        builder
            .addCase(fetchPosts.pending, (state) => {
                state.loading = true;
                state.error = '';
            })
            .addCase(fetchPosts.fulfilled, (state, action) => {
                state.loading = false;
                state.posts = action.payload;
                state.error = '';
            })
            .addCase(fetchPosts.rejected, (state, action) => {
                state.loading = false;
                state.error = action.payload;
                state.posts = [];
            })
            .addCase(searchPost.pending, (state) => {
                state.loading = true;
                state.error = '';
            })
            .addCase(searchPost.fulfilled, (state, action) => {
                state.loading = false;
                state.posts = action.payload;
                state.error = '';
            })
            .addCase(searchPost.rejected, (state, action) => {
                state.loading = false;
                state.error = action.payload;
                state.posts = [];
            });
    },
});

// Export Reducer
export const postsReducer = postsSlice.reducer;
