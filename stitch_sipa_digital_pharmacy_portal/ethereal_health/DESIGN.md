---
name: Ethereal Health
colors:
  surface: '#fcf8ff'
  surface-dim: '#dad6ff'
  surface-bright: '#fcf8ff'
  surface-container-lowest: '#ffffff'
  surface-container-low: '#f6f2ff'
  surface-container: '#efebff'
  surface-container-high: '#e9e5ff'
  surface-container-highest: '#e3dfff'
  on-surface: '#181445'
  on-surface-variant: '#4a4455'
  inverse-surface: '#2d2a5b'
  inverse-on-surface: '#f3eeff'
  outline: '#7b7487'
  outline-variant: '#ccc3d8'
  surface-tint: '#732ee4'
  primary: '#630ed4'
  on-primary: '#ffffff'
  primary-container: '#7c3aed'
  on-primary-container: '#ede0ff'
  inverse-primary: '#d2bbff'
  secondary: '#5f5a7c'
  on-secondary: '#ffffff'
  secondary-container: '#dcd5fd'
  on-secondary-container: '#605b7d'
  tertiary: '#524b5e'
  on-tertiary: '#ffffff'
  tertiary-container: '#6b6376'
  on-tertiary-container: '#ece1f8'
  error: '#ba1a1a'
  on-error: '#ffffff'
  error-container: '#ffdad6'
  on-error-container: '#93000a'
  primary-fixed: '#eaddff'
  primary-fixed-dim: '#d2bbff'
  on-primary-fixed: '#25005a'
  on-primary-fixed-variant: '#5a00c6'
  secondary-fixed: '#e5deff'
  secondary-fixed-dim: '#c8c2e9'
  on-secondary-fixed: '#1b1735'
  on-secondary-fixed-variant: '#474363'
  tertiary-fixed: '#e9def5'
  tertiary-fixed-dim: '#cdc2d9'
  on-tertiary-fixed: '#1e1929'
  on-tertiary-fixed-variant: '#4a4456'
  background: '#fcf8ff'
  on-background: '#181445'
  surface-variant: '#e3dfff'
typography:
  display-lg:
    fontFamily: Plus Jakarta Sans
    fontSize: 48px
    fontWeight: '800'
    lineHeight: '1.1'
    letterSpacing: -0.02em
  headline-lg:
    fontFamily: Plus Jakarta Sans
    fontSize: 32px
    fontWeight: '700'
    lineHeight: '1.2'
    letterSpacing: -0.01em
  headline-lg-mobile:
    fontFamily: Plus Jakarta Sans
    fontSize: 28px
    fontWeight: '700'
    lineHeight: '1.2'
  headline-md:
    fontFamily: Plus Jakarta Sans
    fontSize: 24px
    fontWeight: '600'
    lineHeight: '1.3'
  body-lg:
    fontFamily: Plus Jakarta Sans
    fontSize: 18px
    fontWeight: '400'
    lineHeight: '1.6'
  body-md:
    fontFamily: Plus Jakarta Sans
    fontSize: 16px
    fontWeight: '400'
    lineHeight: '1.6'
  label-md:
    fontFamily: Plus Jakarta Sans
    fontSize: 14px
    fontWeight: '600'
    lineHeight: '1.4'
    letterSpacing: 0.02em
  label-sm:
    fontFamily: Plus Jakarta Sans
    fontSize: 12px
    fontWeight: '700'
    lineHeight: '1.2'
rounded:
  sm: 0.25rem
  DEFAULT: 0.5rem
  md: 0.75rem
  lg: 1rem
  xl: 1.5rem
  full: 9999px
spacing:
  unit: 8px
  container-max: 1280px
  gutter: 24px
  margin-mobile: 16px
  margin-desktop: 40px
---

## Brand & Style
The design system is engineered for a next-gen healthcare platform that bridges the gap between clinical precision and human-centric empathy. The brand personality is **Futuristic, Premium, and Professional**. It avoids the sterile coldness of traditional medicine, instead opting for a sophisticated digital-first aesthetic that evokes a sense of "technological wellness."

