import { createStore } from "redux"
import { composeWithDevTools } from "redux-devtools-extension"
import { notesReducer } from "./reducer";

const rootReducer = notesReducer;

export const store = createStore(rootReducer, composeWithDevTools());
