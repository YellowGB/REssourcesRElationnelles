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
                blanc: '#FCFCFC',
                noir: '#2E2E39',
                primaire: '#2E6DAA',
                secondaire: '#F4F2EA',
                gris: {
                    lightest: '#F2F0F0',
                    light:    '#F4F2EA',
                    normal:   '#C4C4C4',
                    dark:     '#2E2E39',
                    darkest:  '#16150F',
                },
                bleu: {
                    normal: '#0768C6',
                    dark:   '#2E6DAA',
                },
                violet: {
                    lightest: '#E0E0F4',
                    lighter:  '#9B9BD3',
                    light:    '#696987',
                    dark:     '#4B3666',
                    darkest:  '#414172',
                },
            },
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                heading: ['Raleway', 'sans-serif'],
            },
            spacing: {
                '128': '32rem',
            },
            gridTemplateColumns: {
                // Grid de la page catalogue
                'catalogue': '20% 60% 1fr',
            },       
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
