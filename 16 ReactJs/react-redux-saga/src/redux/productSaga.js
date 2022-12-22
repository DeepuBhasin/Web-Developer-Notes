import {takeEvery,put} from 'redux-saga/effects'
import { ADD_TO_CART, SET_CART_DATA } from "./constants"

function * showProduct(){
    let apiData = yield fetch('http://localhost:3500/products'); 
    let data = yield apiData.json();
    yield put({type:SET_CART_DATA,data});
}

function* productSaga(){
    yield takeEvery(ADD_TO_CART,showProduct);
}
export default productSaga;