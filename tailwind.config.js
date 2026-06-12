import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                "outline": "#7b7487",
                "on-secondary-fixed": "#1b1735",
                "secondary-container": "#dcd5fd",
                "inverse-primary": "#d2bbff",
                "tertiary-fixed-dim": "#cdc2d9",
                "error": "#ba1a1a",
                "surface": "#fcf8ff",
                "surface-container-high": "#e9e5ff",
                "tertiary-container": "#6b6376",
                "on-background": "#181445",
                "on-surface": "#181445",
                "surface-container-low": "#f6f2ff",
                "primary-fixed": "#eaddff",
                "inverse-on-surface": "#f3eeff",
                "surface-tint": "#732ee4",
                "surface-variant": "#e3dfff",
                "on-secondary-container": "#605b7d",
                "secondary-fixed": "#e5deff",
                "primary": "#630ed4",
                "surface-bright": "#fcf8ff",
                "outline-variant": "#ccc3d8",
                "on-primary-fixed-variant": "#5a00c6",
                "on-primary": "#ffffff",
                "on-primary-fixed": "#25005a",
                "secondary-fixed-dim": "#c8c2e9",
                "tertiary": "#524b5e",
                "primary-fixed-dim": "#d2bbff",
                "primary-container": "#7c3aed",
                "secondary": "#5f5a7c",
                "surface-container": "#efebff",
                "on-tertiary-fixed-variant": "#4a4456",
                "surface-container-highest": "#e3dfff",
                "on-surface-variant": "#4a4455",
                "on-secondary-fixed-variant": "#474363",
                "on-tertiary-fixed": "#1e1929",
                "error-container": "#ffdad6",
                "on-error": "#ffffff",
                "on-error-container": "#93000a",
                "on-secondary": "#ffffff",
                "on-tertiary": "#ffffff",
                "surface-dim": "#dad6ff",
                "tertiary-fixed": "#e9def5",
                "surface-container-lowest": "#ffffff",
                "inverse-surface": "#2d2a5b",
                "background": "#fcf8ff",
                "on-primary-container": "#ede0ff",
                "on-tertiary-container": "#ece1f8"
            },
            borderRadius: {
                "DEFAULT": "0.25rem",
                "lg": "0.5rem",
                "xl": "0.75rem",
                "full": "9999px"
            },
            spacing: {
                "margin-desktop": "40px",
                "unit": "8px",
                "gutter": "24px",
                "container-max": "1280px",
                "margin-mobile": "16px"
            },
            fontFamily: {
                sans: ['Plus Jakarta Sans', ...defaultTheme.fontFamily.sans],
                "label-sm": ["Plus Jakarta Sans"],
                "headline-lg-mobile": ["Plus Jakarta Sans"],
                "body-lg": ["Plus Jakarta Sans"],
                "label-md": ["Plus Jakarta Sans"],
                "body-md": ["Plus Jakarta Sans"],
                "display-lg": ["Plus Jakarta Sans"],
                "headline-md": ["Plus Jakarta Sans"],
                "headline-lg": ["Plus Jakarta Sans"]
            },
            fontSize: {
                "label-sm": ["12px", {"lineHeight": "1.2", "fontWeight": "700"}],
                "headline-lg-mobile": ["28px", {"lineHeight": "1.2", "fontWeight": "700"}],
                "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                "label-md": ["14px", {"lineHeight": "1.4", "letterSpacing": "0.02em", "fontWeight": "600"}],
                "body-md": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}],
                "display-lg": ["48px", {"lineHeight": "1.1", "letterSpacing": "-0.02em", "fontWeight": "800"}],
                "headline-md": ["24px", {"lineHeight": "1.3", "fontWeight": "600"}],
                "headline-lg": ["32px", {"lineHeight": "1.2", "letterSpacing": "-0.01em", "fontWeight": "700"}]
            }
        },
    },

    plugins: [forms],
};
