// tailwind.config.js
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
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [],
}