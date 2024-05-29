const { configureStore, createSlice } = require("@reduxjs/toolkit");
const logger = require("redux-logger").createLogger();

// initial state
const initialState = {
    counter: 0
}

// CreateSlice (action creator + reducer)
const counterSlice = createSlice({
    // name of reducer
    name: "COUNTER_APPLICATION",

    // initial state for reducer
    initialState,

    // all reducer functions
    reducers: {
        // in parameter we get state and actions
        incrementAction: (state) => { state.counter += 1 },
        decrementAction: (state) => { state.counter -= 1 },
        resetAction: (state) => { state.counter = 0 },
        incrementByAction: (state, action) => { state.counter += action.payload }
    }
});

// Generate actions
const { incrementAction, decrementAction, resetAction, incrementByAction } = counterSlice.actions;

// Generate reducer
const counterReducer = counterSlice.reducer;

// Root Reducer
const rootReducer = {
    counter: counterReducer
};

const store = configureStore({
    reducer: rootReducer,
    middleware: (getDefaultMiddleware) => [...getDefaultMiddleware(), logger]
});

// dispatch action
store.dispatch(incrementAction());
console.log('------------output------------------');
console.log(store.getState());

store.dispatch(incrementAction());
console.log('------------output------------------');
console.log(store.getState());

store.dispatch(decrementAction());
console.log('------------output------------------');
console.log(store.getState());

store.dispatch(resetAction());
console.log('------------output------------------');
console.log(store.getState());

store.dispatch(incrementByAction(40));
console.log('------------output------------------');
console.log(store.getState());