The visual style is a hybrid of **Minimalism** and **Glassmorphism**. It utilizes expansive white space and high-contrast typography to ensure medical clarity, while employing subtle lavender blurs and soft translucent layers to signify its cutting-edge, digital-native DNA. The emotional response is one of calm confidence—reassuring the user through structural stability while exciting them with a modern, high-end interface.

## Colors
The palette is built on a foundation of high-contrast accessibility. The **Primary Purple (#7C3AED)** serves as the "Action" color, used for critical UI paths, active states, and brand markers. The **Secondary Lavender (#DDD6FE)** provides a soft counterpoint, used for large-scale backgrounds, subtle grouping, and decorative accents.

Text is rendered in **Deep Purple-Indigo (#1E1B4B)** rather than pure black to maintain a sophisticated tonal relationship with the brand colors while ensuring maximum legibility. Surfaces are primarily **Pure White (#FFFFFF)** to maintain a clean, clinical feel, with **Off-White (#F9FAFB)** used to differentiate background sections and card containers.

## Typography
Plus Jakarta Sans is the sole typeface for this design system, chosen for its modern, geometric clarity and friendly terminal endings. The typographic hierarchy emphasizes a strong "Display" style for onboarding and hero sections to establish the premium feel.

Body copy maintains a generous line height (1.6) to reduce cognitive load—essential for healthcare data. Labels and secondary metadata utilize slightly tighter tracking and increased weights to differentiate them from prose. Headlines use negative letter-spacing to appear more compact and "designed" at larger scales.

## Layout & Spacing
This design system utilizes a **12-column fluid grid** for desktop and a **4-column grid** for mobile. The spacing rhythm is strictly based on an **8px base unit**, ensuring mathematical harmony across all components.

- **Desktop:** 12 columns, 24px gutters, 40px side margins.
- **Tablet:** 8 columns, 20px gutters, 24px side margins.
- **Mobile:** 4 columns, 16px gutters, 16px side margins.

Content is organized in "Deep Sections," using generous vertical padding (80px–120px) on landing pages to reinforce the premium, breathable aesthetic. Functional dashboards use tighter vertical spacing (16px–24px) to maximize data density.

## Elevation & Depth
Depth is communicated through **Tonal Layers** and **Ambient Shadows**. Instead of traditional grey shadows, this system uses "Tinted Shadows"—low-opacity purples (#7C3AED at 8-12%) to keep the UI feeling vibrant and cohesive.

1.  **Level 0 (Base):** #F9FAFB background.
2.  **Level 1 (Cards):** #FFFFFF surface with a 1px border (#F3E8FF) and no shadow.
3.  **Level 2 (Interactive):** #FFFFFF surface with a soft, diffused purple shadow (Y: 4, Blur: 20).
4.  **Level 3 (Overlays/Modals):** Pure white surface with a high-contrast shadow and a 40% backdrop blur on the layer below to create a glassmorphic "focus" effect.

## Shapes
The shape language is defined by **Medium Roundedness**. All standard components (Inputs, Buttons, Cards) utilize an **8px (0.5rem)** corner radius. 

Larger containers like Modals and Sections use **16px (1rem)** to feel more approachable. This consistent curvature balances the "clinical" precision of the layout with a "humanist" softness, reinforcing the approachable nature of the healthcare platform. Icons should always feature rounded caps and joins to match this geometry.

## Components
- **Buttons:** Primary buttons are solid #7C3AED with white text. Secondary buttons use a #F3E8FF fill with #7C3AED text. Both feature 8px rounding and semi-bold labels.
- **Input Fields:** Use a 1px #DDD6FE border on a white background. On focus, the border thickens to 2px #7C3AED with a soft purple outer glow.
- **Cards:** Cards are white with an 8px radius. They should use a 1px border (#F3E8FF) rather than a shadow for a cleaner, modern look, only elevating with a shadow on hover.
- **Chips/Badges:** Use "Pastel Active" states—a light lavender background (#F3E8FF) with deep purple text (#1E1B4B) for status indicators.
- **Lists:** High-contrast separators using 1px #F3E8FF. Each list item should have a generous 16px vertical padding.
- **Health-Specific:** 
    - **Vitals Monitors:** Large display-type numbers with a subtle gradient background.
    - **Progress Rings:** Use #7C3AED for completed segments and #F3E8FF for the track.