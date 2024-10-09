### TP Framework Laravel

## Description du projet 
Ce projet a été réalisé dans un contexte scolaire, avec pour objectif de découvrir un framework php, ici Laravel.
Le projet consiste en un CMS, site sur lequel on peut créer des sites internet. Les utilisateurs peuvent choisir entre différents formats de page, différentes couleurs et différentes polices d'écritures.

## Technologie 
- **Laravel** - Framework PHP pour le backend
- **MySQL** - Base de données relationnelle
- **Tailwind CSS** - Framework CSS pour le frontend
- **Blade** - Moteur de templates de Laravel
- **Composer** - Gestionnaire de dépendances PHP
 - **npm** - Gestionnaire de packages Node.js

## Prérequis
**Avant de commencer, assurez-vous d'avoir installé** :
- **PHP** >= 8.1
- **Composer**
- **MySQL**
- **Node.js** et **NPM**
- **Laravel Installer** (optionnel mais recommandé)

## Installation
- Installez les dépendances PHP via Composer : ``` composer install ```
- Installez les dépendances JavaScript via npm : ``` npm install ```
- Générez une nouvelle clé d'application Laravel : ``` php artisan key:generate ```
- Configurez la base de données dans le fichier .env, puis exécutez les migrations : ``` php artisan migrate ```
- Compilez les assets du front-end : ``` npm run dev ```
- Lancez le serveur de développement : ``` php artisan serve ```

### **Serveur**
- Instancier un fichier ```.env``` à la racine contenant les attributs suivants : 
   - DB_CONNECTION : 
   - DB_HOST : 
   - DB_PORT : 
   - DB_DATABASE : 
   - DB_USERNAME : 
   - DB_PASSWORD :
  
### **Base de données**
- Créer une base de données MySQL puis importer le fichier ```create_cms.sql``` pour obtenir uniquement la structure des tables.

## Auteur
- Marie Eveillé
- Anthony Colin
