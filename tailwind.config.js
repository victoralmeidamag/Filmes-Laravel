/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      width: {
        '96' : '24rem', 
      }
    },
    spinner:(theme)=>({
      default: {
        color: '#f5f8fa',
        size: '1em',
        border: '2px',
        speed: '500ms',
      },
    })
  },
  plugins: [
      require('tailwindcss-spinner')(),
  ],
}

