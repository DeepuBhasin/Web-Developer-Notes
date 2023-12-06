import { createStore } from "redux"
import { composeWithDevTools } from "redux-devtools-extension"
// Actions Constants
const ADDNOTE = "ADDNOTE";
const DELETENOTE = "DELETENOTE";
const FETCHNOTES = "FETCHNOTES";

//Action Creator
export const addNoteAction = (payload) => {
    return {
        type: ADDNOTE,
        payload: payload
    }
}

export const deleteNoteAction = (id) => {
    return {
        type: DELETENOTE,
        payload: id
    }
}

export const fetchNotesAction = () => {
    return {
        type: FETCHNOTES
    }
}

const initialState = {
    notes: []
}

// Reducer
const notesReducer = (state = initialState, action) => {
    switch (action.type) {
        case ADDNOTE: {
            let tempNotes = [...state.notes, action.payload];
            const updateStates = { ...state, notes: tempNotes };
            localStorage.setItem("notes", JSON.stringify(updateStates));
            return updateStates;
        };
        case DELETENOTE: {
            let tempNotes = [...state.notes];
            let newNotes = tempNotes.filter(item => (item.id !== action.payload));
            let updateStates = { ...state, notes: newNotes }
            localStorage.setItem("notes", JSON.stringify(updateStates));
            return updateStates;
        };
        case FETCHNOTES: {
            const notes = JSON.parse(localStorage.getItem('notes'));

            if (!notes) return { notes: [] };

            return notes;
        }
        default: {
            return { ...state };
        }
    }
}
export const store = createStore(notesReducer, composeWithDevTools());
