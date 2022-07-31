import React from 'react'

function Container(props) {
    return (
        <section className='my-5'>
            <div className='container'>
                {props.children}
            </div>
        </section>
    )
}

export default Container