const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './app/views/**/*.blade.php',
        './app/views/**/*.php',
        './app/views/**/*.html',
        './app/views/**/*.js',
        './app/views/**/*.vue',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography')
    ],
}