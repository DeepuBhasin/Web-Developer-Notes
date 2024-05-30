import { createSlice } from "@reduxjs/toolkit";

const initialState = {
    loading: false,
    error: undefined,
    posts: [],
}

const postsSlice = createSlice({
    name: 'POST_APP',
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
export const postsReducer = postsSlice.reducer;