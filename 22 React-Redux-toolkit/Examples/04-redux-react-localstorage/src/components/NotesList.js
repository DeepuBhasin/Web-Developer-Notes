import React, { useEffect } from "react";
import { useDispatch, useSelector } from "react-redux";
import { deleteNoteAction, fetchNotesAction } from "../redux/redux";

const NotesList = () => {

    const dispatch = useDispatch();
    useEffect(() => {
        dispatch(fetchNotesAction());
    }, []);

    const notes = useSelector(state => state.notes);

    return (
        <>
            {notes.map(item => {
                return <div className="notesPost" key={item.id}>
                    <h3>Title : {item.title}</h3>
                    <h4>Content : {item.content}</h4>
                    <button type="button" onClick={() => dispatch(deleteNoteAction(item.id))}>Delete</button>
                </div>
            })}
        </>
    )
}

export default NotesList;