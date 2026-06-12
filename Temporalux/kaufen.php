<?php
$conn = new mysqli(
    "localhost",
    "kimo_estermann",
    "Tempora_Lux",
    "kimo-estermann1_"
);

if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM uhren");
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Uhren kaufen — Tempora Lux</title>
  <meta name="description" content="Kaufen Sie zertifizierte Schweizer Luxusuhren bei Tempora Lux — Rolex, Omega, Patek Philippe und mehr. Echtheit garantiert." />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;1,400&family=Jost:wght@300;400;500&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="style.css" />
</head>
<body>

  <!-- ================= NAVIGATION ================= -->
  <header class="nav">
    <div class="container nav__inner">
      <a href="index.php" class="brand">Tempora<span class="brand__dot">·</span>Lux</a>
      <nav class="nav__links" aria-label="Hauptnavigation">
        <a href="index.php" class="nav__link">Entdecken</a>
        <a href="kaufen.php" class="nav__link is-active">Kaufen</a>
        <a href="mieten.php" class="nav__link">Mieten</a>
        <a href="kontakt.html" class="nav__link">Kontakt</a>
      </nav>
      <button class="nav__burger" aria-label="Menü öffnen" aria-expanded="false" aria-controls="mobile-menu">
        <span></span><span></span><span></span>
      </button>
    </div>
  </header>

  <div class="mobile-menu" id="mobile-menu">
    <nav class="mobile-menu__links" aria-label="Mobile Navigation">
      <a href="index.php" class="mobile-menu__link">Entdecken</a>
      <a href="kaufen.php" class="mobile-menu__link is-active">Kaufen</a>
      <a href="mieten.php" class="mobile-menu__link">Mieten</a>
      <a href="kontakt.html" class="mobile-menu__link">Kontakt</a>
    </nav>
  </div>

  <main>
    <!-- ================= HERO ================= -->
    <section class="hero">
      <div class="container hero__grid">
        <div class="hero__copy">
          <span class="eyebrow reveal">Die Kollektion</span>
          <h1 class="display-1 hero__title reveal" data-delay="1">Uhren kaufen</h1>
          <p class="lead reveal" data-delay="2">
            Jahrzehnte der Handwerkskunst und Präzision stecken in jedem Stück. Entdecken Sie
            eine Auswahl Schweizer Meisterwerke — unabhängig geprüft, lückenlos dokumentiert
            und bereit, ein Leben lang getragen zu werden.
          </p>
          <div class="hero__cta reveal" data-delay="3">
            <a href="#kollektion" class="btn btn--solid">Kollektion entdecken <span class="arrow">→</span></a>
            <a href="mieten.php" class="btn btn--outline">Lieber mieten? <span class="arrow">→</span></a>
          </div>
        </div>
        <div class="hero__visual reveal" data-delay="2">
          <div class="ph ph--hero">
            <img
    src="assets/hero_kaufen.png"
    alt="Luxusuhr Tempora Lux"
    class="hero__image"
  >
          </div>
        </div>
      </div>
    </section>

    <!-- ================= TRUST ================= -->
    <section class="section">
      <div class="container">
        <div class="section-head section-head--center reveal">
          <span class="eyebrow eyebrow--center">Warum Tempora Lux</span>
          <h2 class="display-2">Auf Vertrauen und Exzellenz gebaut</h2>
        </div>

        <div class="feature-grid" style="grid-template-columns:repeat(3,1fr)">
          <div class="feature reveal">
            <div class="feature__icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M12 3l7 3v5c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V6z" stroke-linejoin="round"/><path d="M9 12l2 2 4-4.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            <h3>Zertifizierte Echtheit</h3>
            <p>Jede Uhr wird unabhängig verifiziert und vollständig dokumentiert. Sie wissen genau, was Sie tragen.</p>
          </div>
          <div class="feature reveal" data-delay="1">
            <div class="feature__icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c2.5 2.5 2.5 15 0 18M12 3c-2.5 2.5-2.5 15 0 18" /></svg>
            </div>
            <h3>Weltweiter Versand</h3>
            <p>Versicherte Lieferung rund um den Globus — mit White-Glove-Service bis vor Ihre Tür.</p>
          </div>
          <div class="feature reveal" data-delay="2">
            <div class="feature__icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M3 12a9 9 0 109-9" stroke-linecap="round"/><path d="M3 5v4h4" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 8v4l3 2" stroke-linecap="round"/></svg>
            </div>
            <h3>30 Tage Rückgabe</h3>
            <p>Volle Rückerstattung, sofern die Uhr in einwandfreiem Zustand zurückgesendet wird. Ohne Risiko.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- ================= STATS ================= -->
    <section class="section stats">
      <div class="container">
        <div class="stats__grid" style="grid-template-columns:repeat(3,1fr)">
          <div class="reveal"><div class="stat__n">5 000<span class="accent">+</span></div><div class="stat__l">Verkaufte Uhren</div></div>
          <div class="reveal" data-delay="1"><div class="stat__n">8 500<span class="accent">+</span></div><div class="stat__l">Zufriedene Kunden</div></div>
          <div class="reveal" data-delay="2"><div class="stat__n">45<span class="accent">+</span></div><div class="stat__l">Verfügbare Marken</div></div>
        </div>
        <p class="stats__tagline reveal">Vertraut von Sammlern und Enthusiasten weltweit</p>
      </div>
    </section>

    <!-- ================= CATALOGUE ================= -->
    <section class="section" id="kollektion">
      <div class="container">
        <div class="section-head reveal">
          <span class="eyebrow">Die Auswahl</span>
          <h2 class="display-2">Ausgewählte Zeitmesser</h2>
          <p class="lead" style="margin-top:1.2rem">Sechs Ikonen der Uhrmacherkunst — jede mit ihrer eigenen Geschichte.</p>
        </div>

