import { createStore,combineReducers,applyMiddleware } from "redux";
import thunk from 'redux-thunk';
import {composeWithDevTools} from 'redux-devtools-extension';
import {userReducer} from './reducer'

const rootReducer = combineReducers({
    userList : userReducer,
}
);
const middleware = [thunk];             // add multiple thunk 
const store = createStore(
    rootReducer,
    composeWithDevTools(applyMiddleware(...middleware))
);

export default store;