<?= $this->include('templates/header') ?>

<!-- 1. WEBINAR REGISTRATION SECTION -->
<section id="register" class="container" style="padding-top: 4rem; padding-bottom: 4rem;">
    <?php if (isset($webinar)): ?>
        <div class="card"
            style="display: flex; flex-wrap: wrap; gap: 3rem; align-items: center; overflow: hidden; padding: 0;">

            <!-- Left: Info -->
            <div style="flex: 1; min-width: 300px; padding: 3rem;">
                <span
                    style="background-color: rgba(42, 171, 115, 0.1); color: var(--color-jungle-green); padding: 5px 12px; border-radius: 20px; font-weight: 600; font-size: 0.9rem;">
                    Prochain Événement
                </span>
                <h2 style="color: var(--color-elephant); font-size: 2rem; margin-top: 1rem; margin-bottom: 0.5rem;">
                    <?= esc($webinar['title']) ?>
                </h2>

                <div
                    style="display: flex; align-items: center; gap: 15px; color: var(--color-regent-gray); font-weight: 500; margin-bottom: 1.5rem;">
                    <?php
                    $dt = new DateTime($webinar['date_time']);
                    $days = ['dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'];
                    $months = ['janvier', 'fevrier', 'mars', 'avril', 'mai', 'juin', 'juillet', 'aout', 'septembre', 'octobre', 'novembre', 'decembre'];
                    $dayName = $days[(int) $dt->format('w')];
                    $monthName = $months[(int) $dt->format('n') - 1];
                    $dateLabel = ucfirst($dayName) . ' ' . $dt->format('j') . ' ' . $monthName . ' ' . $dt->format('Y');
                    $timeLabel = $dt->format('H') . 'h' . $dt->format('i');
                    ?>
                    <span><i class="fas fa-calendar-alt"></i> <?= esc($dateLabel) ?></span>
                    <span><i class="fas fa-clock"></i> <?= esc($timeLabel) ?></span>
                </div>

                <p style="color: #4a5568; margin-bottom: 1.25rem; white-space: pre-line;">
                    <?= esc($webinar['description']) ?>
                </p>

                <div style="background:#f8fafc; border:1px solid #e2e8f0; border-radius:12px; padding:16px 18px; margin-bottom:2rem;">
                    <p style="margin:0 0 10px 0; color:#0f172a; font-weight:700; font-size:1rem;">
                        Pourquoi tant de personnes ont peur de parler en public ?
                    </p>
                    <p style="margin:0 0 10px 0; color:#334155; font-size:0.95rem;">
                        <strong>Tu n’as pas peur de parler.</strong> Tu as peur d’être jugé.
                    </p>
                    <ul style="margin:0 0 10px 18px; color:#475569; font-size:0.95rem;">
                        <li>Et ton corps le sait.</li>
                        <li>Cœur qui s’emballe.</li>
                        <li>Voix qui tremble.</li>
                        <li>Esprit qui se vide.</li>
                    </ul>
                    <p style="margin:0; color:#1f2937; font-weight:600; font-size:0.95rem;">
                        Ce n’est pas un défaut. C’est un mécanisme appris.
                    </p>
                </div>

                <a href="<?= base_url('registration/index/' . esc($webinar['id'])) ?>" class="btn btn-primary"
                    style="padding: 15px 35px; font-size: 1.1rem;">
                    S'inscrire Gratuitement
                </a>
            </div>

            <!-- Right: Image/Visual -->
            <div style="flex: 1; min-width: 300px; height: 100%; min-height: 400px; padding: 0;">
                <img src="<?= base_url('ressources/img/eKishiko.jpg') ?>" alt="Emmanuel Kishiko"
                    style="width: 100%; height: 100%; object-fit: cover; display: block; min-height: 400px; border-radius: 0 var(--radius-lg) var(--radius-lg) 0;">
            </div>
        </div>
    <?php else: ?>
        <div style="text-align: center; color: var(--color-regent-gray); padding: 4rem;">
            <h2>Nos Événements</h2>
            <p>Aucun webinaire n'est prévu pour le moment. Revenez bientôt !</p>
        </div>
    <?php endif; ?>
</section>

<!-- 2. MOTIVATION SECTION -->
<section class="hero"
    style="background: linear-gradient(rgba(15, 54, 63, 0.92), rgba(15, 54, 63, 0.85)), url('<?= base_url('ressources/img/hero-bg.jpg') ?>'); background-attachment: fixed; background-size: cover; color: white; padding: 6rem 2rem; text-align: center;">
    <div class="container">
        <h3 style="font-size: 2rem; margin-bottom: 1.5rem; font-weight: 700; leading-trim: both;">
            Notre mission est de révéler<br>le potentiel unique de chacun
        </h3>
        <p style="font-size: 1.25rem; max-width: 700px; margin: 0 auto 3rem; opacity: 0.9;">
            À travers nos programmes de coaching, nos formations et conférences, nous guidons les individus et les
            organisations vers une transformation durable.
        </p>
        <?php if (isset($webinar)): ?>
            <a href="<?= base_url('registration/index/' . esc($webinar['id'])) ?>" class="btn btn-primary"
                style="background-color: white; color: var(--color-jungle-green);">
                Rejoindre le webinaire
            </a>
        <?php endif; ?>
    </div>
</section>

<!-- 3. ABOUT SECTION -->
<section id="about" style="background-color: white; padding: 5rem 2rem;">
    <div class="container">
        <div style="text-align: center; margin-bottom: 4rem;">
            <h2 style="font-size: 2.2rem; margin-bottom: 1rem; color: var(--color-elephant);">À Propos de Muzuri
                Académie</h2>
            <p style="max-width: 600px; margin: 0 auto; color: var(--color-regent-gray);">
                Nous sommes dédiés à l'accompagnement des leaders.
            </p>
            <p style="max-width: 600px; margin: 0.75rem auto 0; color: var(--color-elephant); font-weight: 600;">
                Nos piliers
            </p>
        </div>

        <!-- Pillars Grid -->
        <div
            style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem; margin-bottom: 4rem;">
            <!-- Card 1 -->
            <div class="card" style="text-align: center; border-top: 5px solid var(--color-jungle-green);">
                <div style="font-size: 3rem; margin-bottom: 1rem; color: var(--color-jungle-green);"><i
                        class="fas fa-bullhorn"></i></div>
                <h3 style="color: var(--color-elephant); font-size: 1.5rem;">Influencer</h3>
                <p style="color: #64748b;">Développer votre leadership pour impacter positivement votre entourage.</p>
            </div>
            <!-- Card 2 -->
            <div class="card" style="text-align: center; border-top: 5px solid var(--color-jungle-green);">
                <div style="font-size: 3rem; margin-bottom: 1rem; color: var(--color-jungle-green);"><i
                        class="fas fa-handshake"></i></div>
                <h3 style="color: var(--color-elephant); font-size: 1.5rem;">Accompagner</h3>
                <p style="color: #64748b;">Un suivi personnalisé pour atteindre vos objectifs professionnels et
                    personnels.</p>
            </div>
            <!-- Card 3 -->
            <div class="card" style="text-align: center; border-top: 5px solid var(--color-jungle-green);">
                <div style="font-size: 3rem; margin-bottom: 1rem; color: var(--color-jungle-green);"><i
                        class="fas fa-leaf"></i></div>
                <h3 style="color: var(--color-elephant); font-size: 1.5rem;">Transformer</h3>
                <p style="color: #64748b;">Changer les mentalités pour une réussite durable.</p>
            </div>
        </div>
    </div>
</section>

<?= $this->include('templates/footer') ?>
