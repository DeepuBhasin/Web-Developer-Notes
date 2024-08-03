import React, { useState } from "react";
import { useDispatch } from "react-redux";
import { getAllPostThunk, getSinglePostThunk } from "./../redux/thunk";
const SearchPost = () => {
    const [search, setSearch] = useState("");
    const dispatch = useDispatch();

    const handleSubmit = e => {
        e.preventDefault();

        if (search === "") {
            alert('provide values')
        } else {
            dispatch(getAllPostThunk(search))
        }
    }

    const handleLoad = () => {
        dispatch(getSinglePostThunk())
    }

    return (
        <div style={{ marginTop: '20px' }}>
            <form onSubmit={handleSubmit}>
                <input type="number" name="search" value={search} onChange={(e) => setSearch(e.target.value)} placeholder="Enter Post" />
                <button type="submit">Search</button>
                <button type="button" onClick={handleLoad}>Load all Data</button>
            </form>
        </div>
    )
}

export default SearchPost;