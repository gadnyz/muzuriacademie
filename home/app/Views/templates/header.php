<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Encodage & responsive -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Titre SEO (60 caractères max) -->
    <title>Muzuri Académie | Coaching, Leadership et Développement Personnel</title>

    <!-- Meta description (150–160 caractères) -->
    <meta name="description"
          content="Muzuri Académie accompagne leaders, entrepreneurs et organisations à révéler leur potentiel grâce au coaching, aux formations et conférences.">

    <!-- Mots-clés (secondaire, mais utile) -->
    <meta name="keywords"
          content="coaching, leadership, développement personnel, formation, conférence, prise de parole, transformation personnelle">
    <!-- Auteur / marque -->
    <meta name="author" content="Muzuri Académie">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?= base_url() ?>">

    <!-- Open Graph (partage Facebook / LinkedIn) -->
    <meta property="og:title" content="Muzuri Académie | Révéler le potentiel des leaders">
    <meta property="og:description"
          content="Programmes de coaching, formations et conférences pour une transformation durable des individus et organisations.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= base_url() ?>">
    <meta property="og:site_name" content="Muzuri Académie">
    <meta property="og:locale" content="fr_FR">
    <meta property="og:image" content="<?= base_url('ressources/img/logo_muz_off.png') ?>">
    <meta property="og:image:alt" content="Muzuri Académie - Logo">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Muzuri Académie | Révéler le potentiel des leaders">
    <meta name="twitter:description"
          content="Programmes de coaching, formations et conférences pour une transformation durable des individus et organisations.">
    <meta name="twitter:image" content="<?= base_url('ressources/img/logo_muz_off.png') ?>">
    <!-- Préconnexion & Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap"
          rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('apple-touch-icon.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('favicon-16x16.png') ?>">
    <link rel="shortcut icon" href="<?= base_url('favicon.ico') ?>">
    <link rel="manifest" href="<?= base_url('site.webmanifest') ?>">
    <meta name="theme-color" content="#ffffff">
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "Muzuri Académie",
            "url": "<?= base_url() ?>",
            "logo": "<?= base_url('ressources/img/logo_muz_off.png') ?>",
            "sameAs": [
                "https://www.instagram.com/muzur_iacademie",
                "https://www.facebook.com/share/1EMGpGmfQY/"
            ]
        }
    </script>
    <style>
        :root {
            --color-white : #ffffff;
            --color-geyser: #f0f4f8;
            /* Softer gray/blue */
            --color-elephant: #0f363f;
            --color-jungle-green: #2aab73;
            --color-regent-gray: #64748b;
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --radius-md: 12px;
            --radius-lg: 14px;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--color-geyser);
            color: var(--color-elephant);
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        header {
            background-color: var(--color-white);
            padding: 1rem 2rem;
            box-shadow: var(--shadow-sm);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        /* Modern Button */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 24px;
            border-radius: 999px;
            /* Pill shape */
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
            border: none;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: var(--color-jungle-green);
            color: white;
        }

        .btn-primary:hover {
            background-color: #238f61;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(42, 171, 115, 0.3);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* Card Utility */
        .card {
            background: white;
            border-radius: var(--radius-lg);
            padding: 2rem;
            box-shadow: var(--shadow-md);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        /* Form Inputs */
        input[type="text"],
        input[type="email"],
        input[type="tel"] {
            font-family: 'Poppins', sans-serif;
            padding: 12px 16px !important;
            border-radius: 8px !important;
            border: 1px solid #e2e8f0 !important;
            background-color: #f8fafc;
            transition: border-color 0.3s;
        }

        input:focus {
            outline: none;
            border-color: var(--color-jungle-green) !important;
            background-color: white;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo-container" style="display: flex; align-items: center; gap: 10px;">
            <img src="<?= base_url('ressources/img/logo.png') ?>" alt="Muzuri Académie Logo" style="max-height: 60px;">
            <span style="font-weight: bold; font-size: 1.5rem;">MUZURI <span style="font-weight: 100;">ACADÉMIE</span></span>
        </div>

        <!-- <a href="#register" class="btn btn-primary">Prochain Webinaire</a> -->
    </header>
    <main>
