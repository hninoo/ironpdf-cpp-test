(function () {
    'use strict';

    // ----- Mobile nav toggle -----
    const toggle = document.querySelector('.site-nav__toggle');
    const menu   = document.getElementById('primary-menu');
    if (toggle && menu) {
        toggle.addEventListener('click', function () {
            const open = toggle.getAttribute('aria-expanded') === 'true';
            toggle.setAttribute('aria-expanded', String(!open));
            menu.dataset.open = String(!open);
        });
        menu.addEventListener('click', function (e) {
            if (e.target.closest('.site-nav__link')) {
                toggle.setAttribute('aria-expanded', 'false');
                menu.dataset.open = 'false';
            }
        });
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                toggle.setAttribute('aria-expanded', 'false');
                menu.dataset.open = 'false';
            }
        });
    }

    // ----- Signup forms (progressive enhancement, no backend) -----
    const isValidEmail = (v) => /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(v);

    document.querySelectorAll('.js-signup').forEach(function (form) {
        const input  = form.querySelector('input[type=email]');
        const btn    = form.querySelector('button');
        const status = form.parentElement.querySelector('.signup-form__status');

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const email = (input.value || '').trim();
            if (status) status.className = 'signup-form__status';

            if (!isValidEmail(email)) {
                if (status) {
                    status.textContent = 'Please enter a valid email address.';
                    status.classList.add('signup-form__status--error');
                }
                input.focus();
                return;
            }

            btn.setAttribute('disabled', '');
            const labelEl  = btn.querySelector('span');
            const original = labelEl.textContent;
            labelEl.textContent = 'Sending…';

            // simulate async submission — replace with real fetch() call
            setTimeout(function () {
                btn.removeAttribute('disabled');
                labelEl.textContent = original;
                if (status) {
                    status.textContent = "You're on the list — we'll be in touch soon!";
                    status.classList.add('signup-form__status--success');
                }
                form.reset();
            }, 700);
        });

        input.addEventListener('input', function () {
            if (status && status.textContent) {
                status.textContent = '';
                status.className = 'signup-form__status';
            }
        });
    });
}());
