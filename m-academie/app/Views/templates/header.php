<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muzuri Académie</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --color-geyser: #f0f4f8;
            /* Softer gray/blue */
            --color-elephant: #0f363f;
            --color-jungle-green: #2aab73;
            --color-regent-gray: #64748b;
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --radius-md: 12px;
            --radius-lg: 16px;
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
            background-color: var(--color-elephant);
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
            border-radius: 50px;
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
        <div class="logo-container" style="display: flex; align-items: center; gap: 15px;">
            <img src="<?= base_url('ressources/img/logo.png') ?>" alt="Muzuri Académie Logo" style="max-height: 60px;">
            <span style="color: white; font-weight: bold; font-size: 1.5rem;">MUZURI ACADEMIE</span>
        </div>

        <!-- <a href="#register" class="btn btn-primary">Prochain Webinaire</a> -->
    </header>
    <main>