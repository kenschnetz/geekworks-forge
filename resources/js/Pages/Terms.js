import React from 'react';
import Authenticated from '@/Layouts/Authenticated';
import { Head } from '@inertiajs/inertia-react';

const iframeWrapper = {
    width: '100%',
    maxWidth: '820px',
    margin: '0 auto',
}

const iframe = {
    height: '100vh',
}

export default function Terms(props) {
    return (
        <div style={iframeWrapper}>
            <iframe className="text-center w-full" style={iframe} src="https://docs.google.com/document/d/e/2PACX-1vTqvKDlX2tYMrkgWh5l0Lmkf7Gt_zvND4nZLlTFgR9opFF9QC1l67mE3wMXxYKuw4EWOmFou4Q_x6Db/pub?embedded=true"></iframe>
        </div>
    );
}
