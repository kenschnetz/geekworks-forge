import React from 'react';
import logo from '../../../storage/app/public/img/logo.png';

const logoImg = {
    margin: '15px 0',
    height: '30px',
};

export default function ApplicationLogo({ className }) {
    return (
        <img src={logo} style={logoImg} />
    );
}
