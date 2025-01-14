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
				dark: '#6A6A6A',
				light: ''
			},
			blue: {
				DEFAULT: '#43ACDF',
				dark: '#04437C',
				light: '#ebf3fe'
			},
			yellow: {
				DEFAULT: '#F9DB6D',
				dark: '#F9DB6D',
				light: ''
			},
			green: {
				DEFAULT: '#73AB84',
				dark: '#5B9C6F',
				light: ''
			},
			red: {
				DEFAULT: '#FF3A3A',
				dark: '',
				light: ''
			}
		},
		extend: {
			height: {
				section: 'calc(100vh - 90px)'
			},
			borderRadius: {
				'4xl': '2rem'
			},
			backgroundImage: () => ({
				hero: "url('./assets/bgImmeuble.png')",
        encombrants: "url('./assets/imgEncombrants.png')",
			})
		}
	},
	plugins: []
};
