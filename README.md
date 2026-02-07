# Muzuri Académie

Plateforme web de Muzuri Académie pour la promotion des webinaires, l’inscription des participants et un espace admin de suivi.

## Fonctionnalités
- Page d’accueil avec prochain webinaire
- Formulaire d’inscription au webinaire
- Email de confirmation (template HTML)
- Tableau de bord admin avec filtres, pagination et export CSV
- Commande CLI pour rappels par email

## Stack technique
- Backend: PHP 8+ / CodeIgniter 4
- Base de données: MySQL/MariaDB
- Frontend: HTML/CSS (templates CI4)

## Structure du projet
- `home/`: application CodeIgniter 4 (app, system, writable, tests)
- `htdocs/`: point d’entrée web public + assets (`htdocs/index.php`, `htdocs/ressources/`)

## Pré-requis
- PHP 8.x
- MySQL/MariaDB
- Composer
- Serveur web (Apache/Nginx) ou serveur intégré CI4

## Installation rapide
1. Configurer l’environnement
   - Dupliquer `home/.env` et ajuster `app.baseURL` et la base de données
2. Installer les dépendances
   - `composer install` dans `home/`
3. Migrer la base de données
   - `php spark migrate` dans `home/`
4. Lancer l’application
   - Servir `htdocs/` comme document root
   - Accéder au site via l’URL configurée

## Commandes utiles
- `php spark migrate`
- `php spark muzuri:reminders`

## Configuration email
- Configurer les paramètres SMTP dans `home/app/Config/Email.php` ou via `.env`.

## Notes
- Le tableau de bord admin est accessible via `/admin`.
- Les assets sont servis depuis `htdocs/ressources/`.

---
Concepteur de la solution : Funda