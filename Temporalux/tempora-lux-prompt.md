# Tempora Lux — Website Brief for Claude Code

## What This Is

Build a 3-page website for **Tempora Lux**, a fictional Swiss luxury watch retailer. This is a school project (not a real business). The entire site is in **German**, using the formal "Sie" register throughout.

The brand offers two services: **buying** and **renting** premium Swiss timepieces.

---

## Brand Identity

**Tempora Lux** positions itself as an understated, high-trust Swiss watch house. The brand personality is quiet luxury — the kind of retailer that doesn't need to convince you it's premium because everything about the presentation already communicates it.

**Mood references:** Think editorial watch magazines, Swiss private banking aesthetics, gallery exhibition websites. Clean, warm, unhurried. Lots of breathing room. Nothing trendy or loud.

**Design direction:**
- Warm and muted — ivory and off-white backgrounds, charcoal (not black) for dark elements, a single warm gold/bronze accent used sparingly
- A refined serif for display headings (light weight, large scale, elegant), paired with a clean geometric sans-serif for body text, labels, and UI
- Sharp and architectural — minimal border-radius, thin borders, subtle shadows. Not rounded or bubbly
- Generous whitespace between sections. The site should feel spacious and unhurried
- Small uppercase labels with wide letter-spacing appear above major headings throughout the site (a recurring "eyebrow" pattern)
- Buttons are small, uppercase, and tracked-out. Three styles: solid dark, outline, and gold accent
- Hover states should be subtle — slight lifts, opacity changes, small arrow movements on links
- Since there are no real product photos, use styled placeholder boxes (a warm-toned rectangle with a faint icon suggesting where an image would go). Keep everything self-contained — no external image URLs

Beyond these principles, make your own design decisions. Layout, spacing, section ordering, animation details, and creative choices are yours.

---

## Site Structure

