import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['ui-sans-serif', ...defaultTheme.fontFamily.sans],
            },
            boxShadow: {
                'md': '0px 0px 8px 0px rgba(34, 60, 80, 0.2)',
            }
        },
    },
    darkMode: 'class',

    plugins: [forms],
};
