

const { createAction, nanoid, createReducer, configureStore, combineReducers } = require("@reduxjs/toolkit");
const logger = require("redux-logger").createLogger();

// initial state
const initialState = {
    counter: 0
}

//Action Creator
const incrementAction = createAction("INCREMENT");
const decrementAction = createAction("DECREMENT");
const resetAction = createAction("RESET");
const incrementByAction = createAction("INCREMENT_BY", (payload) => {
    return {
        payload
    }
});

// console.log(incrementAction({ id: nanoid(), title: 'Deepu' }));

// Reducer

// 1. Builder callback notation
const counterReducer = createReducer(initialState, builder => {
    builder.addCase(incrementAction, (state) => {
        // we are mutating the state directly here because of the immer library
        state.counter += 1
    })
    builder.addCase(decrementAction, (state) => {
        state.counter -= 1
    })
    builder.addCase(resetAction, (state) => {
        state.counter = 0
    })
    builder.addCase(incrementByAction, (state, action) => {
        state.counter += action.payload
    })
})

// 2. map object notation (not recommended)
// const counterSlice2 = createAction(initialState, {
//     [INCREMENT]: state => state.counter += 1,
//     [DECREMENT]: state => state.counter -= 1,
//     [RESET]: state => state.counter = 0,
//     [INCREMENT_BY]: (state, action) => state.counter += action.payload
// })

// root Reducer
const rootReducer = combineReducers({
    counter: counterReducer
})

// Store
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