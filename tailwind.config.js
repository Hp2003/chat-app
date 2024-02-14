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
            newSlideIn : {
                '0%' : { width: '300px' },
                '100%' : { wdith: '0px' },
            },
            newSlideOut : {
                '0%' : { width: '0px' },
                '100%' : { wdith: '300px' },
            },
            closeOptions : {
                '0%' : { width: '80px' },
                '100%' : { wdith: '0px' },
            },
            openOptions : {
                '0%' : { width: '0px' },
                '100%' : { wdith: '80px' },
            }
        },
        animation:{
            slideIn: 'slideIn 1s ease-in-out forwards',
            slideOut: 'slideOut 1s ease-in-out forwards',
            newSlideIn: 'newSlideIn 1s ease-in-out forwards',
            newSlideOut: 'newSlideOut 1s ease-in-out forwards',
            closeOptions: 'closeOptions 1s ease-in-out forwards',
            openOptions: 'openOptions 1s ease-in-out forwards',
        }
    },
  },
  plugins: [],
}

