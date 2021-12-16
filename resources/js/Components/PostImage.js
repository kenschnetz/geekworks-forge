import React from 'react';

export default function PostImage(props) {
    if (props?.post?.active_post_details?.[0]?.images?.[0]?.path !== undefined) {
        return (
            <div className="mt-4" style={{height: 0, width: '100%', paddingBottom: '100%', backgroundImage: `url(${props?.post?.active_post_details?.[0]?.images?.[0]?.path})`, backgroundSize: 'cover', backgroundPosition: 'center center'}} />
        );
    } else {
        return ('');
    }
}
