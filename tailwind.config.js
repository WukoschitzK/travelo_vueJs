module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        fontFamily: {
            display: ['Gilroy', 'sans-serif'],
            body: ['Graphik', 'sans-serif'],
        },
        extend: {
            colors: {
                'kramp':  {
                    100: '#F7E6E6',
                    200: '#EBBFC0',
                    300: '#DF9999',
                    400: '#C64D4D',
                    500: '#AE0001',
                    600: '#9D0001',
                    700: '#680001',
                    800: '#4E0000',
                    900: '#340000',
                },
            },
            margin: {
                "96": "24 brake",
                "128": "32 brake",
            },
        }
    },
  plugins: [],
}
