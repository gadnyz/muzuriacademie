<?= $this->include('templates/header') ?>

<div class="container" style="padding: 4rem 2rem;">
    <div style="max-width: 720px; margin: 0 auto; background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08);">
        <div style="text-align: center; margin-bottom: 1.25rem;">
            <div style="width: 58px; height: 58px; margin: 0 auto 0.8rem auto; border-radius: 999px; background: rgba(42, 171, 115, 0.12); color: var(--color-jungle-green); display: flex; align-items: center; justify-content: center; font-size: 1.4rem;">
                <i class="fas fa-check"></i>
            </div>
            <h2 style="color: var(--color-elephant); margin: 0;">Inscription confirmee</h2>
            <p style="color: var(--color-regent-gray); margin: 0.75rem 0 0 0;">
                Merci pour votre confiance, votre place est reservee.
            </p>
        </div>

        <?php if (isset($webinar)): ?>
            <div style="background-color: var(--color-geyser); padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; text-align: center;">
                <h3 style="margin: 0; color: var(--color-jungle-green);">
                    <?= esc($webinar['title']) ?>
                </h3>
                <p style="margin: 0.5rem 0 0 0; color: var(--color-elephant);">
                    <?= date('d/m/Y H:i', strtotime($webinar['date_time'])) ?>
                </p>
            </div>
        <?php endif; ?>

        <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 1rem 1.1rem; color: #1f2937;">
            <p style="margin: 0 0 0.75rem 0; font-weight: 600; color: var(--color-elephant);">
                Prochaines etapes
            </p>
            <p style="margin: 0 0 0.6rem 0;">
                Votre inscription est bien enregistree.
            </p>
            <p style="margin: 0 0 0.6rem 0;">
                Vous recevrez un email contenant votre invitation (pensez a verifier vos spams).
            </p>
            <p style="margin: 0;">
                Vous serez egalement appele(e) par un membre de l'equipe d'organisation pour le suivi.
            </p>
        </div>

        <div style="margin-top: 1.5rem; text-align: center;">
            <a href="<?= base_url() ?>" class="btn btn-primary">Retour a l'accueil</a>
        </div>
    </div>
</div>

<?= $this->include('templates/footer') ?>
