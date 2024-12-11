// import url('https://fonts.googleapis.com/css2?family=Jersey+20&display=swap');
import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
      "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                jersey: ['"Jersey 20"'],

            },
            colors:{
                primary: '#007BFF',
                secondary: '#0056B3',
                text: '#F4F6F9',
                bg: '#343A40',
                accent: "#2E2E2E",
                highlight: '#FFC107'
            }
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
};
