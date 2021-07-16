const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                // sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                'main': ['Ubuntu', ...defaultTheme.fontFamily.sans]
            }, 
            colors: {
                'main-colour': '#E59A42',
                'main-colour-darker': '#ce8b3b',
                'main-gray': '#FAFAFA',
                'card-gray': '#F0F0F0',
                'main-green': '#29754B'
            },
            boxShadow: {
                '3xl': '0 2px 7px 0px rgba(0, 0, 0, 0.3)',
            }
        },
    },

    variants: {
        extend: {
            // opacity: ['disabled'],  //added by laravel breeze, delete if not useful
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
