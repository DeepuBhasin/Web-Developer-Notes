import { createStore } from "redux";
import cakeReducer from "./cakes/CakeReducres";
const store = createStore(cakeReducer);

export default store;