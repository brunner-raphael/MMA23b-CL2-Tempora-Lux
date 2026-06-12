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

$result = $conn->query("
    SELECT *
    FROM uhren
    ORDER BY Uhren_ID DESC
    LIMIT 3
");
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tempora Lux — Exklusive Schweizer Luxusuhren kaufen &amp; mieten</title>
  <meta name="description" content="Tempora Lux — kuratierte Schweizer Luxusuhren zum Kaufen oder Mieten. Zeitlose Meisterwerke für Kenner." />

  <!-- Webfonts: refined serif + geometric sans (Schulprojekt) -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;1,400&family=Jost:wght@300;400;500&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="style.css" />
  <script src="main.js" defer></script>
  <script src="game.js" defer></script>
</head>
<body>

  <!-- ================= NAVIGATION ================= -->
  <header class="nav">
    <div class="container nav__inner">
      <a href="index.php" class="brand">Tempora<span class="brand__dot">·</span>Lux</a>

      <nav class="nav__links" aria-label="Hauptnavigation">
        <a href="index.php" class="nav__link is-active">Entdecken</a>
        <a href="kaufen.php" class="nav__link">Kaufen</a>
        <a href="mieten.php" class="nav__link">Mieten</a>
        <a href="kontakt.html" class="nav__link">Kontakt</a>
      </nav>

      <button class="nav__burger" aria-label="Menü öffnen" aria-expanded="false" aria-controls="mobile-menu">
        <span></span><span></span><span></span>
      </button>
    </div>
  </header>

  <!-- Mobile overlay -->
  <div class="mobile-menu" id="mobile-menu">
    <nav class="mobile-menu__links" aria-label="Mobile Navigation">
      <a href="index.php" class="mobile-menu__link is-active">Entdecken</a>
      <a href="kaufen.php" class="mobile-menu__link">Kaufen</a>
      <a href="mieten.php" class="mobile-menu__link">Mieten</a>
      <a href="kontakt.html" class="mobile-menu__link">Kontakt</a>
    </nav>
  </div>

  <main>
    <!-- ================= HERO ================= -->
    <section class="hero">
      <div class="container hero__grid">
        <div class="hero__copy">
          <span class="eyebrow reveal">Schweizer Luxusuhren seit 2006</span>
          <h1 class="display-1 hero__title reveal" data-delay="1">Exklusive Zeitmesser für Kenner</h1>
          <p class="lead reveal" data-delay="2">
            Eine sorgfältig kuratierte Sammlung Schweizer Luxusuhren — zum Kaufen für Ihre
            Sammlung oder zum Mieten für den besonderen Moment. Zeitlose Meisterwerke,
            mit zertifizierter Echtheit und persönlicher Beratung.
          </p>
          <div class="hero__cta reveal" data-delay="3">
            <a href="kaufen.php" class="btn btn--solid">Uhren kaufen <span class="arrow">→</span></a>
            <a href="mieten.php" class="btn btn--outline">Uhren mieten <span class="arrow">→</span></a>
          </div>

          <div class="hero__meta reveal" data-delay="3">
            <div class="hero__meta-item"><span class="n">45+</span><span class="l">Marken</span></div>
            <div class="hero__meta-item"><span class="n">2 800+</span><span class="l">Modelle</span></div>
            <div class="hero__meta-item"><span class="n">18</span><span class="l">Jahre Erfahrung</span></div>
          </div>
        </div>

        <div class="hero__visual reveal" data-delay="2">
  <img
    src="assets/hero.png"
    alt="Luxusuhr Tempora Lux"
    class="hero__image"
  >
</div>
      </div>
    </section>

    <!-- ================= VALUE PROPS ================= -->
    <section class="section">
      <div class="container">
        <div class="section-head reveal">
          <span class="eyebrow">Warum Tempora Lux</span>
          <h2 class="display-2">Vier Versprechen an den Kenner</h2>
        </div>

        <div class="feature-grid">
          <div class="feature reveal">
            <span class="feature__num">01</span>
            <h3>Schweizer Präzision</h3>
            <p>Zertifizierte Manufakturen mit jahrzehntelanger Tradition — jede Uhr ein Zeugnis feinster Handwerkskunst.</p>
          </div>
          <div class="feature reveal" data-delay="1">
            <span class="feature__num">02</span>
            <h3>Exklusive Marken</h3>
            <p>Partnerschaften mit den renommiertesten Uhrmachern Europas. Namen, die für Beständigkeit stehen.</p>
          </div>
          <div class="feature reveal" data-delay="2">
            <span class="feature__num">03</span>
            <h3>Flexible Miete</h3>
            <p>Tragen Sie Ihre Traumuhr, bevor Sie sich festlegen — für Wochen oder Monate, ganz nach Ihrem Wunsch.</p>
          </div>
          <div class="feature reveal" data-delay="3">
            <span class="feature__num">04</span>
            <h3>Persönliche Beratung</h3>
            <p>Unsere Experten finden die perfekte Uhr für Ihren Stil und jeden Anlass. Diskret und unaufdringlich.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- ================= STATS ================= -->
    <section class="section stats">
      <div class="container">
        <div class="stats__grid">
          <div class="reveal"><div class="stat__n">45<span class="accent">+</span></div><div class="stat__l">Exklusive Marken</div></div>
          <div class="reveal" data-delay="1"><div class="stat__n">2 800<span class="accent">+</span></div><div class="stat__l">Verfügbare Modelle</div></div>
          <div class="reveal" data-delay="2"><div class="stat__n">12 000<span class="accent">+</span></div><div class="stat__l">Zufriedene Kunden</div></div>
          <div class="reveal" data-delay="3"><div class="stat__n">18</div><div class="stat__l">Jahre Erfahrung</div></div>
        </div>
        <p class="stats__tagline reveal">Vertrauen seit 2006</p>
      </div>
    </section>

    <!-- ================= BUY VS RENT ================= -->
    <section class="section">
      <div class="container">
        <div class="split">
          <div class="reveal">
            <span class="eyebrow">Kaufen oder Mieten</span>
            <h2 class="display-2">Own it — or wear it first</h2>
            <p class="lead" style="margin-top:1.4rem">
              Manche Uhren möchte man besitzen, andere für einen besonderen Moment tragen.
              Bei Tempora Lux haben Sie beide Möglichkeiten — ohne Kompromisse bei Qualität,
              Echtheit oder Service.
            </p>
            <ul class="checklist">
              <li><svg class="tick" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M5 12.5l4 4 10-10" stroke-linecap="round" stroke-linejoin="round"/></svg> Kaufen Sie Ihre Traumuhr für Ihre Sammlung</li>
              <li><svg class="tick" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M5 12.5l4 4 10-10" stroke-linecap="round" stroke-linejoin="round"/></svg> Mieten Sie für jeden Anlass, ganz flexibel</li>
              <li><svg class="tick" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M5 12.5l4 4 10-10" stroke-linecap="round" stroke-linejoin="round"/></svg> Persönliche Expertenberatung inklusive</li>
              <li><svg class="tick" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M5 12.5l4 4 10-10" stroke-linecap="round" stroke-linejoin="round"/></svg> Zertifizierte Echtheit für jedes Stück</li>
            </ul>
            <div class="split__cta">
              <a href="kaufen.php" class="btn btn--solid">Zum Kauf <span class="arrow">→</span></a>
              <a href="mieten.php" class="btn btn--gold">Zur Miete <span class="arrow">→</span></a>
            </div>
          </div>

          <div class="choice-cards reveal" data-delay="2">
            <div class="choice">
              <span class="eyebrow">Kaufen</span>
              <h3>Für die Ewigkeit</h3>
              <p>Eine Investition in zeitlose Handwerkskunst. Besitzen Sie ein Stück Schweizer Geschichte.</p>
              <a href="kaufen.php" class="link-arrow">Kollektion ansehen <span class="arrow">→</span></a>
            </div>
            <div class="choice">
              <span class="eyebrow">Mieten</span>
              <h3>Für den Moment</h3>
              <p>Tragen Sie die Uhr, von der Sie träumen — flexibel, versichert und unverbindlich.</p>
              <a href="mieten.php" class="link-arrow">Tarife ansehen <span class="arrow">→</span></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section">
  <div class="container">

    <div class="section-head reveal">
      <span class="eyebrow">Neu eingetroffen</span>
      <h2 class="display-2">Unsere neuesten Uhren</h2>
    </div>

    <div class="product-grid">

      <?php while($uhr = $result->fetch_assoc()): ?>

      <article class="card reveal">

        <img
          src="<?php echo $uhr['Picture']; ?>"
          alt="<?php echo htmlspecialchars($uhr['Uhren_Name']); ?>"
          style="width:100%; height:320px; object-fit:cover;"
        >

        <div class="card__body">

          <span class="card__brand">
            <?php echo htmlspecialchars($uhr['Marke']); ?>
          </span>

          <h3 class="card__model">
            <?php echo htmlspecialchars($uhr['Uhren_Name']); ?>
          </h3>

          <div class="card__foot">

            <span class="card__price">
              CHF <?php echo number_format($uhr['Preis'], 2); ?>
            </span>

            <a
              class="card__cta"
              href="kontakt.html?betreff=<?php echo urlencode($uhr['Uhren_Name']); ?>&typ=kaufen"
            >
              Bestellen →
            </a>

          </div>

        </div>

      </article>

      <?php endwhile; ?>

    </div>

  </div>
</section>
    <!-- ================= CLOSING CTA ================= -->
    <section class="section newsletter">
      <div class="container newsletter__inner reveal">
        <span class="eyebrow eyebrow--light eyebrow--center">Beginnen Sie Ihre Reise</span>
        <h2 class="display-2">Finden Sie Ihren Zeitmesser</h2>
        <p>Ob Kauf oder Miete — unsere Experten begleiten Sie persönlich. Nehmen Sie Kontakt auf und entdecken Sie die volle Kollektion.</p>
        <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;margin-top:0.5rem">
          <a href="kontakt.html" class="btn btn--gold">Kontakt aufnehmen <span class="arrow">→</span></a>
          <a href="kaufen.php" class="btn btn--ghost-light">Kollektion entdecken</a>
        </div>
      </div>
    </section>

<section class="section">
  <div class="container">

    <div class="game-wrapper">
      <h2 class="display-3 center">Tempora Lux Challenge</h2>

      <p class="lead center game-intro">
        Wie schnell sind deine Reflexe? Springe über die Hindernisse und
        knacke die 1000 Punkte.
      </p>

      <button id="startButton">Start</button>

      <p id="speedDisplay"></p>

      <div id="shop">
        <div id="watch"></div>
        <div id="obstacle"></div>
      </div>

      <h1 id="score">0</h1>

      <p id="challenge">
        🎯 Wenn du 1000 Punkte schaffst, schicke uns einen Screenshot und wir
        senden dir einen Rabattcode zu!
      </p>
    </div>

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


</body>
</html>
