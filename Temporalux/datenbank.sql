-- =========================================================================
-- TEMPORA LUX — Datenbankschema (Vorbereitung für die SQL-Integration)
-- =========================================================================
-- Schulprojekt · Kyle · Raphael · Kimo
--
-- Dieser Schema-Entwurf bildet GENAU die Daten ab, die aktuell fest im
-- HTML stehen (Uhren-Katalog Kaufen/Mieten), sowie die Formulare
-- (Kontakt/Bestellung und Newsletter).
--
-- Dialekt: MySQL / MariaDB (passt zu XAMPP/Laragon — der üblichen
-- Schulumgebung). Für PostgreSQL müssten AUTO_INCREMENT -> SERIAL und
-- ENUM/TINYINT(1) angepasst werden.
--
-- WICHTIG: Dieses Skript verändert die bestehende statische Website NICHT.
-- Es ist reine Vorbereitung. Der eigentliche Anschluss (Backend-Sprache,
-- Verbindungsdaten, Ausgabe der Karten per Schleife) folgt im nächsten
-- Schritt — siehe die offenen Punkte am Ende dieser Datei.
-- =========================================================================

CREATE DATABASE IF NOT EXISTS temporalux
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;
USE temporalux;


-- -------------------------------------------------------------------------
-- 1. Tabelle: uhren
--    Versorgt BEIDE Listen — die Kauf-Karten (kaufen.html) und die
--    Miet-Karten (mieten.html). Eine Uhr kann kaufbar UND/ODER mietbar sein.
--    * kaufpreis        = NULL  -> nicht zum Kauf gelistet
--    * mietpreis_monat  = NULL  -> nicht zur Miete gelistet
-- -------------------------------------------------------------------------
DROP TABLE IF EXISTS uhren;
CREATE TABLE uhren (
  id               INT AUTO_INCREMENT PRIMARY KEY,
  marke            VARCHAR(80)  NOT NULL,                 -- z. B. "Rolex"
  modell           VARCHAR(120) NOT NULL,                 -- z. B. "Submariner"
  kaufpreis        INT          NULL,                     -- CHF, ganze Franken
  mietpreis_monat  INT          NULL,                     -- CHF pro Monat
  miet_tarif       ENUM('Basic','Premium','Excellence') NULL,  -- Stufe der Miet-Karte
  bild_pfad        VARCHAR(255) NULL,                     -- später: echte Produktfotos
  verfuegbar       TINYINT(1)   NOT NULL DEFAULT 1,
  erstellt_am      TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Seed-Daten: exakt die 6 Uhren aus dem aktuellen HTML.
-- (Kaufpreise aus kaufen.html, Miettarif + Monatspreis aus mieten.html.)
-- Hinweis: Auf der Kauf-Seite heisst das JLC-Modell "Reverso Sublime",
--          auf der Miet-Seite verkürzt "Reverso" — hier kanonisch "Reverso".
INSERT INTO uhren (marke, modell, kaufpreis, mietpreis_monat, miet_tarif) VALUES
  ('Rolex',            'Submariner',  12200,  280, 'Basic'),
  ('Omega',            'Seamaster',    7400,  250, 'Premium'),
  ('Patek Philippe',   'Nautilus',    68000, 1600, 'Excellence'),
  ('Tudor',            'Black Bay',    4150,   95, 'Basic'),
  ('Breitling',        'Navitimer',    8900,  420, 'Premium'),
  ('Jaeger-LeCoultre', 'Reverso',     22500, 1600, 'Excellence');


-- -------------------------------------------------------------------------
-- 2. Tabelle: miet_tarife
--    Die drei Abo-Stufen aus dem Abschnitt "Tarife" (mieten.html).
--    Reine Stammdaten für die Preis-Karten.
-- -------------------------------------------------------------------------
DROP TABLE IF EXISTS miet_tarife;
CREATE TABLE miet_tarife (
  id             INT AUTO_INCREMENT PRIMARY KEY,
  name           VARCHAR(40)  NOT NULL,        -- Basic / Premium / Excellence
  monatspreis    INT          NOT NULL,        -- CHF pro Monat
  badge          VARCHAR(40)  NULL,            -- "Am beliebtesten" / "Für Kenner"
  hervorgehoben  TINYINT(1)   NOT NULL DEFAULT 0,  -- mittlere Karte optisch betont
  sortierung     INT          NOT NULL DEFAULT 0
) ENGINE=InnoDB;

INSERT INTO miet_tarife (name, monatspreis, badge, hervorgehoben, sortierung) VALUES
  ('Basic',       99, NULL,              0, 1),
  ('Premium',    249, 'Am beliebtesten', 1, 2),
  ('Excellence', 799, 'Für Kenner',      0, 3);


-- -------------------------------------------------------------------------
-- 3. Tabelle: anfragen
--    Einsendungen des Kontakt-/Bestellformulars (kontakt.html).
--    Spalten == Formularfelder; passt zum INSERT-Kommentar in main.js.
-- -------------------------------------------------------------------------
DROP TABLE IF EXISTS anfragen;
CREATE TABLE anfragen (
  id              INT AUTO_INCREMENT PRIMARY KEY,
  nachname        VARCHAR(120) NOT NULL,
  vorname         VARCHAR(120) NOT NULL,
  plz_ort         VARCHAR(160) NOT NULL,
  strasse         VARCHAR(160) NOT NULL,
  betreff         VARCHAR(200) NOT NULL,                         -- z. B. "Rolex Submariner"
  anliegen        ENUM('kaufen','mieten','anderes') NOT NULL,    -- Dropdown neben dem Betreff
  nachricht       TEXT         NOT NULL,
  agb_akzeptiert  TINYINT(1)   NOT NULL DEFAULT 0,
  erstellt_am     TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;


-- -------------------------------------------------------------------------
-- 4. Tabelle: newsletter_abonnenten
--    Anmeldungen des Newsletter-Formulars (kaufen.html / mieten.html).
-- -------------------------------------------------------------------------
DROP TABLE IF EXISTS newsletter_abonnenten;
CREATE TABLE newsletter_abonnenten (
  id           INT AUTO_INCREMENT PRIMARY KEY,
  email        VARCHAR(190) NOT NULL UNIQUE,
  erstellt_am  TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;


-- =========================================================================
-- Beispiel-Abfragen (so würden später die Karten gefüllt) — nur Referenz:
--
--   -- Kauf-Karten (kaufen.html):
--   SELECT marke, modell, kaufpreis
--   FROM uhren
--   WHERE kaufpreis IS NOT NULL AND verfuegbar = 1
--   ORDER BY kaufpreis;
--
--   -- Miet-Karten (mieten.html):
--   SELECT marke, modell, mietpreis_monat, miet_tarif
--   FROM uhren
--   WHERE mietpreis_monat IS NOT NULL AND verfuegbar = 1
--   ORDER BY mietpreis_monat;
--
-- Schreibende Abfragen IMMER mit Prepared Statements / Platzhaltern (?),
-- niemals Benutzereingaben direkt in den SQL-String einsetzen
-- (Schutz vor SQL-Injection).
-- =========================================================================

-- =========================================================================
-- OFFENE PUNKTE — bewusst NICHT erledigt (warten auf Ihre Infos):
--
--   (a) Backend-Sprache/Stack ist unbekannt (PHP? Node? Python?). Daher
--       wurde KEIN serverseitiger Code und KEINE Verbindungsdatei erstellt
--       und die .html-Dateien wurden NICHT in .php o. Ä. umbenannt.
--   (b) Die Funktions-Vergleichstabelle (Basic/Premium/Excellence, 7 Zeilen)
--       ist derzeit statisches Marketing-HTML. Ob sie überhaupt aus der DB
--       kommen soll — und wenn ja, in welcher Form (eigene Spalten vs.
--       Merkmal-Tabelle) — ist offen und wurde daher nicht modelliert.
--   (c) Bildpfade (bild_pfad) sind als Spalte vorgesehen, aber leer —
--       es gibt noch keine echten Produktfotos.
-- =========================================================================
