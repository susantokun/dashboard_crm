const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    darkMode: "class",
    theme: {
        extend: {
            container: {
                center: true,
            },
            fontFamily: {
                sans: ['Work Sans', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: 'rgb(var(--color-primary))',
                secondary: 'rgb(var(--color-secondary))',
                success: 'rgb(var(--color-success))',
                info: 'rgb(var(--color-info))',
                warning: 'rgb(var(--color-warning))',
                pending: 'rgb(var(--color-pending))',
                danger: 'rgb(var(--color-danger))',
                light: 'rgb(var(--color-light))',
                dark: 'rgb(var(--color-dark))',
                darkmode: {
                    50: 'rgb(var(--color-darkmode-50))',
                    100: 'rgb(var(--color-darkmode-100))',
                    200: 'rgb(var(--color-darkmode-200))',
                    300: 'rgb(var(--color-darkmode-300))',
                    400: 'rgb(var(--color-darkmode-400))',
                    500: 'rgb(var(--color-darkmode-500))',
                    600: 'rgb(var(--color-darkmode-600))',
                    700: 'rgb(var(--color-darkmode-700))',
                    800: 'rgb(var(--color-darkmode-800))',
                    900: 'rgb(var(--color-darkmode-900))',
                },
            },
            typography: () => ({
                DEFAULT: {
                    css: [
                        {
                            strong: {
                                color: '',
                                fontWeight: '600',
                            },
                        },
                    ],
                },
            }),
            keyframes: {
                wiggle: {
                  '0%, 100%': { transform: 'rotate(-3deg)' },
                  '50%': { transform: 'rotate(3deg)' },
                }
              },
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require('@tailwindcss/typography'),
        require('@tailwindcss/line-clamp'),
        require('@tailwindcss/aspect-ratio'),
    ],
};
