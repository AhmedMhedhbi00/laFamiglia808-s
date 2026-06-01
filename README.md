# LaFamiglia808 — Studio di Produzione Musicale
### Sito Laravel Professionale con Panel Admin

---

## Stack Tecnico

- **Framework**: Laravel 11
- **Frontend**: Blade + Tailwind CSS CDN + Alpine.js
- **Database**: SQLite (default) — cambiabile con MySQL/PostgreSQL in `.env`
- **Auth Admin**: Session-based (nessun pacchetto esterno)

---

## Installazione

### 1. Requisiti
- PHP >= 8.2
- Composer
- Node.js (opzionale, solo se vuoi compilare asset)

### 2. Clona / Estrai il progetto

```bash
cd /percorso/del/progetto
```

### 3. Installa le dipendenze PHP

```bash
composer install
```

### 4. Configura l'ambiente

```bash
cp .env.example .env
php artisan key:generate
```

### 5. Database (SQLite — pronto subito)

```bash
touch database/database.sqlite
php artisan migrate
php artisan db:seed
```

### 6. Storage per le immagini

```bash
php artisan storage:link
```

### 7. Avvia il server

```bash
php artisan serve
```

Il sito sarà disponibile su **http://localhost:8000**

---

## Admin Panel

URL: **http://localhost:8000/admin**

Credenziali di default (cambiale nel `.env`!):
```
ADMIN_EMAIL=admin@lafamiglia808.com
ADMIN_PASSWORD=lafamiglia808
```

### Cosa puoi fare dall'admin:
- **Dashboard** — statistiche e messaggi recenti
- **Servizi** — crea/modifica/elimina servizi, attiva/disattiva visibilità
- **Portfolio** — aggiungi progetti con cover, link Spotify/YouTube/SoundCloud, featured
- **Messaggi** — leggi i messaggi del form contatti, rispondi via email

---

## Struttura Pagine Pubbliche

| URL | Pagina |
|-----|--------|
| `/` | Home (Hero + Servizi + Portfolio + CTA) |
| `/servizi` | Lista completa servizi |
| `/portfolio` | Griglia portfolio |
| `/chi-siamo` | About + Gear |
| `/contatti` | Form contatti |
| `/admin` | Panel admin (protetto) |

---

## Personalizzazione

### Colori
I colori sono definiti nella configurazione Tailwind all'interno dei layout Blade:
- `#DC2626` → Rosso accent
- `#0A0A0A` → Nero principale
- `#111111` → Card background
- `#F5F5F5` → Bianco testo

### Credenziali Admin
Modifica nel `.env`:
```
ADMIN_EMAIL=tuaemail@dominio.com
ADMIN_PASSWORD=tuapasswordsicura
```

### Database MySQL (produzione)
Nel `.env`:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lafamiglia808
DB_USERNAME=root
DB_PASSWORD=password
```

---

## Deploy su Hosting

1. Carica i file sul server (escludi `node_modules`, `vendor`)
2. Esegui `composer install --no-dev --optimize-autoloader`
3. Configura il `.env` con i dati del server
4. `php artisan migrate --force`
5. `php artisan db:seed --force`
6. `php artisan storage:link`
7. `php artisan config:cache && php artisan route:cache`

Il `public/` deve essere la document root del tuo virtual host.

---

**LaFamiglia808 © {{ date('Y') }}** — Built with ❤️ and 808s
# laFamiglia808-s
