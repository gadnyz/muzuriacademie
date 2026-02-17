<?= $this->include('templates/header') ?>

<div class="container" style="padding: 4rem 2rem;">
    <div
        style="max-width: 600px; margin: 0 auto; background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
        <h2 style="color: var(--color-elephant); text-align: center;">Inscription au prochain évenement</h2>

        <?php if (isset($webinar)): ?>
            <div
                style="background-color: var(--color-geyser); padding: 1rem; border-radius: 5px; margin-bottom: 2rem; text-align: center;">
                <h3 style="margin: 0; color: var(--color-jungle-green);">
                    <?= esc($webinar['title']) ?>
                </h3>
                <?php
                $dt = new DateTime($webinar['date_time']);
                $months = [
                    1 => 'janvier',
                    2 => 'février',
                    3 => 'mars',
                    4 => 'avril',
                    5 => 'mai',
                    6 => 'juin',
                    7 => 'juillet',
                    8 => 'août',
                    9 => 'septembre',
                    10 => 'octobre',
                    11 => 'novembre',
                    12 => 'décembre',
                ];
                $dateLabel = $dt->format('d') . ' ' . $months[(int) $dt->format('n')] . ' ' . $dt->format('Y') . ' à ' . $dt->format('H\hi');
                ?>
                <p style="margin: 0.5rem 0;">
                    <?= esc($dateLabel) ?>
                </p>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div style="background-color: #ffe6e6; color: #cc0000; padding: 1rem; border-radius: 5px; margin-bottom: 1rem;">
                <?= esc(session()->getFlashdata('error')) ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($isSoldOut)): ?>
            <div style="background-color: #ffe6e6; color: #cc0000; padding: 1rem; border-radius: 5px; margin-bottom: 1rem;">
                Sold Out : le quota de <?= esc($capacity) ?> participants est atteint.
            </div>
        <?php elseif (!empty($isUrgent)): ?>
            <div style="background-color: #fff4e5; color: #b45309; padding: 1rem; border-radius: 5px; margin-bottom: 1rem;">
                Urgence : il ne reste que <?= esc($remaining) ?> places.
            </div>
        <?php endif; ?>

        <?php if (isset($validation)): ?>
            <div style="background-color: #ffe6e6; color: #cc0000; padding: 1rem; border-radius: 5px; margin-bottom: 1rem;">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <?php if (empty($isSoldOut)): ?>
        <form action="<?= base_url('registration/create') ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="webinar_id" value="<?= esc($webinar['id']) ?>">

            <div style="margin-bottom: 1rem;">
                <label for="name" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">Nom Complet</label>
                <input type="text" id="name" name="name" value="<?= set_value('name') ?>" required
                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;">
            </div>

            <div style="margin-bottom: 1rem;">
                <label for="phone" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">Numéro
                    WhatsApp</label>
                <input type="text" id="phone" name="phone" value="<?= set_value('phone') ?>" required
                    placeholder="+243..."
                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;">
            </div>

            <div style="margin-bottom: 1rem;">
                <label for="email" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">Adresse
                    Email</label>
                <input type="email" id="email" name="email" value="<?= set_value('email') ?>" required
                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;">
            </div>

            <div style="margin-bottom: 1rem;">
                <label for="city" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">Ville</label>
                <input type="text" id="city" name="city" value="<?= set_value('city') ?>" required
                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;">
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%; font-size: 1.1rem;">Je confirme ma
                participation</button>
        </form>
        <?php endif; ?>
    </div>
</div>

<?= $this->include('templates/footer') ?>
