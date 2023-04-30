import React, { useState } from "react";
import { useDispatch } from "react-redux";
import { addNoteAction } from "../redux/redux";
const initialNotesValues = {
    id: "",
    title: "",
    content: ""
};

const AddNotes = () => {

    const [notes, setNote] = useState(initialNotesValues);
    const dispatch = useDispatch();

    const handleChange = (e) => {
        const id = new Date().getTime();
        setNote({
            ...notes,
            [e.target.name]: e.target.value,
            id: id
        });
    }
    const handleSubmit = e => {
        e.preventDefault();
        if (notes.title === "" || notes.content === "") {
            return alert("Please fill the form");
        }
        setNote(notes);
        dispatch(addNoteAction(notes));
        setNote(initialNotesValues);
    }
    return (
        <div>
            <form onSubmit={handleSubmit}>
                <label>Enter Title</label>
                <input value={notes.title} onChange={handleChange} name="title" type="text" placeholder="Add Title" /><br />
                <label>Enter Content</label>
                <input value={notes.content} onChange={handleChange} name="content" type="text" placeholder="Add Content" /><br />
                <button type="submit" onClick={handleSubmit}>Add</button>
            </form>
        </div>
    )
}

export default AddNotes;