<?php /** @var array $c */ $n = $c['nav']; ?>
<header class="site-header">
    <nav class="site-nav" aria-label="Primary">
        <div class="site-nav__left">
            <a class="site-nav__brand" href="<?= esc($n['brand']['href']) ?>" aria-label="<?= esc($n['brand']['alt']) ?>">
                <img src="<?= base_url($n['brand']['logo']) ?>" alt="<?= esc($n['brand']['alt']) ?>" class="logo-img">
            </a>

            <button class="site-nav__toggle"
                    type="button"
                    aria-controls="primary-menu"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="bar" aria-hidden="true"></span>
                <span class="bar" aria-hidden="true"></span>
                <span class="bar" aria-hidden="true"></span>
            </button>

            <ul id="primary-menu" class="site-nav__menu" data-open="false">
                <?php foreach ($n['items'] as $item): ?>
                    <li class="site-nav__item">
                        <a class="site-nav__link" href="<?= esc($item['href']) ?>">
                            <?= esc($item['label']) ?>
                            <?php if (!empty($item['dropdown'])): ?>
                                <svg class="site-nav__caret" width="8" height="5" viewBox="0 0 8 5" aria-hidden="true" focusable="false">
                                    <path d="M0 0l4 5 4-5z" fill="currentColor"/>
                                </svg>
                            <?php endif; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </nav>
</header>