<?= $this->include('templates/header') ?>

<div class="container" style="padding: 4rem 2rem;">
    <div style="max-width: 720px; margin: 0 auto; background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08);">
        <div style="text-align: center; margin-bottom: 1.25rem;">
            <div style="width: 58px; height: 58px; margin: 0 auto 0.8rem auto; border-radius: 999px; background: rgba(42, 171, 115, 0.12); color: var(--color-jungle-green); display: flex; align-items: center; justify-content: center; font-size: 1.4rem;">
                <i class="fas fa-check"></i>
            </div>
            <?php if (isset($webinar)): ?>
                <h2 style="color: var(--color-elephant); margin: 0;">Inscription confirmée</h2>
                <p style="color: var(--color-regent-gray); margin: 0.75rem 0 0 0;">
                    Votre inscription au <strong><?= esc($webinar['title']) ?></strong> est confirmée.
                </p>
                <p style="color: var(--color-regent-gray); margin: 0.75rem 0 0 0;">
                    Vous recevrez un email contenant votre invitation (pensez à vérifier vos spams).
                </p>
            <?php endif; ?>
        </div>
        <div style="margin-top: 1.5rem; text-align: center;">
            <a href="<?= base_url() ?>" class="btn btn-primary"> Retour à l'accueil</a>
        </div>
    </div>
</div>

<?= $this->include('templates/footer') ?>

