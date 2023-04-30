const { createStore, combineReducers } = require('redux');

// initial Post State
const initialState = {
    posts: []
};

// initial User State
const usersInitialState = {
    users: []
}

// Action constanst
const ADDPOST = "add_post";
const DELETEPOST = "delete_post";
const ADDUSER = "add_user";
const DELETEUSER = "delete_user";

//Action + Action creator
const addPostAction = (payload) => {
    return {
        type: ADDPOST,
        payload: payload
    }
}

const addUserAction = (payload) => {
    return {
        type: ADDUSER,
        payload: payload
    }
}

const deletePostAction = (payload) => {
    return {
        type: DELETEPOST,
        payload: payload
    }
}

const deleteUserAction = (payload) => {
    return {
        type: DELETEUSER,
        payload: payload
    }
}

// Reducer

const postReducer = (state = initialState, action) => {
    switch (action.type) {
        case ADDPOST: {
            return { ...state, posts: [...state.posts, action.payload] };
        }
        case DELETEPOST: {
            let tempPostArray = [...state.posts];
            let newPosts = tempPostArray.filter(item => item.id != action.payload.id);
            return { ...state, posts: newPosts }
        }
        default: {
            return { ...state };
        }
    }
};

const userReducer = (state = usersInitialState, action) => {
    switch (action.type) {
        case ADDUSER: {
            return { ...state, users: [...state.users, action.payload] };
        }
        case DELETEUSER: {
            let tempPostArray = [...state.users];
            let newusers = tempPostArray.filter(item => item.id != action.payload.id);
            return { ...state, users: newusers }
        }
        default: {
            return { ...state };
        }
    }
};

// rootReducer
const rootReducer = combineReducers({
    posts: postReducer,
    users: userReducer
})

// store
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
store.dispatch(addPostAction({ id: 2, name: 'Mobile' }));
store.dispatch(addPostAction({ id: 3, name: 'Keyboard' }));
store.dispatch(addUserAction({ id: 2, name: 'Dp' }));

store.dispatch(deletePostAction({ id: 1 }));
store.dispatch(deleteUserAction({ id: 1 }));

