const { createStore, combineReducers } = require('redux');

// initial Post State
const initialState = {
    posts: []
};

// initial User State
const usersInitialState = {
    users: []
}

// Constants
const ADD_POST = "ADD_POST";
const DELETE_POST = "DELETE_POST";
const ADD_USER = "ADD_USER";
const DELETE_USER = "DELETE_USER";

//Action creator
const addPostAction = (payload) => {
    // Action
    return {
        type: ADD_POST,
        payload: payload
    }
}

const deletePostAction = (payload) => {
    return {
        type: DELETE_POST,
        payload: payload
    }
}

const addUserAction = (payload) => {
    return {
        type: ADD_USER,
        payload: payload
    }
}

const deleteUserAction = (payload) => {
    return {
        type: DELETE_USER,
        payload: payload
    }
}

// Post Reducer
const postReducer = (state = initialState, action) => {
    switch (action.type) {
        case ADD_POST: {
            return { ...state, posts: [...state.posts, action.payload] };
        }
        case DELETE_POST: {
            const newPosts = state.posts.filter(item => item.id !== action.payload.id);
            return { ...state, posts: newPosts };
        }
        default: {
            return state;
        }
    }
};

// User Reducer
const userReducer = (state = usersInitialState, action) => {
    switch (action.type) {
        case ADD_USER: {
            return { ...state, users: [...state.users, action.payload] };
        }
        case DELETE_USER: {
            const newUsers = state.users.filter(item => item.id !== action.payload.id);
            return { ...state, users: newUsers };
        }
        default: {
            return state;
        }
    }
};

// rootReducer (combining reducers)
const rootReducer = combineReducers({
    posts: postReducer,
    users: userReducer
})

// Creating Store and Registering Reducer 
const store = createStore(rootReducer);

// subscribe 
store.subscribe(() => {
    const data = store.getState()

    console.log("--------------------Output ------------------------------");
    console.log('users', data.users);
    console.log('posts', data.posts);

});

// dispatch
store.dispatch(addPostAction({ id: 1, title: 'Computer' }));
store.dispatch(addUserAction({ id: 1, name: 'Deepu Bhasin' }));
store.dispatch(addPostAction({ id: 2, title: 'Mobile' }));
store.dispatch(addPostAction({ id: 3, title: 'Keyboard' }));
store.dispatch(addUserAction({ id: 2, name: 'Dp' }));

store.dispatch(deletePostAction({ id: 1 }));
store.dispatch(deleteUserAction({ id: 1 }));

