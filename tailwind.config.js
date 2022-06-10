module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                mainText: "#001427",
                yellow:  "#E6A900",
            },
            fontFamily: {
                body: ["Poppins", "Arial", "sans-serif"],
            },
        }
    },
  plugins: [],
}
