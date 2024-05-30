import React, { useState } from "react";
import { useDispatch } from "react-redux";
import { searchPost } from "./../redux/thunk";
const SearchPost = () => {
    const [search, setSearch] = useState("");
    const dispatch = useDispatch();

    const handleSubmit = e => {
        e.preventDefault();

        if (search === "") {
            alert('provide values')
        } else {
            dispatch(searchPost(search))
        }
    }

    return (
        <div style={{ marginTop: '20px' }}>
            <form onSubmit={handleSubmit}>
                <input type="number" name="search" value={search} onChange={(e) => setSearch(e.target.value)} placeholder="Enter Post" />
                <button type="submit">Search</button>
            </form>
        </div>
    )
}

export default SearchPost;