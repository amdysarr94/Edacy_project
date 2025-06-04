#  Profinder

Profinder est une application web développée avec Laravel 10 qui sert d'annuaire interactif. Elle permet aux entreprises de publier leurs coordonnées et informations de contact pour être facilement trouvées par de potentiels clients.

---

## Fonctionnalités

- Ajout, modification et suppression de contacts d'entreprise
- Affichage des informations sous forme de liste filtrable
- Responsive design (mobile-friendly)
- Interface claire et intuitive
- Modification des informations de compte, modification de mot de passe de compte, suppression du compte

---

## Technologies

- Laravel 10
- PHP 8.x
- Blade 
- Bootstrap 5
- MySQL
- Javascript

---

## Installation

### Prérequis

- PHP >= 8.1
- Composer
- MySQL
- Git

### Étapes

1. Cloner le dépôt Git :

```bash
git clone https://github.com/amdysarr94/Edacy_project.git
```
2. Aller dans le dossier du projet :
```bash
cd .\Edacy_project\
```
3. Installer les dépendances du projet :
```bash
composer install
```
4. Copier le fichier .env.example et nommer le .env :
```bash
cp .env.example .env
```
5. Configure de la base de données dans .env (DB_DATABASE [nom_base_donnee], DB_USERNAME [ex: root], DB_PASSWORD [mot_de_passe: ne rien mettre sur Xampp])

6. Généré la clé d'application : 
```bash
php artisan key:generate
```
7. Exécuté les migrations et les seeders : 
```bash
php artisan migrate --seed
```
8. Lancer le serveur : 
```bash
php artisan serve
```
