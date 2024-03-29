/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/../*.{html,js,css,php}",
    './components/**/*.{html,js,php}',
    './pages/**/*.{html,js,php}',
  ],
  theme: {
    extend: {
      fontFamily: {
        Rubik: ['Rubik', 'sans-serif'],
      }, //end of fontFamily
      colors: {
        transparent: 'transparent',
        current: 'currentColor',
        'system-error': '#e74c3c',
        'system-warn': '#e67e22',
        'white': '#FFFFFF',
        'black': '#000000',
      'background': {
          '50': '#F2F1ED', 
          '100': '#E8E4DC', 
          '200': '#C2B9AC', 
          '300': '#9E9182', 
          '400': '#57473B', 
          '500': '#0d0907', 
          '600': '#0D0806', 
          '700': '#0A0604', 
          '800': '#080402', 
          '900': '#050201', 
          '950': '#030100'
      },'primary': {
          '50': '#F5F9FA', 
          '100': '#F0F6F7', 
          '200': '#D8E7EB', 
          '300': '#C1D9E0', 
          '400': '#97B9C7', 
          '500': '#749aaf', 
          '600': '#5D859E', 
          '700': '#416785', 
          '800': '#2A4A69', 
          '900': '#18324F', 
          '950': '#0A1B33'
      },'secondary': {
          '50': '#F3F0F5', 
          '100': '#E7E1EB', 
          '200': '#C1B3C9', 
          '300': '#9B8AA8', 
          '400': '#574869', 
          '500': '#1c1627', 
          '600': '#181224', 
          '700': '#110C1C', 
          '800': '#0C0817', 
          '900': '#080412', 
          '950': '#04020A'
      },'accent': {
          '50': '#FCF9F2', 
          '100': '#FCF4E6', 
          '200': '#F7E2C1', 
          '300': '#F5CE9F', 
          '400': '#EB9B59', 
          '500': '#e4611b', 
          '600': '#CC5316', 
          '700': '#AB3E0F', 
          '800': '#872D09', 
          '900': '#661D05', 
          '950': '#421102'
      }
      },
    },
  },
  plugins: [],
}