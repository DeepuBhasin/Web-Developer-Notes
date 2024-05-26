import { ADD_NOTE, DELETE_NOTE, FETCH_NOTES } from "./constants"
//Action Creator
export const addNoteAction = (payload) => {
    return {
        type: ADD_NOTE,
        payload: payload
    }
}

export const deleteNoteAction = (id) => {
    return {
        type: DELETE_NOTE,
        payload: id
    }
}

export const fetchNotesAction = () => {
    return {
        type: FETCH_NOTES
    }
}
