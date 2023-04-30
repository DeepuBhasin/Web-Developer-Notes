import React, { useState } from "react";
import { useDispatch, useSelector } from "react-redux";
import { fetchPostAction } from "./redux";
const SearchPost = () => {
    const [search, setSearch] = useState("");
    const { loading, error, post } = useSelector(state => state);
    const dispatch = useDispatch();

    const handleSubmit = e => {
        e.preventDefault();

        if (search === "") {
            alert('provide values')
        } else {
            dispatch(fetchPostAction(search))
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