<?= $this->include('templates/header') ?>

<div class="container" style="padding: 4rem 2rem;">
    <div
        style="max-width: 600px; margin: 0 auto; background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
        <h2 style="color: var(--color-elephant); text-align: center;">Inscription au Webinaire</h2>

        <?php if (isset($webinar)): ?>
            <div
                style="background-color: var(--color-geyser); padding: 1rem; border-radius: 5px; margin-bottom: 2rem; text-align: center;">
                <h3 style="margin: 0; color: var(--color-jungle-green);">
                    <?= esc($webinar['title']) ?>
                </h3>
                <p style="margin: 0.5rem 0;">
                    <?= date('d/m/Y H:i', strtotime($webinar['date_time'])) ?>
                </p>
            </div>
        <?php endif; ?>

        <?php if (isset($validation)): ?>
            <div style="background-color: #ffe6e6; color: #cc0000; padding: 1rem; border-radius: 5px; margin-bottom: 1rem;">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('registration/create') ?>" method="post">
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
    </div>
</div>

<?= $this->include('templates/footer') ?>