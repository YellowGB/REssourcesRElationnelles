const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/wire-elements/modal/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    options: {
        safelist: [
            "sm:max-w-sm",
            "sm:max-w-md",
            "sm:max-w-lg",
            "sm:max-w-xl",
            "sm:max-w-2xl",
            "sm:max-w-3xl",
            "sm:max-w-4xl",
            "sm:max-w-5xl",
            "sm:max-w-6xl",
            "sm:max-w-7xl"
        ]
    },

    darkMode: 'class',

    theme: {
        extend: {
            colors: {
                white: '#FCFCFC',
                black: '#2E2E39',
            },
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
