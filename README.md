# Muzuri Academie

Plateforme web de Muzuri Academie pour promouvoir les webinaires, gerer les inscriptions, envoyer les confirmations et suivre les participants via un espace admin.

## Fonctionnalites
- Page d'accueil avec prochain webinaire
- Formulaire d'inscription
- Email de confirmation (template HTML)
- Tableau de bord admin (filtres, pagination, export CSV)
- Commande CLI pour rappels par email

## Stack technique
- Backend: PHP 8+ / CodeIgniter 4
- Base de donnees: MySQL/MariaDB
- Frontend: HTML/CSS (templates CI4)

## Structure du projet
- `home/`: application CodeIgniter 4 (app, system, writable, tests)
- `htdocs/`: point d'entree web public + assets (`htdocs/index.php`, `htdocs/ressources/`)

## Pre-requis
- PHP 8.x
- MySQL/MariaDB
- Composer
- Serveur web (Apache/Nginx) ou serveur integre CI4

## Installation rapide
1. Configurer l'environnement
2. Dupliquer `home/.env` et ajuster `app.baseURL` et la base de donnees
3. Installer les dependances
4. `composer install` dans `home/`
5. Migrer la base de donnees
6. `php spark migrate` dans `home/`
7. Lancer l'application
8. Servir `htdocs/` comme document root
9. Acceder au site via l'URL configuree

## CI/CD (GitHub Actions + FTP)
Le pipeline de deploiement est defini dans `.github/workflows/deploy.yml`.
Il se declenche sur `push` vers `main` et deploie via FTP:
- `htdocs/` vers la racine du serveur
- `home/` vers `./home/`

Secrets requis:
- `FTP_HOST`, `FTP_USER`, `FTP_PASSWORD`, `FTP_PORT`

Notes de securite:
- `.env` est exclu du deploiement FTP.
- `htdocs/index.php` est aussi exclu (a gerer directement sur le serveur si besoin).

## Commandes utiles
- `php spark migrate`
- `php spark muzuri:reminders`

## Configuration email
- Configurer les parametres SMTP dans `home/app/Config/Email.php` ou via `.env`.

## Notes
- Le tableau de bord admin est accessible via `/admin`.
- Les assets sont servis depuis `htdocs/ressources/`.

---
Concepteur de la solution : Funda
