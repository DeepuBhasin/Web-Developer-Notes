import * as React from "react";
import { useDispatch } from "react-redux";
import { addNoteAction } from "../redux/actions";

const initialNotesValues = {
    id: "",
    title: "",
    content: ""
};

export const AddNotes = () => {
    const [notes, setNote] = React.useState(initialNotesValues);
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
                <label htmlFor="title">Enter Title</label>
                <input id="title" value={notes.title} onChange={handleChange} name="title" type="text" placeholder="Add Title" /><br />
                <label htmlFor="content">Enter Content</label>
                <input id="content" value={notes.content} onChange={handleChange} name="content" type="text" placeholder="Add Content" /><br />
                <button type="submit" onClick={handleSubmit}>Add</button>
                <button type="reset">Clear</button>
            </form>
        </div>
    )
}