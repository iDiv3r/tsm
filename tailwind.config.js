import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php', 
        './storage/framework/views/*.php', 
        './resources/views/**/*.blade.php', 
        './resources/js/plugins/flowbite.min.js',
        "./layouts/**/*.html", "./content/**/*.md", "./content/**/*.html", "./src/**/*.js",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        require('flowbite/plugin'),
        forms, typography],

    darkMode: 'selector',
    
    

    // make sure to safelist these classes when using purge
    safelist: [
        'w-64',
        'w-1/2',
        'rounded-l-lg',
        'rounded-r-lg',
        'bg-gray-200',
        'grid-cols-4',
        'grid-cols-7',
        'h-6',
        'leading-6',
        'h-9',
        'leading-9',
        'shadow-lg'
    ],

    // enable dark mode via class strategy
    darkMode: 'class',

    theme: {
        extend: {
        // extend base Tailwind CSS utility classes
        }
    },
    plugins: [
        // include Flowbite as a plugin in your Tailwind CSS project
        require('flowbite/plugin')
    ]

};
