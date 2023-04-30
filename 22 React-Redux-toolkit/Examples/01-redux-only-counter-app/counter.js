const { createStore } = require('redux');

// initial State
const initialState = {
    count: 0
};

// constanst
const INCREMENT = "increment";
const DECREMENT = "decrement";
const RESET = "reset";
const INCREASE_BY_AMT = "incerase_by_amt";


//Action + Action creator
const incermentAction = () => {
    return {
        type: INCREMENT
    }
}

const decrementAction = () => {
    return {
        type: DECREMENT
    }
}

const resetAction = () => {
    return {
        type: RESET
    }
}

const incerementByAmt = (payload) => {
    return {
        type: INCREASE_BY_AMT,
        payload: payload
    }
}

// Reducer

const counterReducer = (state = initialState, action) => {
    switch (action.type) {
        case INCREMENT: {
            return { ...state, count: state.count + 1 }
        }
        case (DECREMENT): {
            return { ...state, count: state.count - 1 }
        }
        case (RESET): {
            return { ...state, count: 0 }
        }
        case (INCREASE_BY_AMT): {
            return { ...state, count: state.count + action.payload }
        }
        default: {
            return { ...state };
        }
    }
};

const store = createStore(counterReducer);

store.subscribe(() => {
    const data = store.getState()
    console.log(data);
    console.log("------------------------------")
})

store.dispatch(incermentAction());
store.dispatch(incermentAction());
store.dispatch(resetAction());
store.dispatch(incerementByAmt(10));
store.dispatch(decrementAction(10));


