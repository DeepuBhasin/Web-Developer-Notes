import { ADD_NOTE, DELETE_NOTE, FETCH_NOTES } from "./constants"

const initialState = {
    notes: []
}

// Reducer
export const notesReducer = (state = initialState, action) => {
    switch (action.type) {
        case ADD_NOTE: {
            let tempNotes = [...state.notes, action.payload];
            const updateStates = { ...state, notes: tempNotes };
            localStorage.setItem("notes", JSON.stringify(updateStates));
            return updateStates;
        };
        case DELETE_NOTE: {
            let tempNotes = [...state.notes];
            let newNotes = tempNotes.filter(item => (item.id !== action.payload));
            let updateStates = { ...state, notes: newNotes }
            localStorage.setItem("notes", JSON.stringify(updateStates));
            return updateStates;
        };
        case FETCH_NOTES: {
            const notes = JSON.parse(localStorage.getItem('notes'));

            if (!notes) return { notes: [] };

            return notes;
        }
        default: {
            return { ...state };
        }
    }
}