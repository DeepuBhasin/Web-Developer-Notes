const { createAsyncThunk, createSlice, configureStore, createAction, combineReducers } = require("@reduxjs/toolkit");
const axios = require("axios");
const API = "https://jsonplaceholder.typicode.com/posts";

const initialState = {
    data: [],
    loading: false,
    error: ''
}

// Action Constants + Action Creators
const posts = createAction("post/fetchPosts");

//create Async Thunk
const fetchPosts = createAsyncThunk(posts.type, async () => {
    const data = await axios.get(API);
    return data.data;
});

const postsSlice = createSlice({
    name: 'POST_APP',
    initialState,
    // for handle promise based calls
    extraReducers: (builder) => {
        // pending
        builder.addCase(fetchPosts.pending, (state) => {
            state.loading = true;
            state.error = '';
        });

        // fulfilled
        builder.addCase(fetchPosts.fulfilled, (state, action) => {
            state.data = action.payload;
            state.loading = false;
            state.error = '';
        });

        // rejected
        builder.addCase(fetchPosts.rejected, (state, action) => {
            state.posts = [];
            state.loading = false;
            state.error = action.payload;
        })
    }
});

// generate reducer
const postsReducer = postsSlice.reducer;

// combine Reducer
const combineReducer = combineReducers({
    posts: postsReducer
})

const store = configureStore({
    reducer: combineReducer
});

store.subscribe(() => {
    const data = store.getState();
    console.log(data);
})

// dispatch
store.dispatch(fetchPosts())