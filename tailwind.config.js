import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './Front-end/*.html',
    ],
    darkMode: 'class',
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                open: ['"Open Sans"', 'sans-serif']
            },
            colors: {
                primary: '#245237',
                light: '#E3E7DA',
                secondary: '#6E8052',
            },
        },
    },

    plugins: [forms, require('daisyui')],
    daisyui: {
        themes: ["light"],
      },
};
