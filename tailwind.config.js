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
            width: {
                175: "43.75rem",
            },
            backgroundImage: {
                "radial-dark":
                    "radial-gradient(50% 50% at 50% 50%, #4E4E4E 0%, #3D3B3B 99.99%, #3D3B3B 100%)",
            },
        },
    },
    plugins: [],
};
