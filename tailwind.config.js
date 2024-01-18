/** @type {import('tailwindcss').Config} */
export default {
	content: ['./src/**/*.{html,js,ts,svelte}'],
	theme: {
		colors: {
			black: {
				DEFAULT: '#333333',
				dark: '',
				light: ''
			},
			white: {
				DEFAULT: '#FFFFFF',
				dark: '',
				light: ''
			},
			lightgray: {
				DEFAULT: '#F8F8F8',
				dark: '',
				light: '',
			},
			blue: {
				DEFAULT: '#43ACDF', 
				dark: '#2541B2',
				light: '',
			},
			yellow: {
				DEFAULT: '#F9DB6D',
				dark: '#F9DB6D',
				light: '',
			},
			green: {
				DEFAULT: '#73AB84',
				dark: '#5B9C6F',
				light: '',
			},
			red: {
				DEFAULT: '#FF3A3A',
				dark: '',
				light: ''
			}
		},
		extend: {}
	},
	plugins: []
};
