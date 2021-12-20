module.exports = {
	purge: [
		'./storage/framework/views/*.php',
		'./resources/**/*.blade.php',
		'./resources/**/*.js',
		'./resources/**/*.vue',
	],
	content: [],
	theme: {
		container: {
			center: true
		},
		extend: {
			colors: {
				renault: {
					black: '#000',
					yellow: '#efdf00'
				}
			}
		},
	},
	plugins: [],
}