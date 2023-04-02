/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#171717",
                secondary: "#E5E5E5",
                tertiary: "#3D3B3B",
            },
            margin: {},
        },
    },
    plugins: [],
};
