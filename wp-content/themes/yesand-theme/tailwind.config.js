const theme = require('./theme.json');
const tailpress = require("@jeffreyvr/tailwindcss-tailpress");

/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [
		'./*.php',
		'./**/*.php',
		'./static/*.html',
		'./resources/css/*.css',
		'./resources/js/*.js',
		'./safelist.txt'
	],
	theme: {
		fontFamily: {
			'sans': ['Gilroy', 'ui-sans-serif', 'system-ui', '-apple-system', 'BlinkMacSystemFont', "Segoe UI", 'Roboto', "Helvetica Neue", 'Arial', "Noto Sans", 'sans-serif', "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"],
			'gilroy': ['Gilroy', 'sans-serif']
		},
		container: {
			padding: {
				DEFAULT: '1rem',
				sm: '2rem',
				lg: '0rem'
			},
		},
		screens: {
			'xs': '480px',
			'sm': '640px',
			'md': '768px',
			'lg': '1024px',
			'xl': '1280px',
			'2xl': '1440px',
		},
		extend: {
			colors: tailpress.colorMapper(tailpress.theme('settings.color.palette', theme)),
			fontSize: tailpress.fontSizeMapper(tailpress.theme('settings.typography.fontSizes', theme))
		}
	},
	plugins: [
		tailpress.tailwind
	]
};

