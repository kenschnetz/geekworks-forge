import React from 'react';
import logo from '../../../storage/app/public/img/logo.png';

const backgroundDiv = {
    height: '100vh',
    backgroundImage: "url('/storage/img/forge-bg.jpg')",
    backgroundSize: 'cover',
    backgroundPosition: 'center center',
    backgroundRepeat: 'no-repeat',
};

const headerDiv = {
    height: '60px',
}

const logoDiv = {
    height: 'calc(100vh - 180px)',
}

const logoImg = {
    height: '80px',
};

const footerDiv = {
    height: '120px',
}

export default function Welcome(props) {
    return (
        <div style={backgroundDiv}>
            <div className="w-full" style={headerDiv}>
                <p className="p-3 text-white text-right">
                    <a href={ route('login') } className="text-sm text-white underline">Log in</a>
                </p>
            </div>
            <div className="w-full flex flex-wrap content-center justify-center" style={logoDiv}>
                <div className="bg-white rounded">
                    <img src={logo} style={logoImg} />
                </div>
            </div>
            <div className="w-full" style={footerDiv}>
                <p className="px-3 text-sm text-white text-center">
                    This application is currently in closed Beta. If you would like to join, please email your request to <a className="underline" href="mailto:contact@geekworksstudios.com">contact@geekworksstudios.com</a>
                </p>
                <p className="p-3 text-sm text-white text-center">
                    <a href={ route('terms') } target="_blank" className="text-white underline">Terms And Conditions</a>
                </p>
            </div>
        </div>
    );
}
