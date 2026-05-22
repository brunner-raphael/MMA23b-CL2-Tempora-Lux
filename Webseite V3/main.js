/* ══════════════════════════════════════════════════
   TEMPORA LUX — Global JavaScript
   ══════════════════════════════════════════════════ */

(function () {
  'use strict';

  /* ── HAMBURGER MENU ─────────────────────────────── */
  const hamburger = document.getElementById('hamburger');
  const mobileMenu = document.getElementById('mobileMenu');

  if (hamburger && mobileMenu) {
    let menuOpen = false;

    function setMenu(open) {
      menuOpen = open;
      mobileMenu.classList.toggle('open', open);
      const bars = hamburger.querySelectorAll('span');
      if (open) {
        bars[0].style.transform = 'translateY(6.5px) rotate(45deg)';
        bars[1].style.opacity  = '0';
        bars[2].style.transform = 'translateY(-6.5px) rotate(-45deg)';
        document.body.style.overflow = 'hidden';
      } else {
        bars.forEach(b => { b.style.transform = ''; b.style.opacity = ''; });
        document.body.style.overflow = '';
      }
    }

    hamburger.addEventListener('click', () => setMenu(!menuOpen));
    mobileMenu.querySelectorAll('a').forEach(a => {
      a.addEventListener('click', () => setMenu(false));
    });
    document.addEventListener('click', e => {
      if (menuOpen && !mobileMenu.contains(e.target) && !hamburger.contains(e.target)) {
        setMenu(false);
      }
    });
  }

  /* ── ACTIVE NAV LINK ────────────────────────────── */
  const page = location.pathname.split('/').pop() || 'index.html';
  document.querySelectorAll('.nav-links a, .mobile-menu a').forEach(a => {
    const href = (a.getAttribute('href') || '').split('#')[0];
    if (href === page || (page === '' && href === 'index.html')) {
      a.classList.add('active');
    }
  });

  /* ── NEWSLETTER ──────────────────────────────────── */
  const newsletterBtn   = document.querySelector('.newsletter-form button');
  const newsletterInput = document.querySelector('.newsletter-form input');
  if (newsletterBtn && newsletterInput) {
    newsletterBtn.addEventListener('click', () => {
      const val = newsletterInput.value.trim();
      if (!val || !val.includes('@') || !val.includes('.')) {
        newsletterInput.style.borderColor = 'rgba(184,150,106,0.7)';
        newsletterInput.focus();
        return;
      }
      newsletterInput.style.borderColor = '';
      newsletterBtn.textContent = 'Danke ✓';
      newsletterBtn.disabled = true;
      newsletterInput.value = '';
    });
  }

  /* ══════════════════════════════════════════════════
     AUTH MODAL — VISUELL / DEMO
     ══════════════════════════════════════════════════
     Derzeit rein visuell. Für echte Funktionalität:
     siehe Kommentare in den submit-Handlern unten.
  ══════════════════════════════════════════════════ */

  /* Inject modal HTML once into the page */
  document.body.insertAdjacentHTML('beforeend', `
<div class="modal-backdrop" id="authBackdrop" role="dialog" aria-modal="true">
  <div class="modal" id="authModal">
    <button class="modal-close" id="modalClose" aria-label="Schliessen">&times;</button>
    <div class="modal-logo">Tempora Lux</div>

    <!-- LOGIN PANEL -->
    <div id="panelLogin">
      <h2>Anmelden</h2>
      <p class="modal-sub">Noch kein Konto? <a id="toRegister">Registrieren</a></p>

      <div class="modal-field">
        <label for="mLoginEmail">E-Mail</label>
        <input type="text" id="mLoginEmail" placeholder="ihre@email.ch" autocomplete="email" />
        <div class="modal-field-err" id="mLoginEmailErr">Bitte eine gültige E-Mail eingeben.</div>
      </div>
      <div class="modal-field">
        <label for="mLoginPass">Passwort</label>
        <input type="password" id="mLoginPass" placeholder="••••••••" autocomplete="current-password" />
        <div class="modal-field-err" id="mLoginPassErr">Passwort erforderlich.</div>
      </div>

      <button class="modal-submit" id="mLoginSubmit">Anmelden</button>

      <p class="modal-note">
        ⚙ Demo-Modus — kein Backend verbunden.<br>
        Zur Aktivierung: Backend + SQL erforderlich (siehe Erklärung).
      </p>
    </div>

    <!-- REGISTER PANEL -->
    <div id="panelRegister" style="display:none;">
      <h2>Registrieren</h2>
      <p class="modal-sub">Bereits registriert? <a id="toLogin">Anmelden</a></p>

      <div class="modal-row">
        <div class="modal-field">
          <label for="mRegVorname">Vorname</label>
          <input type="text" id="mRegVorname" placeholder="Max" autocomplete="given-name" />
          <div class="modal-field-err" id="mRegVornameErr">Erforderlich.</div>
        </div>
        <div class="modal-field">
          <label for="mRegNachname">Nachname</label>
          <input type="text" id="mRegNachname" placeholder="Muster" autocomplete="family-name" />
          <div class="modal-field-err" id="mRegNachnameErr">Erforderlich.</div>
        </div>
      </div>
      <div class="modal-field">
        <label for="mRegEmail">E-Mail</label>
        <input type="text" id="mRegEmail" placeholder="ihre@email.ch" autocomplete="email" />
        <div class="modal-field-err" id="mRegEmailErr">Bitte eine gültige E-Mail eingeben.</div>
      </div>
      <div class="modal-field">
        <label for="mRegPass">Passwort <span style="font-weight:400;text-transform:none;letter-spacing:0">(min. 8 Zeichen)</span></label>
        <input type="password" id="mRegPass" placeholder="••••••••" autocomplete="new-password" />
        <div class="modal-field-err" id="mRegPassErr">Mind. 8 Zeichen erforderlich.</div>
      </div>
      <div class="modal-field">
        <label for="mRegPass2">Passwort bestätigen</label>
        <input type="password" id="mRegPass2" placeholder="••••••••" autocomplete="new-password" />
        <div class="modal-field-err" id="mRegPass2Err">Passwörter stimmen nicht überein.</div>
      </div>

      <button class="modal-submit" id="mRegSubmit">Konto erstellen</button>

      <p class="modal-note">
        ⚙ Demo-Modus — kein Backend verbunden.<br>
        Zur Aktivierung: Backend + SQL erforderlich (siehe Erklärung).
      </p>
    </div>
  </div>
</div>`);

  /* ── Referenzen ──────────────────────────────────── */
  const backdrop      = document.getElementById('authBackdrop');
  const panelLogin    = document.getElementById('panelLogin');
  const panelRegister = document.getElementById('panelRegister');

  /* ── Öffnen / Schliessen ─────────────────────────── */
  function openModal(mode) {
    showPanel(mode);
    backdrop.classList.add('open');
    document.body.style.overflow = 'hidden';
  }
  function closeModal() {
    backdrop.classList.remove('open');
    document.body.style.overflow = '';
    clearAll();
  }
  function showPanel(mode) {
    panelLogin.style.display    = mode === 'login'    ? '' : 'none';
    panelRegister.style.display = mode === 'register' ? '' : 'none';
  }

  /* ── Schliess-Trigger ────────────────────────────── */
  document.getElementById('modalClose').addEventListener('click', closeModal);
  backdrop.addEventListener('click', e => { if (e.target === backdrop) closeModal(); });
  document.addEventListener('keydown', e => { if (e.key === 'Escape') closeModal(); });

  /* ── Panel-Wechsel ───────────────────────────────── */
  document.getElementById('toRegister').addEventListener('click', () => { clearAll(); showPanel('register'); });
  document.getElementById('toLogin').addEventListener('click',    () => { clearAll(); showPanel('login'); });

  /* ── Nav-Buttons auf allen Seiten verdrahten ─────── */
  document.querySelectorAll('.nav-actions button, .mobile-menu-actions button').forEach(btn => {
    const t = btn.textContent.trim();
    if (t === 'Anmelden')     btn.addEventListener('click', () => openModal('login'));
    if (t === 'Registrieren') btn.addEventListener('click', () => openModal('register'));
  });

  /* ── Validierungshilfen ──────────────────────────── */
  function isEmail(v) { return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v); }

  function markField(inputId, errId, hasError) {
    const inp = document.getElementById(inputId);
    const err = document.getElementById(errId);
    if (inp) inp.classList.toggle('m-error', hasError);
    if (err) err.classList.toggle('show', hasError);
  }
  function clearAll() {
    document.querySelectorAll('#authModal input').forEach(i => {
      i.classList.remove('m-error');
      i.value = '';
    });
    document.querySelectorAll('#authModal .modal-field-err').forEach(e => e.classList.remove('show'));
  }

  /* ── LOGIN Submit ────────────────────────────────── */
  document.getElementById('mLoginSubmit').addEventListener('click', function () {
    const email = document.getElementById('mLoginEmail').value.trim();
    const pass  = document.getElementById('mLoginPass').value;
    let ok = true;

    markField('mLoginEmail', 'mLoginEmailErr', false);
    markField('mLoginPass',  'mLoginPassErr',  false);

    if (!isEmail(email)) { markField('mLoginEmail', 'mLoginEmailErr', true); ok = false; }
    if (!pass)           { markField('mLoginPass',  'mLoginPassErr',  true); ok = false; }
    if (!ok) return;

    /*
     * ════════════════════════════════════════════════
     * HIER: Backend-Aufruf für echte Anmeldung
     *
     * fetch('/api/login', {
     *   method: 'POST',
     *   headers: { 'Content-Type': 'application/json' },
     *   body: JSON.stringify({ email, password: pass })
     * }).then(r => r.json()).then(data => {
     *   if (data.success) location.reload();
     *   else alert(data.message);
     * });
     *
     * SQL (Backend):
     * SELECT id, name, password_hash FROM users
     * WHERE email = :email LIMIT 1;
     * → Passwort mit bcrypt.compare() prüfen
     * → Bei Erfolg: Session / JWT erstellen
     * ════════════════════════════════════════════════
     */
    this.textContent = 'Demo ✓ (kein Backend)';
    this.disabled = true;
    setTimeout(() => { this.textContent = 'Anmelden'; this.disabled = false; closeModal(); }, 1200);
  });

  /* ── REGISTER Submit ─────────────────────────────── */
  document.getElementById('mRegSubmit').addEventListener('click', function () {
    const vn    = document.getElementById('mRegVorname').value.trim();
    const nn    = document.getElementById('mRegNachname').value.trim();
    const email = document.getElementById('mRegEmail').value.trim();
    const pass  = document.getElementById('mRegPass').value;
    const pass2 = document.getElementById('mRegPass2').value;
    let ok = true;

    ['mRegVorname','mRegNachname','mRegEmail','mRegPass','mRegPass2'].forEach(id => {
      document.getElementById(id).classList.remove('m-error');
    });
    ['mRegVornameErr','mRegNachnameErr','mRegEmailErr','mRegPassErr','mRegPass2Err'].forEach(id => {
      document.getElementById(id).classList.remove('show');
    });

    if (!vn)             { markField('mRegVorname',  'mRegVornameErr',  true); ok = false; }
    if (!nn)             { markField('mRegNachname', 'mRegNachnameErr', true); ok = false; }
    if (!isEmail(email)) { markField('mRegEmail',    'mRegEmailErr',    true); ok = false; }
    if (pass.length < 8) { markField('mRegPass',     'mRegPassErr',     true); ok = false; }
    if (pass !== pass2)  { markField('mRegPass2',    'mRegPass2Err',    true); ok = false; }
    if (!ok) return;

    /*
     * ════════════════════════════════════════════════
     * HIER: Backend-Aufruf für echte Registrierung
     *
     * fetch('/api/register', {
     *   method: 'POST',
     *   headers: { 'Content-Type': 'application/json' },
     *   body: JSON.stringify({ vorname: vn, nachname: nn, email, password: pass })
     * }).then(r => r.json()).then(data => {
     *   if (data.success) location.reload();
     *   else alert(data.message); // z.B. "E-Mail bereits vorhanden"
     * });
     *
     * SQL (Backend):
     * INSERT INTO users (vorname, nachname, email, password_hash, created_at)
     * VALUES (:vn, :nn, :email, bcrypt(:pass), NOW());
     * → Vorher prüfen: SELECT COUNT(*) FROM users WHERE email = :email
     * → Bei Duplikat: Fehlermeldung zurückgeben
     * ════════════════════════════════════════════════
     */
    this.textContent = 'Demo ✓ (kein Backend)';
    this.disabled = true;
    setTimeout(() => { this.textContent = 'Konto erstellen'; this.disabled = false; closeModal(); }, 1200);
  });

})();
