module.exports = {
  purge: [
    './resources/views/**/*.blade.php',
    './resources/css/**/*.css',
  ],
  theme: {
    extend: {
        colors: {
            primary: '#FF6363',
            secondary: {
                100: '#E2E2D5',
                200: '#888883',
            }
        },
        fontFamily:{
            body: ['Nunito']
        }
    }
  },
  variants: {},
  plugins: [
    require('@tailwindcss/ui'),
  ]
}
