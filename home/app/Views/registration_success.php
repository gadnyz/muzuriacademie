<?= $this->include('templates/header') ?>

<div class="container" style="padding: 4rem 2rem; text-align: center;">
    <div
        style="max-width: 600px; margin: 0 auto; background: white; padding: 3rem 2rem; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">

        <div style="font-size: 4rem; margin-bottom: 1rem; color: var(--color-jungle-green);"><i
                class="fas fa-check-circle"></i></div>

        <h2 style="color: var(--color-elephant); margin-bottom: 1rem;">Félicitations 🎉</h2>
        <h3 style="color: var(--color-jungle-green); margin-top: 0;">Votre inscription est confirmée.</h3>

        <p style="font-size: 1.1rem; color: var(--color-regent-gray); margin-bottom: 2rem;">
            Nous sommes ravis de vous compter parmi nous pour ce webinaire transformateur.
        </p>

        <div
            style="background-color: var(--color-geyser); padding: 1.5rem; border-radius: 8px; margin-bottom: 2rem; text-align: left;">
            <p><strong>Prochaines étapes :</strong></p>
            <ul style="padding-left: 20px;">
                <li style="margin-bottom: 0.5rem;">Vérifiez votre boîte mail (y compris les spams) pour le mail de
                    confirmation.</li>
                <li style="margin-bottom: 0.5rem;">Notez la date dans votre agenda : <strong>Dimanche 8 février 2026 à
                        20h30</strong>.</li>
                <li>Préparez vos questions pour Mr Emmanuel KISHIKO.</li>
            </ul>
        </div>

        <a href="<?= base_url() ?>" class="btn btn-primary" style="padding: 12px 25px; font-size: 1.1rem;">
            Retour à l'accueil
        </a>
    </div>
</div>

<?= $this->include('templates/footer') ?>