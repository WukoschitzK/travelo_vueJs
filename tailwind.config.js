const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        fontFamily: {
            'sans': ['"Poppins"', ...defaultTheme.fontFamily.sans],
            'serif': [...defaultTheme.fontFamily.serif],
            'mono': [...defaultTheme.fontFamily.mono]        },
        extend: {
            colors: {
                mainText: "#001427",
                yellow:  "#E6A900",
                yellowDark: "#D9A106"
            },

            maxWidth: {
                '1/2': '50%',
                '2/6': '33%'
            }
        }
    },
  plugins: [],
}
