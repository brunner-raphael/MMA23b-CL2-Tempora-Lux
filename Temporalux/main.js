/* =========================================================================
   TEMPORA LUX — main.js
   Shared vanilla JavaScript for all pages.
   - Sticky nav scroll state
   - Mobile hamburger / full-screen overlay
   - Newsletter validation
   - Contact / order form (prefill + validation)
   - Reveal-on-scroll (IntersectionObserver)
   Schulprojekt · Kein Backend
   ========================================================================= */
(function () {
  "use strict";

  document.addEventListener("DOMContentLoaded", function () {
    initNavScroll();
    initMobileMenu();
    initNewsletter();
    initContactForm();
    initReveal();
  });

  /* ----------------------------------------------------------------- */
  /* Sticky navigation: add shadow/border once the page is scrolled     */
  /* ----------------------------------------------------------------- */
  function initNavScroll() {
    var nav = document.querySelector(".nav");
    if (!nav) return;
    var onScroll = function () {
      nav.classList.toggle("is-scrolled", window.scrollY > 8);
    };
    onScroll();
    window.addEventListener("scroll", onScroll, { passive: true });
  }

  /* ----------------------------------------------------------------- */
  /* Mobile menu: animated burger + full-screen overlay                 */
  /* ----------------------------------------------------------------- */
  function initMobileMenu() {
    var burger = document.querySelector(".nav__burger");
    var menu = document.querySelector(".mobile-menu");
    if (!burger || !menu) return;

    var toggle = function (force) {
      var open = typeof force === "boolean"
        ? force
        : !document.body.classList.contains("menu-open");
      document.body.classList.toggle("menu-open", open);
      burger.setAttribute("aria-expanded", String(open));
      // Prevent background scroll while the overlay is open
      document.body.style.overflow = open ? "hidden" : "";
    };

    burger.addEventListener("click", function () { toggle(); });

    // Close when a link inside the overlay is clicked
    menu.querySelectorAll("a").forEach(function (link) {
      link.addEventListener("click", function () { toggle(false); });
    });

    document.addEventListener("keydown", function (e) {
      if (e.key === "Escape") toggle(false);
    });
  }

  /* ----------------------------------------------------------------- */
  /* Newsletter — client-side email validation, visual feedback         */
  /* ----------------------------------------------------------------- */
  function initNewsletter() {
    document.querySelectorAll("[data-newsletter]").forEach(function (form) {
      var input = form.querySelector('input[type="email"]');
      var msg = form.parentElement.querySelector(".form-msg")
             || form.querySelector(".form-msg");

      form.addEventListener("submit", function (e) {
        e.preventDefault();
        var value = (input.value || "").trim();
        var valid = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(value);

        if (!msg) return;
        if (!value) {
          setMsg("Bitte geben Sie Ihre E-Mail-Adresse ein.", false);
        } else if (!valid) {
          setMsg("Bitte geben Sie eine gültige E-Mail-Adresse ein.", false);
        } else {
          setMsg("Vielen Dank — Sie sind angemeldet. Demo ✓ (kein Backend)", true);
          form.reset();
          /* Echter Request würde hier stehen:
             fetch("/api/newsletter", { method: "POST", ... }); */
        }
      });

      function setMsg(text, success) {
        msg.textContent = text;
        msg.classList.toggle("is-success", success);
        msg.classList.toggle("is-error", !success);
      }
    });
  }

  /* ----------------------------------------------------------------- */
  /* Contact / order form (kontakt.html)                                */
  /* - Pre-fills "Betreff" + "Anliegen" from the order-button URL       */
  /*   e.g. kontakt.html?betreff=Rolex%20Submariner&typ=kaufen          */
  /* - Client-side validation with German messages (demo, no backend)   */
  /* ----------------------------------------------------------------- */
  function initContactForm() {
    var form = document.getElementById("contact-form");
    if (!form) return;

    var success = form.querySelector(".auth-success");

    /* --- prefill from query string ---------------------------------- */
    var params = new URLSearchParams(window.location.search);
    var betreff = params.get("betreff");
    var typ = params.get("typ");
    if (betreff) form.elements["betreff"].value = betreff;
    if (typ && ["kaufen", "mieten", "anderes"].indexOf(typ) !== -1) {
      form.elements["anliegen"].value = typ;
    }

    /* --- validation helpers ----------------------------------------- */
    function setError(field, message) {
      var wrap = field.closest(".field") || field.parentElement;
      var err = wrap ? wrap.querySelector(".field__error") : null;
      if (err) err.textContent = message || "";
      field.classList.toggle("is-invalid", !!message);
      return !message;
    }

    form.addEventListener("submit", function (e) {
    e.preventDefault();
   
    var ok = true;
   
    var required = [
       ["nachname", "Bitte geben Sie Ihren Nachnamen ein."],
       ["vorname", "Bitte geben Sie Ihren Vornamen ein."],
       ["telefon", "Bitte geben Sie Ihre Telefonnummer ein."],
       ["email", "Bitte geben Sie Ihre E-Mail-Adresse ein."],
       ["plz", "Bitte geben Sie Ihre Postleitzahl ein."],
       ["ort", "Bitte geben Sie Ihren Ort ein."],
       ["strasse", "Bitte geben Sie Ihre Strasse ein."],
       ["nummer", "Bitte geben Sie die Hausnummer ein."],
       ["betreff", "Bitte geben Sie einen Betreff ein."],
       ["nachricht", "Bitte geben Sie eine Nachricht ein."]
    ];
   
    // Pflichtfelder prüfen
    required.forEach(function (pair) {
       var field = form.elements[pair[0]];
   
       if (!field.value.trim()) {
         ok = setError(field, pair[1]) && ok;
       } else {
         setError(field, "");
       }
    });
  
    // E-Mail prüfen
    var email = form.elements["email"];
   
    if (email.value.trim()) {
       var validEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
   
       if (!validEmail.test(email.value.trim())) {
         setError(
           email,
           "Bitte geben Sie eine gültige E-Mail-Adresse ein."
         );
         ok = false;
       }
    }
   
    // AGB prüfen
    var agb = form.elements["agb"];
    var agbErr = form.querySelector("[data-agb-error]");
    var agbLabel = agb.closest(".checkbox");
   
    if (!agb.checked) {
       if (agbErr) {
         agbErr.textContent =
           "Bitte akzeptieren Sie die AGB, um fortzufahren.";
       }
   
       if (agbLabel) {
         agbLabel.classList.add("is-invalid");
       }
   
       ok = false;
    } else {
       if (agbErr) {
         agbErr.textContent = "";
       }
   
       if (agbLabel) {
         agbLabel.classList.remove("is-invalid");
       }
    }
   
    if (!ok) return;
   
    // Hier später PHP / Datenbank-Anbindung
   
    alert("Formular erfolgreich validiert!");
   });

      /* ------------------------------------------------------------------
         DEMO — kein Backend. Hier würde die echte Bestellanfrage stehen:

         fetch("/api/kontakt", {
           method: "POST",
           headers: { "Content-Type": "application/json" },
           body: JSON.stringify({
             nachname: form.elements["nachname"].value,
             vorname:  form.elements["vorname"].value,
             plz_ort:  form.elements["plz_ort"].value,
             strasse:  form.elements["strasse"].value,
             betreff:  form.elements["betreff"].value,
             anliegen: form.elements["anliegen"].value,
             nachricht: form.elements["nachricht"].value
           })
         }).then(function (res) { return res.json(); });

         Serverseitig (parametrisiert!):
         INSERT INTO anfragen
           (nachname, vorname, plz_ort, strasse, betreff, anliegen, nachricht)
         VALUES (?, ?, ?, ?, ?, ?, ?);
      ------------------------------------------------------------------ */
      form.querySelectorAll("input, textarea, select, button").forEach(function (el) {
        if (el.type !== "submit") el.setAttribute("disabled", "disabled");
      });
      var submitBtn = form.querySelector('button[type="submit"]');
      if (submitBtn) submitBtn.style.display = "none";
      if (success) success.classList.add("is-shown");
      success.scrollIntoView({ behavior: "smooth", block: "center" });
    });
  }

  /* ----------------------------------------------------------------- */
  /* Reveal-on-scroll                                                   */
  /* ----------------------------------------------------------------- */
  function initReveal() {
    var els = document.querySelectorAll(".reveal");
    if (!els.length) return;

    if (!("IntersectionObserver" in window)) {
      els.forEach(function (el) { el.classList.add("is-visible"); });
      return;
    }
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add("is-visible");
          io.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12, rootMargin: "0px 0px -8% 0px" });

    els.forEach(function (el) { io.observe(el); });
  }
})();

  
