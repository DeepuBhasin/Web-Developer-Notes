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
const fetchPostsApi = createAsyncThunk(posts.type, async () => {
    const response = await axios.get(API);
    return response.data;
});

const postsSlice = createSlice({
    name: 'POST_APP',
    initialState,

    // for handle promise based actions
    extraReducers: (builder) => {
        // pending
        builder.addCase(fetchPostsApi.pending, (state) => {
            state.loading = true;
            state.error = '';
        });

        // fulfilled
        builder.addCase(fetchPostsApi.fulfilled, (state, action) => {
            state.data = action.payload;
            state.loading = false;
            state.error = '';
        });

        // rejected
        builder.addCase(fetchPostsApi.rejected, (state, action) => {
            state.data = [];
            state.loading = false;
            state.error = action.error.message;
        });
    }
});

// generate reducer
const postsReducer = postsSlice.reducer;

// combine Reducer
const rootReducer = combineReducers({
    posts: postsReducer
});

// store
const store = configureStore({
    reducer: rootReducer
});

store.subscribe(() => {
    const data = store.getState();
    console.log(data);
});

// dispatch
store.dispatch(fetchPostsApi());
