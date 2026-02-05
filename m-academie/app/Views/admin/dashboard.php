<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Muzuri Académie</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
        }

        header {
            background-color: #0f363f;
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
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
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
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
            background: white;
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
            background-color: #dee6e5;
            color: #0f363f;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        .pagination {
            display: flex;
            list-style: none;
            padding: 0;
            gap: 5px;
            justify-content: center;
            margin-top: 2rem;
        }

        .pagination li a {
            padding: 8px 12px;
            background: white;
            border: 1px solid #ddd;
            text-decoration: none;
            color: #333;
            border-radius: 4px;
        }

        .pagination li.active a {
            background: #0f363f;
            color: white;
            border-color: #0f363f;
        }
    </style>
</head>

<body>
    <header>
        <h1>Tableau de Bord</h1>
        <div>
            <span>Admin</span> | <a href="/admin/auth/logout" style="color: #dee6e5;">Déconnexion</a>
        </div>
    </header>

    <div class="container">
        <div class="filters">
            <form action="" method="get" style="display: flex; gap: 1rem; flex-wrap: wrap; width: 100%;">
                <div class="form-group">
                    <label>Recherche</label>
                    <input type="text" name="search" placeholder="Nom, Email, Tél..."
                        value="<?= esc($filters['search']) ?>">
                </div>
                <div class="form-group">
                    <label>Ville</label>
                    <input type="text" name="city" placeholder="Ville" value="<?= esc($filters['city']) ?>">
                </div>
                <div class="form-group">
                    <label>Webinaire</label>
                    <select name="webinar_id">
                        <option value="">Tous les webinaires</option>
                        <?php foreach ($webinars as $w): ?>
                            <option value="<?= $w['id'] ?>" <?= $filters['webinar_id'] == $w['id'] ? 'selected' : '' ?>>
                                <?= esc($w['title']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group" style="justify-content: flex-end;">
                    <button type="submit" class="btn btn-primary">Filtrer</button>
                    <a href="/admin/dashboard" class="btn btn-secondary" style="margin-left: 5px;">Reset</a>
                    <a href="/admin/dashboard/export?<?= http_build_query($filters) ?>" class="btn btn-primary"
                        style="margin-left: 20px; background-color: #0f363f;">Exporter CSV</a>
                </div>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Ville</th>
                    <th>Statut</th>
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
                                <?= $p['id'] ?>
                            </td>
                            <td>
                                <?= esc($p['name']) ?>
                            </td>
                            <td>
                                <?= esc($p['email']) ?>
                            </td>
                            <td>
                                <?= esc($p['phone']) ?>
                            </td>
                            <td>
                                <?= esc($p['city']) ?>
                            </td>
                            <td>
                                <span
                                    style="padding: 4px 8px; border-radius: 12px; font-size: 0.8rem; background: <?= $p['status'] == 'confirmed' ? '#d4edda' : ($p['status'] == 'registered' ? '#fff3cd' : '#f8d7da') ?>; color: <?= $p['status'] == 'confirmed' ? '#155724' : ($p['status'] == 'registered' ? '#856404' : '#721c24') ?>;">
                                    <?= ucfirst($p['status']) ?>
                                </span>
                            </td>
                            <td>
                                <?= date('d/m/Y H:i', strtotime($p['created_at'])) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="pagination">
            <?= $pager->links() ?>
        </div>
    </div>
</body>

</html>