import React, { useEffect } from "react";
import SearchPost from "./SearchPost";
import { useDispatch, useSelector } from "react-redux";
import { getAllPostThunk } from "./../redux/thunk";

const PostsList = () => {
    const dispatch = useDispatch();
    const { loading, error, posts } = useSelector(state => state.postsData);
    useEffect(() => {
        dispatch(getAllPostThunk());
    }, [dispatch]);

    const style = { border: '2px red solid', textAlign: 'left', marginBottom: '20px', padding: '10px', borderRadius: '5px' };

    return (<div>
        <SearchPost />
        <br />
        <h1>Total Post {posts.length}</h1>
        <br />
        {loading ? <h2>Loading ..... </h2>
            : error ? <h2> {error}</h2>
                : posts?.map(item => {
                    return <div key={item.id} style={style}>
                        <h3>id : {item.id}</h3>
                        <h3>Post Title : {item.title}</h3>
                        <p>Post body : {item.body}y</p>
                    </div>
                })
        }
    </div >
    )
}

export default PostsList;