<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>

<p align="center">
    <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## À propos du projet

Cette application Laravel est une **CVthèque** conçue pour gérer des informations relatives aux métiers, compétences, et professionnels. Elle permet :

- De gérer une base de données des métiers.
- D'associer des compétences à des professionnels.
- De rechercher et d'afficher des profils selon des critères spécifiques.

---

## Fonctionnalités principales

- **Gestion des métiers** : Ajout, modification, suppression et consultation.
- **Gestion des compétences** : Association de compétences aux professionnels.
- **Recherche avancée** : Trouver des professionnels par métier ou compétence.
- **Administration** : Gestion centralisée des données via une interface conviviale.

---

## Technologies utilisées

- **Framework** : Laravel 10+.
- **Base de données** : MySQL.
- **Front-end** : Blade (intégré à Laravel).
- **Authentification** : Gestion des utilisateurs via le système intégré de Laravel.

---

## Installation

### Prérequis

- PHP 8.1+
- Composer
- MySQL
- Node.js (pour le front-end si applicable)

### Étapes

1. Clonez ce dépôt :
    ```bash
    git clone https://github.com/<votre-utilisateur>/<votre-repository>.git
    cd <votre-repository>
    ```

2. Installez les dépendances :
    ```bash
    composer install
    npm install && npm run dev
    ```

3. Configurez l'application en dupliquant le fichier `.env.example` :
    ```bash
    cp .env.example .env
    ```

4. Modifiez les informations de connexion à la base de données dans le fichier `.env` :
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=cvthequeCDA
    DB_USERNAME=<votre-utilisateur>
    DB_PASSWORD=<votre-mot-de-passe>
    ```

5. Générez la clé d'application :
    ```bash
    php artisan key:generate
    ```

6. Exécutez les migrations pour créer les tables :
    ```bash
    php artisan migrate
    ```

7. Lancez le serveur de développement :
    ```bash
    php artisan serve
    ```

L'application sera accessible à l'adresse [https://cvthequecda.bdessis.v70208.campus-centre.fr/](https://cvthequecda.bdessis.v70208.campus-centre.fr/).

---

## Contribuer

Les contributions sont les bienvenues ! Veuillez soumettre une *pull request* ou ouvrir une *issue* pour signaler un bug ou proposer une nouvelle fonctionnalité.

---

## Licence

Ce projet est sous licence [MIT](https://opensource.org/licenses/MIT).
