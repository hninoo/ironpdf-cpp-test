<?php
$isSimple = $isSimple ?? false;
?>

<form class="<?= $isSimple ? 'signup' : 'signup-form' ?> js-signup" action="#signup" method="post" novalidate aria-label="<?= esc($label) ?>">
    
    <?php if (!$isSimple): ?>
        <div class="signup-form__field">
    <?php endif; ?>

        <label class="visually-hidden" for="<?= esc($id) ?>">Email address</label>
        <input class="signup-form__input" 
               id="<?= esc($id) ?>"
               type="email"
               name="email"
               inputmode="email"
               autocomplete="email"
               required
               placeholder="<?= esc($placeholder) ?>">
        <button class="<?= !$isSimple ? 'signup-form__button' : '' ?>" type="submit">
            <span><?= esc($button) ?> ▸ </span>
        </button>

    <?php if (!$isSimple): ?>
        </div>
    <?php endif; ?>

</form>
<p class="signup-form__status" role="status" aria-live="polite"></p>