import React from 'react';

export default function Idea(props) {
    return (
        <img src={props.post.post_details.images[0].path} />
    );
}
