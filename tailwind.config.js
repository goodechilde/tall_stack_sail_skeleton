const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');


module.exports = {
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'light-blue': colors.lightBlue,
                'cool-gray': colors.coolGray,
                'blue-gray': colors.blueGray,
                teal: colors.teal,
                'amber': colors.amber,
                'teal': colors.teal,
                'cyan': colors.cyan,
                'fuchsia': colors.fuchsia,
                'lime': colors.lime,
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
