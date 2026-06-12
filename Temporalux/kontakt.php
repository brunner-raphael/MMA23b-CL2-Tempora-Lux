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

  <!-- ================= NAVIGATION ================= -->
  <header class="nav">
    <div class="container nav__inner">
      <a href="index.php" class="brand">Tempora<span class="brand__dot">·</span>Lux</a>
      <nav class="nav__links" aria-label="Hauptnavigation">
        <a href="index.php" class="nav__link">Entdecken</a>
        <a href="kaufen.html" class="nav__link">Kaufen</a>
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
      <a href="kaufen.html" class="mobile-menu__link">Kaufen</a>
      <a href="mieten.php" class="mobile-menu__link">Mieten</a>
      <a href="kontakt.php" class="mobile-menu__link is-active">Kontakt</a>
    </nav>
  </div>

  <main>
    <!-- ================= PAGE HEAD ================= -->
    <section class="container page-head">
      <span class="eyebrow reveal">Kontakt &amp; Bestellung</span>
      <h1 class="display-1 reveal" data-delay="1">Sprechen Sie mit uns</h1>
      <p class="lead reveal" data-delay="2">
        Ob Kauf, Miete oder eine persönliche Frage — füllen Sie das Formular aus und
        einer unserer Berater meldet sich diskret und zeitnah bei Ihnen.
      </p>
    </section>

    <!-- ================= CONTACT ================= -->
    <section class="section container" style="padding-top:clamp(1.5rem,3vw,2.5rem)">
      <div class="contact-layout">

        <!-- Aside -->
        <aside class="contact-aside reveal">
          <span class="eyebrow">Persönlich für Sie da</span>
          <h2>Ihr direkter Draht zu Tempora&nbsp;Lux</h2>
          <p>Wir behandeln jede Anfrage individuell. Geben Sie Ihre Angaben ein — Ihre Daten bleiben selbstverständlich vertraulich.</p>

          <dl class="contact-info">
            <div class="contact-info__item">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M4 6l8 6 8-6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              <div><dt>E-Mail</dt><dd>service@temporalux.ch</dd></div>
            </div>
            <div class="contact-info__item">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true"><path d="M5 4h3l1.5 4-2 1.5a12 12 0 005 5l1.5-2 4 1.5v3a2 2 0 01-2 2A16 16 0 013 6a2 2 0 012-2z" stroke-linejoin="round"/></svg>
              <div><dt>Telefon</dt><dd>+41 44 000 00 00</dd></div>
            </div>
            <div class="contact-info__item">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true"><path d="M12 21c5-4.5 7-8 7-11a7 7 0 10-14 0c0 3 2 6.5 7 11z" stroke-linejoin="round"/><circle cx="12" cy="10" r="2.5"/></svg>
              <div><dt>Boutique</dt><dd>Bahnhofstrasse 1, 8001 Zürich</dd></div>
            </div>
            <div class="contact-info__item">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2" stroke-linecap="round"/></svg>
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

        <!-- Formular -->
        <div class="contact-card reveal" data-delay="1">
          <form id="contact-form" novalidate>
        

            <!-- Name -->
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
            
            <!-- Contact -->
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
            
            <!-- Address -->
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
            
            <!-- Subject -->
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
            
            <!-- Message -->
            <div class="field">
              <label for="c-nachricht">Nachricht *</label>
              <textarea id="c-nachricht" name="nachricht" placeholder="Ihre Nachricht an uns …" required></textarea>
              <span class="field__error"></span>
            </div>
            
            <!-- AGB -->
            <label class="checkbox" for="c-agb">
              <input type="checkbox" id="c-agb" name="agb" />
              <span> Ich akzeptiere die <a href="#">AGB</a> und die <a href="#">Datenschutzerklärung</a>. </span>
            </label>
            
            <span class="field__error" data-agb-error style="display:block;margin:-1rem 0 1.2rem"></span>
            
            <button type="submit" class="btn btn--gold btn--block">
              Absenden <span class="arrow">→</span>
            </button>        
          </form>
        </div>


            <!-- Erfolgsmeldung (Demo) -->
            <div class="auth-success" style="margin-top:1.6rem">
              <div class="auth-success__check">
                <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M5 12.5l4 4 10-10" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </div>
              <p><strong>Vielen Dank für Ihre Anfrage.</strong><br>Demo ✓ (kein Backend)</p>
            </div>
          </form>
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
            <li><a href="kaufen.html">Uhren kaufen</a></li>
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
