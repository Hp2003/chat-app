/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
      ],
  theme: {
    extend: {
        keyframes :{
            slideIn : {
                '0%' : {width: "33.333333%"},
                '100%' : {width: "0%"},
            },
            slideOut : {
                '0%' : {width: "0%"},
                '100%' : {width: "33.333333%"},
            },
        },
        animation:{
            slideIn: 'slideIn 1s ease-in-out forwards',
            slideOut: 'slideOut 1s ease-in-out forwards',
        }
    },
  },
  plugins: [],
}

