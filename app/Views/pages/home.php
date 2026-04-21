<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<?php
/** @var array $c */
$hero   = $c['hero'];
$first  = $c['beFirst'];
$feat   = $c['features'];
$why    = $c['whyMake'];
$early  = $c['earlyAccess'];
$beta   = $c['betaSignup'];
?>

<div id="iron-pdf">
    <div class="iron-pdf-page iron-pdf-page--cpp">

            <section class="hero" id="hero-section">
                <div class="hero__wrapper">
                    <div class="hero__illustration d-none d-lg-block">
                        <img src="<?= base_url($hero['floatingSymbol']) ?>" alt="" class="hero__art">
                    </div>

                    <div class="container-fluid hero__container">
                        <div class="hero__content">
                            <div class="hero__brand mb-40">
                                <img src="<?= base_url($hero['logo']) ?>" alt="<?= esc($hero['titleAccent']) ?>" class="ironpdf-cpp__logo">
                            </div>
                            <p class="hero__pre-title"><?= esc($hero['eyebrow']) ?></p>
                            <h1 class="hero__title" id="hero-heading">
                                <?= esc($hero['titleMain']) ?> <br>
                                <span class="hero__title--accent"><?= esc($hero['titleAccent']) ?></span>
                            </h1>
                            <p class="hero__status"><?= esc($hero['status']) ?></p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="signup-block" id="signup-section">
                <div class="signup-block__wrapper">
                    <div class="container-fluid signup-block__container">
                        <div class="signup-block__content">
                            <header class="signup-block__header">
                                <h2 class="signup-block__title" id="befirst-heading"><?= esc($first['title']) ?></h2>
                                <h3 class="signup-block__subtitle"><?= esc($first['subtitle']) ?></h3>
                            </header>

                            <?= view('partials/signup_form', [
                                'id'          => 'hero-email',
                                'placeholder' => $first['form']['placeholder'],
                                'button'      => $first['form']['button'],
                                'label'       => 'Beta program early access signup',
                                'isSimple'    => false 
                            ]) ?>

                            <div class="signup-block__footer-status">
                                <span class="badge-pill"><?= esc($first['note']['badge']) ?></span>
                                <p class="badge-description">
                                    <?= esc($first['note']['text']) ?>
                                    <?php foreach ($first['note']['products'] as $i => $p): ?>
                                        <em><?= esc($p) ?></em><?= $i < count($first['note']['products']) - 1 ? ' | ' : '' ?>
                                    <?php endforeach; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="features-section" class="bg-dark-purple" aria-labelledby="ironpdf-heading">
                <div class="bg-shape">
                    <div id="features-intro">
                        <div class="container-fluid text-center">
                            <h2 id="ironpdf-heading"><?= esc($feat['title']) ?>
                                <img loading="lazy" src="<?= base_url($feat['badge']) ?>" alt="New" class="features__badge">
                            </h2>
                            <div class="features__highlights">
                                <?php foreach ($feat['items'] as $i => $item): ?>
                                    <div><span class="features__highlights-span"># </span> <span><?= esc($item) ?></span></div>
                                    <?php if ($i < count($feat['items']) - 1): ?>
                                        <div class="features__divider" aria-hidden="true"><div></div></div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div id="features-details" class="bg-shape--bottom">
                        <div class="container-fluid">
                            <?php foreach ($feat['paragraphs'] as $para): ?>
                                <p><?= strip_tags($para, '<em>') ?></p>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>

            <section id="why-section" class="bg-light-purple" aria-labelledby="whymake-heading">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="d-none d-lg-block col-lg-3">
                            <div class="why-make__illustration">
                                <img loading="lazy" src="<?= base_url($why['illustration']) ?>" alt="<?= esc($why['illustrationAlt']) ?>">
                            </div>
                        </div>
                        <div class="col-12 col-lg-9">
                            <h2 id="whymake-heading"><?= esc($why['titleMain']) ?> <em><?= esc($why['titleAccent']) ?></em></h2>
                            <?php foreach ($why['paragraphs'] as $para): ?>
                                <p><?= esc($para) ?></p>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>

            <section id="early-access-section" class="bg-dark-purple" aria-labelledby="earlyaccess-heading">
                <div class="bg-shape">
                    <div id="early-access-intro">
                        <div class="container-fluid">
                            <h2 id="earlyaccess-heading"><?= esc($early['titleMain']) ?> <em><?= esc($early['titleAccent']) ?></em></h2>
                            <p><?= esc($early['description']) ?></p>

                            <ul class="lang-grid row row-cols-1 row-cols-lg-3 g-3 list-unstyled" aria-label="IronPDF releases by language">
                                <?php foreach ($early['cards'] as $card): ?>
                                    <li class="col">
                                        <a href="<?= esc($card->href) ?>">
                                            <div class="lang-card">
                                                <div class="row">
                                                    <div class="<?= esc($card->getColumnClass('chip')) ?>">
                                                        <div class="text-center text-nowrap lang-card__chip <?= esc($card->getChipModifier()) ?>">
                                                            <strong>#</strong> <?= esc($card->status) ?>
                                                        </div>
                                                    </div>
                                                    <div class="<?= esc($card->getColumnClass('body')) ?> lang-card__body ps-4">
                                                        <div class="lang-card__brand"><span class="fw-bold"><?= esc($early['brandMark']['bold']) ?></span><?= esc($early['brandMark']['suffix']) ?></div>
                                                        <div class="lang-card__label"><?= esc($card->platform) ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>

                    <div id="early-access-signup" class="bg-shape--bottom">
                        <div class="container-fluid">
                            <h2><?= esc($beta['titleMain']) ?> <em><?= esc($beta['titleAccent']) ?></em></h2>
                            <?= view('partials/signup_form', [
                                'id'          => 'beta-program-email',
                                'placeholder' => $beta['form']['placeholder'],
                                'button'      => $beta['form']['button'],
                                'label'       => 'Beta program signup',
                                'isSimple'    => true 
                            ]) ?>
                        </div>
                    </div>
                </div>
            </section>
    </div>
</div>

<?= $this->endSection() ?>