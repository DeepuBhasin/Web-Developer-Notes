const { createStore, applyMiddleware } = require("redux");

// Third party middleware (it will print all actions automatically in console after dispatching)
const loggerMiddleware = require("redux-logger").createLogger();

// Custom middleware 
const customLogger = ({ getState, dispatch }) => next => action => {
    console.log('Action Fired:', action);
    next(action);
    // Example of dispatching a success or failure action within the middleware (assuming the payload is for FETCH_REQUEST action)
    if (action.type === FETCH_REQUEST) {
        setTimeout(() => {
            // Simulate a random success or failure
            if (Math.random() > 0.5) {
                dispatch(fetchPostSuccessAction(action.payload));
            } else {
                dispatch(fetchPostFailedAction("Failed to fetch post data."));
            }
        }, 3000);
    }
}

// Initial Post State
const initialState = {
    posts: [],
    loading: false,
    error: ''
};

// Actions Constants
const FETCH_REQUEST = "FETCH_REQUEST";
const FETCH_SUCCESS = "FETCH_SUCCESS";
const FETCH_FAILED = "FETCH_FAILED";

// Action Creators
const fetchPostRequestAction = (payload) => {
    return {
        type: FETCH_REQUEST,
        payload: payload
    }
}

const fetchPostSuccessAction = (payload) => {
    return {
        type: FETCH_SUCCESS,
        payload: payload
    }
}

const fetchPostFailedAction = (payload) => {
    return {
        type: FETCH_FAILED,
        payload: payload
    }
}

// Reducer
const postReducer = (state = initialState, action) => {
    switch (action.type) {
        case FETCH_REQUEST: {
            return { ...state, loading: true, error: '' };
        }
        case FETCH_SUCCESS: {
            return { ...state, posts: [...state.posts, action.payload], loading: false, error: '' };
        }
        case FETCH_FAILED: {
            return { ...state, posts: [], loading: false, error: action.payload };
        }
        default: {
            return state;
        }
    }
};

// rootReducer (only one reducer in this case)
const rootReducer = postReducer;

// Store
const store = createStore(rootReducer, applyMiddleware(loggerMiddleware, customLogger));

// Subscribe 
store.subscribe(() => {
    const data = store.getState()
    console.log("-------------------- Output ------------------------------");
    console.log('State:', data);
});

// Dispatch an initial action to see everything in action
store.dispatch(fetchPostRequestAction('Post content for user1'));
