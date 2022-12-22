import {configureStore} from '@reduxjs/toolkit';
import rootReducer from './rootReducer';
import productSaga from './productSaga';
import createSagaMidlleware from 'redux-saga';
const sagaMiddleWare = createSagaMidlleware();

const store = configureStore({
    reducer : rootReducer,
    middleware:()=>[sagaMiddleWare]
});
sagaMiddleWare.run(productSaga);
export default store;