<div class="product-grid">

<?php while($row = $result->fetch_assoc()): ?>

<article class="card reveal">

    <div class="card__image">
        <img
            src="<?= htmlspecialchars($row['Picture']); ?>"
            alt="<?= htmlspecialchars($row['Uhren_Name']); ?>"
            style="width:100%;height:300px;object-fit:cover;"
        >
    </div>

    <div class="card__body">

        <span class="card__brand">
            <?= htmlspecialchars($row['Marke']); ?>
        </span>

        <h3 class="card__model">
            <?= htmlspecialchars($row['Uhren_Name']); ?>
        </h3>

        <div class="card__foot">

            <span class="card__price">
                CHF <?= number_format($row['Preis'], 2); ?>
            </span>

            <a class="card__cta"
               href="kontakt.html?betreff=<?= urlencode($row['Uhren_Name']); ?>&typ=kaufen">
               Bestellen <span class="arrow">→</span>
            </a>

        </div>

        <p>
            <?= htmlspecialchars($row['Uhrenart']); ?>
            ·
            <?= htmlspecialchars($row['Design']); ?>
            ·
            <?= htmlspecialchars($row['Material']); ?>
        </p>

    </div>

</article>

<?php endwhile; ?>

</div>

        <div class="center reveal" style="margin-top:3.5rem">
          <a href="kontakt.html?typ=kaufen" class="btn btn--outline">Beratung anfragen <span class="arrow">→</span></a>
        </div>
      </div>
    </section>

    <!-- ================= NEWSLETTER ================= -->
    <section class="section newsletter">
      <div class="container newsletter__inner reveal">
        <span class="eyebrow eyebrow--light eyebrow--center">Abonnement</span>
        <h2 class="display-2">Bleiben Sie auf dem Laufenden</h2>
        <p>Erhalten Sie exklusive Neuigkeiten zu neuen Modellen, seltenen Stücken und privaten Verkaufsanlässen — direkt in Ihr Postfach.</p>
        <form class="newsletter__form" data-newsletter novalidate>
          <input type="email" name="email" placeholder="Ihre E-Mail-Adresse" aria-label="E-Mail-Adresse" />
          <button type="submit" class="btn btn--gold">Abonnieren</button>
        </form>
        <p class="form-msg" role="status" aria-live="polite"></p>
        <p class="newsletter__note">Sie können sich jederzeit abmelden. Wir geben Ihre Daten niemals weiter.</p>
      </div>
    </section>
  </main>

  <!-- ================= FOOTER ================= -->
  <footer class="footer">
    <div class="container">
      <div class="footer__top">
        <div class="footer__brand-col">
          <div class="footer__brand">Tempora<span class="brand__dot">·</span>Lux</div>
          <p class="footer__tag">Schweizer Luxusuhren — kaufen und mieten. Zeitlose Meisterwerke für Kenner.</p>
          <div class="footer__social">
            <a href="https://www.instagram.com" target="_blank" rel="noopener" aria-label="Instagram"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg></a>
            <a href="https://www.linkedin.com" target="_blank" rel="noopener" aria-label="LinkedIn"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="3"/><path d="M7 10v7M7 7v.01M11 17v-4a2 2 0 014 0v4" stroke-linecap="round"/></svg></a>
            <a href="https://www.pinterest.com" target="_blank" rel="noopener" aria-label="Pinterest"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7c-2 0-3.2 1.4-3.2 3 0 1 .5 1.6 1 1.6.3 0 .4-.6.4-.9 0-.6-.6-1 0-1.9.4-.6 2.4-.9 3.1.4.5 1 .1 2.6-.7 3.3-.7.6-1.7.3-1.9-.4M11 13.5L9.8 18" stroke-linecap="round"/></svg></a>
            <a href="https://www.youtube.com" target="_blank" rel="noopener" aria-label="YouTube"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" aria-hidden="true"><rect x="3" y="6" width="18" height="12" rx="3"/><path d="M11 9.5l3.5 2.5L11 14.5z" fill="currentColor" stroke="none"/></svg></a>
          </div>
        </div>
        <div class="footer__col">
          <h4>Kollektion</h4>
          <ul>
            <li><a href="kaufen.php">Uhren kaufen</a></li>
            <li><a href="mieten.php">Uhren mieten</a></li>
          </ul>
        </div>
        <div class="footer__col">
          <h4>Unternehmen</h4>
          <ul>
            <li><a href="index.php">Über uns</a></li>
            <li><a href="kontakt.html">Kontakt</a></li>
          </ul>
        </div>
        <div class="footer__col">
          <h4>Boutique</h4>
          <address class="footer__address">
            Bahnhofstrasse 1<br>
            8001 Zürich<br>
            Schweiz
          </address>
          <p class="footer__hours-label">Öffnungszeiten</p>
          <dl class="footer__hours">
            <div><dt>Mo–Fr</dt> 09:00–18:30</div>
            <div><dt>Sa</dt> 10:00–17:00</div>
            <div class="closed"><dt>So</dt> Geschlossen</div>
          </dl>
        </div>
      </div>

      <p class="footer__disclaimer">Das ist ein Schulprojekt und keine reale Website.</p>

      <div class="footer__bottom">
        <span>© 2025 Tempora Lux. Alle Rechte vorbehalten.</span>
        <div class="footer__legal">
          <a href="#">Datenschutz</a>
          <a href="#">Impressum</a>
        </div>
        <span>Erstellt von: Kyle · Raphael · Kimo</span>
      </div>
    </div>
  </footer>

  <script src="main.js"></script>
</body>
</html>
