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
                yellowDark: "#D9A106"
            },
            fontFamily: {
                body: ["Poppins", "Arial", "sans-serif"],
            },
            maxWidth: {
                '1/2': '50%',
                '2/6': '33%'
            }
        }
    },
  plugins: [],
}
