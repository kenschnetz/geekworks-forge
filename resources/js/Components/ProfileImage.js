import React from 'react';

export default function ProfileImage(props) {
    if (props?.user?.character?.profile_image_path !== undefined) {
        return (
            <div className="flex-shrink-0">
                <img className="h-10 w-10 rounded-full" src={props.post} alt=""/>
            </div>
        );
    } else {
        return (
            <div className="flex-shrink-0">
                <img className="h-10 w-10 rounded-full" src="/storage/img/default-profile.jpg" alt=""/>
            </div>
        );
    }
}
