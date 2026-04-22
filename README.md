# IronPDF for C++ — Beta Landing Page

A CodeIgniter 4 implementation of the IronPDF for C++ beta-program landing page. All page copy is sourced from a single JSON file so marketing can edit content without touching PHP.

## Requirements

- PHP **8.2+** (CodeIgniter 4.7 and `laminas/laminas-escaper` 2.18 both require `^8.2`)
- Composer 2.x
- CodeIgniter 4 (installed via Composer)
- Extensions: `intl`, `mbstring`, `json`

Verify your PHP version before installing:

```bash
php -v
# Must report PHP 8.2.x or newer
```

## Installation

```bash
composer install
cp env .env          # then edit .env (see "Environment" below)
```

Point your web server's document root at `public/` — **never** the project root, otherwise `.env`, `app/`, and `writable/` are exposed.

Local quick-start:

```bash
php spark serve
# → http://localhost:8080
```

## Environment

`.env` is the single source of runtime config. Key entries:

| Key | Development | Production |
|---|---|---|
| `CI_ENVIRONMENT` | `development` | **`production`** |
| `app.baseURL` | `http://localhost:8080/` | your public URL |
| `app.forceGlobalSecureRequests` | `false` | `true` (HTTPS) |

Switching `CI_ENVIRONMENT` to `production` turns off verbose error pages, enables view caching, and loads `app/Config/Boot/production.php`. `.env` is gitignored — never commit it.

Before deploying:

```bash
composer install --no-dev --optimize-autoloader
```

## Routing

One route is registered in `app/Config/Routes.php`:

```php
$routes->get('/', 'Home::index');
```

`GET /` → `App\Controllers\Home::index()` → `view('pages/home')`.

## Data flow (JSON-driven)

```
app/Data/content.json
   └─ App\Libraries\ContentLoader          (reads + decodes JSON)
       └─ App\Repositories\PageContentRepository
           (hydrates cards into App\Entities\CardEntity)
               └─ App\Controllers\Home
                   └─ app/Views/pages/home.php
```

Dependencies are resolved through CI4's service container — see `Config\Services::pageContentRepository()`.

## Editing content

Non-developers can update nav items, hero copy, feature paragraphs, cards, and the signup form by editing **`app/Data/content.json`**. Schema summary:

| Key | Purpose |
|---|---|
| `meta` | `<title>`, meta description, Open Graph |
| `nav` | Brand + top navigation items |
| `hero` | Above-the-fold headline block |
| `beFirst` | "Be one of the first" signup block |
| `features` | Feature grid + descriptive paragraphs |
| `whyMake` | "Why make a C++ PDF library" section |
| `earlyAccess.cards` | Language cards (`Released` / `Coming Soon`) |
| `betaSignup` | Bottom signup block |

### Card statuses

Each card in `earlyAccess.cards` must use one of the statuses defined in `App\Entities\CardStatus`:

- `"Released"` — renders chip/body as `col-6 col-lg-5` / `col-6 col-lg-7`
- `"Coming Soon"` — renders both as `col-6 col-lg-6`

Adding a new status = add one case to the enum; no view change required.

## Security

- All dynamic output is escaped via `esc()`.
- The one exception is `features.paragraphs`, which intentionally contains `<em>` tags. These are rendered through `strip_tags($para, '<em>')` so only `<em>` survives — scripts, attributes, and other tags are stripped.
- `.env` is gitignored.
- `writable/` must be writable by the PHP user but **not** web-reachable.

## Folder structure

```
app/
├─ Config/
│  ├─ Routes.php
│  └─ Services.php            ← DI: contentLoader, pageContentRepository
├─ Controllers/
│  ├─ BaseController.php
│  └─ Home.php
├─ Data/
│  └─ content.json            ← single source of page copy
├─ Entities/
│  ├─ CardEntity.php          ← one card (CI4 Entity)
│  └─ CardStatus.php          ← PHP 8.1 backed enum
├─ Libraries/
│  └─ ContentLoader.php       ← JSON file I/O
├─ Repositories/
│  └─ PageContentRepository.php
└─ Views/
   ├─ layouts/default.php
   ├─ pages/home.php
   └─ partials/{header,signup_form}.php

public/assets/{css,js,fonts,images,bootstrap}/
```

## Production checklist

- [ ] `.env` → `CI_ENVIRONMENT=production`
- [ ] `.env` → set `app.baseURL` and `app.forceGlobalSecureRequests=true`
- [ ] `composer install --no-dev --optimize-autoloader`
- [ ] Web root points to `public/`
- [ ] `writable/` is writable by PHP user, not web-served
- [ ] HTTPS enabled
- [ ] Optionally strip `spark` from the deploy artifact (CLI tool, not needed to serve HTTP)
