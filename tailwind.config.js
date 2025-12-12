/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'light-blue': '#E8F4FD',
        'medium-blue': '#B8E0F5',
        'deep-blue': '#4A90E2',
        'gold': '#D4AF37',
        'dark-gold': '#B8860B',
        'light-gold': '#F7E98E',
        'gray': '#F8FAFC',
        'medium-gray': '#E2E8F0',
        'dark-gray': '#2D3748',
        'charcoal': '#1A202C',
      },
      fontFamily: {
        'serif': ['Playfair Display', 'serif'],
        'sans': ['Inter', 'sans-serif'],
        'script': ['Dancing Script', 'cursive'],
      },
      boxShadow: {
        'soft': '0 4px 20px rgba(0, 0, 0, 0.08)',
        'medium': '0 8px 30px rgba(0, 0, 0, 0.12)',
        'strong': '0 20px 60px rgba(0, 0, 0, 0.15)',
      },
      animation: {
        'fade-in-up': 'fadeInUp 0.8s ease-out forwards',
        'float': 'float 3s ease-in-out infinite',
        'pulse-gold': 'pulse-gold 2s infinite',
        'shimmer': 'shimmer 3s infinite',
      },
      keyframes: {
        fadeInUp: {
          'from': {
            opacity: '0',
            transform: 'translateY(30px)',
          },
          'to': {
            opacity: '1',
            transform: 'translateY(0)',
          },
        },
        float: {
          '0%, 100%': { transform: 'translateY(0px)' },
          '50%': { transform: 'translateY(-10px)' },
        },
        'pulse-gold': {
          '0%, 100%': { boxShadow: '0 0 0 0 rgba(212, 175, 55, 0.4)' },
          '50%': { boxShadow: '0 0 0 20px rgba(212, 175, 55, 0)' },
        },
        shimmer: {
          '0%': { transform: 'translateX(-100%) rotate(30deg)' },
          '100%': { transform: 'translateX(100%) rotate(30deg)' },
        },
      },
      backdropBlur: {
        'xs': '2px',
      },
    },
  },
  plugins: [],
}