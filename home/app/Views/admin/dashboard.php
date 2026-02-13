<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Muzuri Académie</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
    <style>
        :root {
            --color-elephant: #0f363f;
            --color-jungle-green: #2aab73;
            --color-regent-gray: #7e92a4;
            --color-slate: #334155;
            --color-slate-light: #e2e8f0;
            --color-surface: #ffffff;
            --color-bg: #f8fafc;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--color-bg);
            margin: 0;
            color: var(--color-slate);
        }

        header {
            background-color: var(--color-elephant);
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 3px solid var(--color-jungle-green);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand img {
            height: 40px;
            width: auto;
            display: block;
            background: #ffffff;
            padding: 6px 10px;
            border-radius: 8px;
        }

        .brand h1 {
            margin: 0;
            font-size: 1.4rem;
            font-weight: 700;
            letter-spacing: 0.2px;
        }

        .header-actions a {
            color: #e2f3ee;
            text-decoration: none;
            font-weight: 600;
        }

        .header-actions a:hover {
            color: #ffffff;
            text-decoration: underline;
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .filters {
            background: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(9, 0, 0, 0.04);
            margin-bottom: 2rem;
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            align-items: flex-end;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 0.2rem;
            font-size: 0.9rem;
            font-weight: bold;
        }

        input,
        select {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .btn {
            padding: 9px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            color: white;
            font-size: 0.9rem;
        }

        .btn-primary {
            background-color: #2aab73;
        }

        .btn-secondary {
            background-color: #7e92a4;
        }

        .btn-danger {
            background-color: #d9534f;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: var(--color-surface);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        th,
        td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background-color: var(--color-elephant);
            color: #ffffff;
            font-weight: 700;
        }

        tr:hover {
            background-color: #f1f5f9;
        }

        .dataTables_wrapper {
            color: var(--color-slate);
        }

        .dataTables_wrapper .dataTables_filter input,
        .dataTables_wrapper .dataTables_length select {
            padding: 6px 8px;
            border: 1px solid var(--color-slate-light);
            border-radius: 4px;
        }

        .dataTables_wrapper .dataTables_filter label,
        .dataTables_wrapper .dataTables_length label,
        .dataTables_wrapper .dataTables_info {
            color: var(--color-slate);
            font-weight: 600;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            border: 1px solid var(--color-slate-light) !important;
            background: #ffffff !important;
            color: var(--color-slate) !important;
            border-radius: 4px !important;
            padding: 0.25rem 0.6rem !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            background: var(--color-elephant) !important;
            color: #ffffff !important;
            border-color: var(--color-elephant) !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: var(--color-jungle-green) !important;
            color: #ffffff !important;
            border-color: var(--color-jungle-green) !important;
        }


        .table-wrap {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        @media (max-width: 768px) {
            header {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.75rem;
            }

            .brand h1 {
                font-size: 1.2rem;
            }

            .dataTables_wrapper .dataTables_filter,
            .dataTables_wrapper .dataTables_length,
            .dataTables_wrapper .dt-buttons {
                float: none !important;
                text-align: left !important;
                margin-bottom: 0.75rem;
                width: 100%;
            }

            .dataTables_wrapper .dataTables_filter input {
                width: 100%;
            }

            th, td {
                white-space: nowrap;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="brand">
            <img src="<?= base_url('ressources/img/logo.png') ?>" alt="Muzuri Académie">
            <h1>Tableau de Bord</h1>
        </div>
        <div class="header-actions">
            <span>Admin</span> | <a href="<?= base_url('/admin/auth/logout') ?>">Déconnexion</a>
        </div>
    </header>

    <div class="container">

        <div class="table-wrap">
            <table id="participants-table" class="display">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Nom</th>
                    <th>Téléphone</th>
                    <th>Evénement</th>
                    <th>Email</th>
                    <th>Ville</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($participants)): ?>
                    <tr>
                        <td colspan="7" style="text-align: center;">Aucun participant trouvé.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($participants as $p): ?>
                        <tr>
                            <td>
                                
                            </td>
                            <td>
                                <?= esc($p['name']) ?>
                            </td>
                            <td>
                                <?= esc($p['phone']) ?>
                            </td>
                            <td>
                                <?= esc($p['webinar_title'] ?? '') ?>
                            </td>
                            
                            <td>
                                <?= esc($p['email']) ?>
                            </td>
                            <td>
                                <?= esc($p['city']) ?>
                            </td>
                            <td data-order="<?= esc($p['created_at']) ?>">
                                <?= date('d/m/Y H:i', strtotime($p['created_at'])) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
            </table>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script>
        $(function () {
            const table = $('#participants-table').DataTable({
                order: [[6, 'desc']],
                columnDefs: [
                    { targets: 0, searchable: false, orderable: false }
                ],
                language: {
                    processing: "Traitement en cours...",
                    search: "Rechercher :",
                    lengthMenu: "Afficher _MENU_ entrées",
                    info: "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
                    infoEmpty: "Affichage de 0 à 0 sur 0 entrée",
                    infoFiltered: "(filtré de _MAX_ entrées au total)",
                    loadingRecords: "Chargement en cours...",
                    zeroRecords: "Aucun enregistrement trouvé",
                    emptyTable: "Aucune donnée disponible",
                    paginate: {
                        first: "Premier",
                        previous: "Précédent",
                        next: "Suivant",
                        last: "Dernier"
                    },
                    aria: {
                        sortAscending: ": activer pour trier la colonne par ordre croissant",
                        sortDescending: ": activer pour trier la colonne par ordre décroissant"
                    }
                }
            });

            table.on('order.dt search.dt', function () {
                table.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
                    cell.textContent = i + 1;
                });
            }).draw();
        });
    </script>
</body>

</html>