### All Pages Share:
- **Sticky navigation** with the text logo "Tempora Lux" (no image logo — the brand name in a serif font IS the logo), three nav links (Entdecken, Kaufen, Mieten), and two buttons (Anmelden, Registrieren). Active page should be visually indicated. On mobile: hamburger menu with animated bars that opens a full-screen overlay.
- **Auth modal** (demo only, no real backend). A modal with two panels — Login (email + password) and Register (Vorname, Nachname, E-Mail, Passwort with 8-char minimum, Passwort bestätigen). Client-side validation with German error messages. On valid submit, briefly show "Demo ✓ (kein Backend)" then close. Include commented-out code showing where a real `fetch()` call and SQL query would go. The nav buttons "Anmelden" and "Registrieren" trigger this modal.
- **Footer** — Dark background. Brand name and tagline ("Schweizer Luxusuhren — kaufen und mieten. Zeitlose Meisterwerke für Kenner."). Link columns for Kollektion (Uhren kaufen, Uhren mieten, Nach Marke, Bestseller) and Unternehmen (Über uns, Kontakt, Blog). Opening hours (Mo–Fr 09:00–18:30, Sa 10:00–17:00, So Geschlossen). Social links (Instagram, LinkedIn, Pinterest, YouTube — just use placeholder icons/text, these don't link anywhere real). Rechtliches (Datenschutz, Impressum). A disclaimer line: "Das ist ein Schulprojekt und keine reale Website." Bottom bar: "© 2025 Tempora Lux. Alle Rechte vorbehalten." and "Erstellt von: Kyle · Raphael · Kimo".

---

### Page 1: `index.html` — "Entdecken" (Homepage)

The homepage introduces the brand and funnels visitors toward buying or renting.

**Content to include:**

- **Hero** — Headline: "Exklusive Zeitmesser für Kenner". Body text about the curated collection of Swiss luxury watches available to buy or rent. Two CTAs leading to the Kaufen and Mieten pages.

- **Four value propositions:**
  1. Schweizer Präzision — certified manufacturers with decades of tradition
  2. Exklusive Marken — partnerships with Europe's most renowned watchmakers
  3. Flexible Miete — wear your dream watch before committing, rent for weeks or months
  4. Persönliche Beratung — experts help find the perfect watch for your style and occasion

- **Brand stats:** 45+ exclusive brands, 2800+ models available, 12 000+ satisfied customers, 18 years of experience. Tagline: "Vertrauen seit 2006".

- **Buy vs. Rent section** — Headline: "Own it — or wear it first". Explains the flexibility of buying for your collection or renting first. Key points: buy your dream watch, rent for any occasion, personal expert consultation included, certified authenticity for every piece. CTAs to both Kaufen and Mieten.

---

### Page 2: `kaufen.html` — "Uhren kaufen" (Buy)

The buying page builds trust and shows the product catalogue.

**Content to include:**

- **Hero** — Headline: "Uhren kaufen". Body text about decades of craftsmanship and precision in every piece. CTAs to explore the collection and a secondary link to the rental alternative.

- **Trust section** — "Warum Tempora Lux" / "Auf Vertrauen und Exzellenz gebaut". Three trust pillars:
  1. Zertifizierte Echtheit — every watch independently verified and documented
  2. Weltweiter Versand — insured global delivery with white-glove service
  3. 30 Tage Rückgabe — full refund if returned in perfect condition

- **Stats:** 5000+ watches sold, 8500+ satisfied customers, 45+ available brands. Tagline: "Vertraut von Sammlern und Enthusiasten weltweit".

- **Product catalogue** — 6 watches displayed in a grid:

  | Brand | Model | Price |
  |---|---|---|
  | Rolex | Submariner | CHF 12 200 |
  | Omega | Seamaster | CHF 7 400 |
  | Patek Philippe | Nautilus | CHF 68 000 |
  | Tudor | Black Bay | CHF 4 150 |
  | Breitling | Navitimer | CHF 8 900 |
  | Jaeger-LeCoultre | Reverso Sublime | CHF 22 500 |

  Each watch card should show: image placeholder, brand (small label), model name, and price. Include a "Alle Uhren anzeigen" button below.

- **Newsletter signup** — Headline: "Abonnement". Body text about receiving exclusive model updates. Email input field with "Abonnieren" button. Small privacy note underneath. Dark background section.

---

### Page 3: `mieten.html` — "Uhren mieten" (Rent)

The rental page explains the concept, shows pricing tiers, and displays available watches.

**Content to include:**

- **Hero** — Headline: "Luxus auf Zeit — ohne Kompromisse". Body text about wearing your dream watch before deciding, with flexibility, insurance, and personal consultation.

- **Rental concept section** — Explains the mieten experience with supporting imagery.

- **Pricing tiers** — Three plans, with the middle tier visually highlighted as recommended:

  | Tier | Price | Note |
  |---|---|---|
  | Basic | CHF 99/Mt. | — |
  | Premium | CHF 249/Mt. | "Am beliebtesten" (most popular) |
  | Excellence | CHF 799/Mt. | "Für Kenner" (for connoisseurs) |

- **Feature comparison** — What's included per tier:

  | Feature | Basic | Premium | Excellence |
  |---|---|---|---|
  | Uhrenauswahl | Limitiert | Erweitert | Vollständig |
  | Versicherung | Basis | Vollkasko | Vollkasko+ |
  | Wechsel pro Monat | 1 | 2 | Unbegrenzt |
  | Persönliche Beratung | ✗ | ✓ | ✓ |
  | Exklusive Events | ✗ | ✗ | ✓ |
  | Kaufoption mit Rabatt | ✗ | ✓ | ✓ |
  | Concierge-Service | ✗ | ✗ | ✓ |

  Present this however reads best — table, grid, cards, whatever works.

- **Rental catalogue** — 6 watches in a grid:

  | Tier | Brand + Model | Monthly Price |
  |---|---|---|
  | Basic | Rolex Submariner | CHF 280/Mt. |
  | Premium | Omega Seamaster | CHF 250/Mt. |
  | Excellence | Patek Philippe Nautilus | CHF 1 600/Mt. |
  | Basic | Tudor Black Bay | CHF 95/Mt. |
  | Premium | Breitling Navitimer | CHF 420/Mt. |
  | Excellence | Jaeger-LeCoultre Reverso | CHF 1 600/Mt. |

  Each card shows: image placeholder, tier label, model name, monthly price.

- **Testimonials** — 3 customer quotes:
  1. **Marcus Weber**, Unternehmer, Zürich — about the freedom of wearing different watches without commitment
  2. **Elena Rossi**, Ärztin, Lugano — about flawless service and fast customer support
  3. **James Mitchell**, Geschäftsführer, Basel — about honest pricing with no hidden fees

  Each with a 5-star rating and small avatar placeholder.

- **Newsletter signup** — Same content as on the kaufen page.

---

## Technical Requirements

- **Pure HTML, CSS, and vanilla JavaScript.** No frameworks, no build tools, no dependencies.
- **3 HTML files**, **1 shared CSS file** (`style.css`), **1 shared JS file** (`main.js`).
- Use CSS custom properties for design tokens (colors, fonts, key spacing values).
- Fully responsive: desktop, tablet, mobile.
- Newsletter form: basic client-side email validation with visual feedback (no backend).
- Smooth scroll behavior.
- Semantic HTML.
