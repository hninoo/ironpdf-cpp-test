<?php
/**
 * @var array $c  content data from app/Data/content.json
 */
$m = $c['meta'];
?>
<!doctype html>
<html lang="<?= esc($m['lang']) ?>" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="<?= esc($m['themeColor']) ?>">
    <meta name="color-scheme" content="dark">

    <title><?= esc($m['title']) ?></title>
    <meta name="description" content="<?= esc($m['description']) ?>">
    <meta name="keywords" content="<?= esc($m['keywords']) ?>">
    <link rel="canonical" href="<?= esc($m['canonical']) ?>">

    <meta property="og:type"        content="<?= esc($m['og']['type']) ?>">
    <meta property="og:title"       content="<?= esc($m['og']['title']) ?>">
    <meta property="og:description" content="<?= esc($m['og']['description']) ?>">
    <meta property="og:site_name"   content="<?= esc($m['og']['siteName']) ?>">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'><rect width='32' height='32' rx='6' fill='%232C0F29'/><text x='50%25' y='58%25' font-family='Arial,sans-serif' font-weight='900' font-size='16' text-anchor='middle' fill='%23E01A59'>i</text></svg>">

    <link rel="preload" as="font" type="font/woff2" href="<?= base_url('assets/fonts/gotham-book-webfont.woff2') ?>" crossorigin>
    <link rel="preload" as="font" type="font/woff2" href="<?= base_url('assets/fonts/gotham-bold-webfont.woff2') ?>" crossorigin>
    <link rel="preload" as="font" type="font/woff2" href="<?= base_url('assets/fonts/gotham-black-webfont.woff2') ?>" crossorigin>

    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/base.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/layout.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/components/navbar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/components/form.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/components/card.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/components/button.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/pages/iron-pdf-cpp.css') ?>">

</head>
<body>

<a class="visually-hidden-focusable" href="#main">Skip to main content</a>

<?= $this->include('partials/header') ?>

<main id="main" tabindex="-1">
    <?= $this->renderSection('content') ?>
</main>


<script src="<?= base_url('assets/bootstrap/bootstrap.bundle.min.js') ?>" defer></script>
<script src="<?= base_url('assets/js/main.js') ?>" defer></script>
</body>
</html>
