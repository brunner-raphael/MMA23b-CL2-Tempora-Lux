```php
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

$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = $conn->prepare("
        INSERT INTO kontakt_anfragen
        (nachname, vorname, telefon, email, plz, ort, strasse, nummer, betreff, anliegen, nachricht)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");

    $stmt->bind_param(
        "sssssssssss",
        $_POST["nachname"],
        $_POST["vorname"],
        $_POST["telefon"],
        $_POST["email"],
        $_POST["plz"],
        $_POST["ort"],
        $_POST["strasse"],
        $_POST["nummer"],
        $_POST["betreff"],
        $_POST["anliegen"],
        $_POST["nachricht"]
    );

    if ($stmt->execute()) {
        $successMessage = "Ihre Anfrage wurde erfolgreich gespeichert. Wir melden uns schnellstmöglich bei Ihnen.";
    } else {
        $successMessage = "Fehler beim Speichern: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kontakt &amp; Bestellung — Tempora Lux</title>
  <meta name="description" content="Bestellen oder mieten Sie Ihren Zeitmesser bei Tempora Lux — füllen Sie das Kontaktformular aus und unsere Berater melden sich persönlich." />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;1,400&family=Jost:wght@300;400;500&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="style.css" />
</head>
<body>

<header class="nav">
  <div class="container nav__inner">
    <a href="index.php" class="brand">Tempora<span class="brand__dot">·</span>Lux</a>
    <nav class="nav__links" aria-label="Hauptnavigation">
      <a href="index.php" class="nav__link">Entdecken</a>
      <a href="kaufen.php" class="nav__link">Kaufen</a>
      <a href="mieten.php" class="nav__link">Mieten</a>
      <a href="kontakt.php" class="nav__link is-active">Kontakt</a>
    </nav>
    <button class="nav__burger" aria-label="Menü öffnen" aria-expanded="false" aria-controls="mobile-menu">
      <span></span><span></span><span></span>
    </button>
  </div>
</header>

<div class="mobile-menu" id="mobile-menu">
  <nav class="mobile-menu__links" aria-label="Mobile Navigation">
    <a href="index.php" class="mobile-menu__link">Entdecken</a>
    <a href="kaufen.php" class="mobile-menu__link">Kaufen</a>
    <a href="mieten.php" class="mobile-menu__link">Mieten</a>
    <a href="kontakt.php" class="mobile-menu__link is-active">Kontakt</a>
  </nav>
</div>

<main>
  <section class="container page-head">
    <span class="eyebrow reveal">Kontakt &amp; Bestellung</span>
    <h1 class="display-1 reveal" data-delay="1">Sprechen Sie mit uns</h1>
    <p class="lead reveal" data-delay="2">
      Ob Kauf, Miete oder eine persönliche Frage — füllen Sie das Formular aus und
      einer unserer Berater meldet sich diskret und zeitnah bei Ihnen.
    </p>
  </section>

  <section class="section container" style="padding-top:clamp(1.5rem,3vw,2.5rem)">
    <div class="contact-layout">

      <aside class="contact-aside reveal">
        <span class="eyebrow">Persönlich für Sie da</span>
        <h2>Ihr direkter Draht zu Tempora&nbsp;Lux</h2>
        <p>Wir behandeln jede Anfrage individuell. Geben Sie Ihre Angaben ein — Ihre Daten bleiben selbstverständlich vertraulich.</p>

        <dl class="contact-info">
          <div class="contact-info__item">
            <div><dt>E-Mail</dt><dd>service@temporalux.ch</dd></div>
          </div>
          <div class="contact-info__item">
            <div><dt>Telefon</dt><dd>+41 44 000 00 00</dd></div>
          </div>
          <div class="contact-info__item">
            <div><dt>Boutique</dt><dd>Bahnhofstrasse 1, 8001 Zürich</dd></div>
          </div>
          <div class="contact-info__item">
            <div>
              <dt>Öffnungszeiten</dt>
              <dd class="contact-hours">
                Mo–Fr 09:00–18:30<br>
                Sa 10:00–17:00<br>
                <span class="closed">So Geschlossen</span>
              </dd>
            </div>
          </div>
        </dl>
      </aside>

      <div class="contact-card reveal" data-delay="1">

        <?php if (!empty($successMessage)): ?>
          <div class="auth-success" style="margin-bottom:1.5rem">
            <div class="auth-success__check">✓</div>
            <p>
              <strong>Vielen Dank!</strong><br>
              <?php echo htmlspecialchars($successMessage); ?>
            </p>
          </div>
        <?php endif; ?>

        <form id="contact-form" method="POST" action="kontakt.php#contact-form" novalidate>

          <div class="field field--row">
            <div>
              <label for="c-nachname">Nachname *</label>
              <input type="text" id="c-nachname" name="nachname" autocomplete="family-name" placeholder="Muster" required/>
              <span class="field__error"></span>
            </div>

            <div>
              <label for="c-vorname">Vorname *</label>
              <input type="text" id="c-vorname" name="vorname" autocomplete="given-name" placeholder="Max" required/>
              <span class="field__error"></span>
            </div>
          </div>

          <div class="field field--row">
            <div>
              <label for="c-phone">Telefonnummer *</label>
              <input type="tel" id="c-phone" name="telefon" placeholder="+41 79 123 45 67" required/>
              <span class="field__error"></span>
            </div>

            <div>
              <label for="c-email">E-Mail *</label>
              <input type="email" id="c-email" name="email" autocomplete="email" placeholder="max.muster@email.ch" required/>
              <span class="field__error"></span>
            </div>
          </div>

          <div class="field field--row">
            <div>
              <label for="c-plz">PLZ *</label>
              <input type="number" id="c-plz" name="plz" placeholder="8001" required/>
              <span class="field__error"></span>
            </div>

            <div>
              <label for="c-ort">Ort *</label>
              <input type="text" id="c-ort" name="ort" placeholder="Zürich" required/>
              <span class="field__error"></span>
            </div>
          </div>

          <div class="field field--row">
            <div>
              <label for="c-strasse">Strasse *</label>
              <input type="text" id="c-strasse" name="strasse" placeholder="Bahnhofstrasse" required/>
              <span class="field__error"></span>
            </div>

            <div>
              <label for="c-nummer">Nr. *</label>
              <input type="text" id="c-nummer" name="nummer" placeholder="1" required/>
              <span class="field__error"></span>
            </div>
          </div>

          <div class="field">
            <label for="c-betreff">Betreff *</label>
            <div class="field--subject">
              <input type="text" id="c-betreff" name="betreff" placeholder="z. B. Rolex Submariner" required/>

              <select id="c-anliegen" name="anliegen" aria-label="Anliegen">
                <option value="kaufen">Kaufen</option>
                <option value="mieten">Mieten</option>
                <option value="anderes">Anderes</option>
              </select>
            </div>
            <span class="field__error"></span>
          </div>

          <div class="field">
            <label for="c-nachricht">Nachricht *</label>
            <textarea id="c-nachricht" name="nachricht" placeholder="Ihre Nachricht an uns …" required></textarea>
            <span class="field__error"></span>
          </div>

          <label class="checkbox" for="c-agb">
            <input type="checkbox" id="c-agb" name="agb" />
            <span>Ich akzeptiere die <a href="#">AGB</a> und die <a href="#">Datenschutzerklärung</a>.</span>
          </label>

          <span class="field__error" data-agb-error style="display:block;margin:-1rem 0 1.2rem"></span>

          <button type="submit" class="btn btn--gold btn--block">
            Absenden <span class="arrow">→</span>
          </button>

        </form>
      </div>
    </div>
  </section>
</main>

<footer class="footer">
  <div class="container">
    <div class="footer__top">
      <div class="footer__brand-col">
        <div class="footer__brand">Tempora<span class="brand__dot">·</span>Lux</div>
        <p class="footer__tag">Schweizer Luxusuhren — kaufen und mieten. Zeitlose Meisterwerke für Kenner.</p>
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
          <li><a href="kontakt.php">Kontakt</a></li>
        </ul>
      </div>

      <div class="footer__col">
        <h4>Boutique</h4>
        <address class="footer__address">
          Bahnhofstrasse 1<br>
          8001 Zürich<br>
          Schweiz
        </address>
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
```
