# 📒 TP Agenda Symfony

Projet réalisé dans le cadre de ma formation développeur web (septembre 2024 - janvier 2025)

## 📋 Description

Application de gestion de contacts développée avec Symfony et Twig. Ce projet permet de lister des contacts et d'afficher leurs détails.

## 🛠️ Technologies utilisées

- **PHP** 8.x
- **Symfony** 7
- **Twig** (moteur de templates)
- **Bootstrap** 4.4
- **Composer** (gestionnaire de dépendances)

## ✨ Fonctionnalités

- ✅ Page d'accueil avec liste des contacts dans un tableau
- ✅ Affichage des détails d'un contact (jumbotron Bootstrap)
- ✅ Navigation avec navbar Bootstrap
- ✅ Liens dynamiques avec la fonction Twig `path()`
- ✅ Architecture MVC avec contrôleurs et templates

## 🚀 Installation

### Prérequis

- PHP 8.x installé
- Composer installé
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

3. **Lancer le serveur de développement** :

Avec Symfony CLI :
```bash
symfony serve
```

Ou avec PHP natif :
```bash
php -S localhost:8000 -t public/
```

4. **Accéder à l'application** :
- Page d'accueil : http://localhost:8000/home
- Page contact : http://localhost:8000/contact

## 📁 Structure du projet

```
├── src/
│   └── Controller/
│       └── HomeController.php    # Contrôleur principal avec les routes
├── templates/
│   ├── base.html.twig            # Template parent (layout)
│   ├── home/
│   │   └── home.html.twig        # Page d'accueil avec tableau des contacts
│   └── contact.html.twig         # Page détails d'un contact
├── public/                        # Point d'entrée de l'application
├── .gitignore                     # Fichiers ignorés par Git
└── composer.json                  # Dépendances du projet
```

## 🎓 Ce que j'ai appris

### Symfony
- Création de contrôleurs avec `AbstractController`
- Définition de routes avec l'attribut `#[Route]`
- Méthode `render()` pour afficher des templates

### Twig
- Héritage de templates avec `{% extends %}`
- Création de blocs réutilisables avec `{% block %}`
- Utilisation de `{{ parent() }}` pour conserver le contenu parent
- Génération d'URLs dynamiques avec `{{ path() }}`

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

## 👨‍💻 Auteur

**Anthony CC-G** - Étudiant développeur web en formation

Formation : Septembre 2024 - Janvier 2026

## 📄 Licence

Projet éducatif - Libre d'utilisation pour l'apprentissage

---

⭐ N'hésite pas à mettre une étoile si ce projet t'a aidé dans ton apprentissage !