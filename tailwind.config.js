module.exports = {
  purge: [
     './resources/**/*.blade.php',
     './resources/**/*.js',
     './resources/**/*.vue',
   ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
        theme: {
            colors: {
                transparent: 'transparent',
                current: 'currentColor',
                blue: {
                    light: '#85d7ff',
                    DEFAULT: '#1fb6ff',
                    dark: '#009eeb',
                },
                pink: {
                    light: '#ff7ce5',
                    DEFAULT: '#ff49db',
                    dark: '#ff16d1',
                }
            }
        }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
