# 📒 TP Agenda Symfony

Projet réalisé dans le cadre de ma formation développeur web (septembre 2024 - janvier 2026)

## 📋 Description

Application de gestion de contacts développée avec Symfony, Twig et Doctrine. Ce projet permet de lister des contacts stockés en base de données et d'afficher leurs détails.

## 🛠️ Technologies utilisées

- **PHP** 8.x
- **Symfony** 7
- **Twig** (moteur de templates)
- **Doctrine ORM** (gestion de base de données)
- **MySQL** 8.0
- **Bootstrap** 4.4
- **Composer** (gestionnaire de dépendances)

## ✨ Fonctionnalités

- ✅ Page d'accueil avec liste des contacts dans un tableau
- ✅ Affichage des détails d'un contact (jumbotron Bootstrap)
- ✅ Navigation avec navbar Bootstrap
- ✅ Liens dynamiques avec la fonction Twig `path()`
- ✅ Architecture MVC avec contrôleurs et templates
- ✅ Persistance des données en base MySQL via Doctrine
- ✅ Affichage dynamique des contacts depuis la base de données

## 🚀 Installation

### Prérequis

- PHP 8.x installé
- Composer installé
- MySQL 8.x installé
- Symfony CLI (optionnel mais recommandé)

### Étapes d'installation

1. **Cloner le projet** :
```bash
git clone https://github.com/AnthonyCC-G/TP-Agenda-Symfony.git
cd TP-Agenda-Symfony
```

2. **Installer les dépendances** :
```bash
composer install
```

3. **Configurer la base de données** :

Copier le fichier `.env` en `.env.local` et modifier la ligne `DATABASE_URL` :
```
DATABASE_URL="mysql://utilisateur:motdepasse@127.0.0.1:3306/agenda?serverVersion=8.0.32&charset=utf8mb4"
```

4. **Créer la base de données et exécuter les migrations** :
```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

5. **Lancer le serveur de développement** :

Avec Symfony CLI :
```bash
symfony serve
```

Ou avec PHP natif :
```bash
php -S localhost:8000 -t public/
```

6. **Accéder à l'application** :
- Page d'accueil : http://localhost:8000/home
- Page contact : http://localhost:8000/contact/{id}

## 📁 Structure du projet
```
├── src/
│   ├── Controller/
│   │   └── HomeController.php        # Contrôleur principal avec les routes
│   ├── Entity/
│   │   └── Contact.php               # Entité Contact (modèle de données)
│   └── Repository/
│       └── ContactRepository.php     # Repository pour les requêtes Contact
├── templates/
│   ├── base.html.twig                # Template parent (layout)
│   ├── home/
│   │   └── home.html.twig            # Page d'accueil avec tableau des contacts
│   └── contact.html.twig             # Page détails d'un contact
├── migrations/                        # Fichiers de migration Doctrine
├── public/                            # Point d'entrée de l'application
├── .gitignore                         # Fichiers ignorés par Git
└── composer.json                      # Dépendances du projet
```

## 🎓 Ce que j'ai appris

### Symfony
- Création de contrôleurs avec `AbstractController`
- Définition de routes avec l'attribut `#[Route]`
- Passage de paramètres dans les URLs avec `{id}`
- Méthode `render()` pour afficher des templates
- Injection de dépendances (Repository, EntityManager)

### Doctrine ORM
- Création d'entités avec `make:entity`
- Types de champs : `string`, `integer` et leurs options (length, nullable)
- Génération de migrations avec `make:migration`
- Exécution des migrations avec `doctrine:migrations:migrate`
- Persistance des données avec `persist()` et `flush()`
- Récupération des données avec `findAll()` et ParamConverter

### Twig
- Héritage de templates avec `{% extends %}`
- Création de blocs réutilisables avec `{% block %}`
- Utilisation de `{{ parent() }}` pour conserver le contenu parent
- Génération d'URLs dynamiques avec `{{ path('route', {id: value}) }}`
- Boucles avec `{% for item in collection %}`

### Bootstrap
- Intégration de Bootstrap 4.4 via CDN
- Utilisation de composants : navbar, table, jumbotron, buttons
- Classes utilitaires : `container`, `mt-5`, `btn`, etc.

### Git & GitHub
- Gestion de versions avec Git
- Configuration du `.gitignore` pour Symfony
- Publication du code sur GitHub

## 📝 Exercices réalisés

### TP1 - Exercice 1
- ✅ Création du contrôleur `HomeController`
- ✅ Mise en place de `base.html.twig` avec Bootstrap
- ✅ Création de la navbar
- ✅ Template `home.html.twig` avec tableau des contacts

### TP1 - Exercice 2
- ✅ Template `contact.html.twig` avec jumbotron
- ✅ Route `/contact` fonctionnelle
- ✅ Liens cliquables dans la navbar et le tableau

### TP1 - Exercice 3
- ✅ Configuration de la connexion base de données
- ✅ Création de l'entité `Contact` (id, nom, prenom, telephone, adresse, ville, age)
- ✅ Migration et création de la table en base
- ✅ Persistance de données via EntityManager
- ✅ Affichage dynamique des contacts depuis la base
- ✅ Route paramétrée `/contact/{id}` avec ParamConverter

## 👨‍💻 Auteur

**Anthony CC-G** - Étudiant développeur web en formation

Formation : Septembre 2024 - Janvier 2026

## 📄 Licence

Projet éducatif - Libre d'utilisation pour l'apprentissage

---

⭐ N'hésite pas à mettre une étoile si ce projet t'a aidé dans ton apprentissage!