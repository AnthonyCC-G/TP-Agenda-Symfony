# 📒 TP Agenda Symfony

Projet réalisé dans le cadre de ma formation développeur web (septembre 2024 - janvier 2026)

## 📋 Description

Application de gestion de contacts développée avec Symfony, Twig et Doctrine. Ce projet permet de créer, lister, afficher, modifier et supprimer des contacts stockés en base de données avec des formulaires validés.

## 🛠️ Technologies utilisées

- **PHP** 8.x
- **Symfony** 7
- **Twig** (moteur de templates)
- **Doctrine ORM** (gestion de base de données)
- **MySQL** 8.0
- **Bootstrap** 4.4
- **Composer** (gestionnaire de dépendances)
- **Symfony Forms** (génération et validation de formulaires)

## ✨ Fonctionnalités

- ✅ Page d'accueil avec liste des contacts dans un tableau
- ✅ Affichage des détails d'un contact (jumbotron Bootstrap)
- ✅ Navigation avec navbar Bootstrap
- ✅ Liens dynamiques avec la fonction Twig `path()`
- ✅ Architecture MVC avec contrôleurs et templates
- ✅ Persistance des données en base MySQL via Doctrine
- ✅ Affichage dynamique des contacts depuis la base de données
- ✅ Modification du numéro de téléphone d'un contact
- ✅ Suppression d'un contact
- ✅ Filtrage des contacts (affichage uniquement des majeurs +18 ans)
- ✅ **Formulaire d'ajout de contact** avec validation complète
- ✅ **Formulaire de modification de contact** avec validation complète
- ✅ **Messages flash** de confirmation (succès)
- ✅ **Validation des données** avec contraintes personnalisées

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
- Ajouter un contact : http://localhost:8000/contact/ajouter
- Modifier un contact : http://localhost:8000/contact/modifier/{id}
- Supprimer un contact : http://localhost:8000/supprimer/{id}

## 📁 Structure du projet
```
├── src/
│   ├── Controller/
│   │   ├── HomeController.php        # Contrôleur principal (liste, affichage, modification, suppression)
│   │   └── ContactController.php     # Contrôleur des formulaires (ajout, modification)
│   ├── Entity/
│   │   └── Contact.php               # Entité Contact avec contraintes de validation
│   ├── Form/
│   │   └── ContactType.php           # Classe de formulaire générée
│   └── Repository/
│       └── ContactRepository.php     # Repository pour les requêtes Contact
├── templates/
│   ├── base.html.twig                # Template parent (layout)
│   ├── home/
│   │   └── home.html.twig            # Page d'accueil avec tableau et messages flash
│   ├── contact/
│   │   ├── ajouter.html.twig         # Formulaire d'ajout de contact
│   │   └── modifier.html.twig        # Formulaire de modification de contact
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
- Injection de dépendances (Repository, EntityManager, Request)
- Redirection avec `redirectToRoute()`
- **Messages flash** avec `addFlash()` pour le feedback utilisateur
- **ParamConverter** pour récupérer automatiquement des entités depuis l'URL

### Symfony Forms
- Génération de classes de formulaire avec `make:form`
- Création de formulaires avec `createForm()`
- Liaison formulaire-entité automatique
- Traitement des soumissions avec `handleRequest()`
- Validation avec `isSubmitted()` et `isValid()`
- Affichage dans Twig avec `form_start()`, `form_widget()`, `form_end()`
- Désactivation de Turbo avec `data-turbo="false"` pour éviter les conflits

### Validation des données
- Utilisation du composant **Validator** de Symfony
- Contraintes de validation avec les attributs `#[Assert\...]`
- `Assert\Length` : validation de longueur minimale/maximale
- `Assert\NotBlank` : champ obligatoire non vide
- `Assert\GreaterThanOrEqual` et `Assert\LessThan` : validation de valeurs numériques
- Messages d'erreur personnalisés
- Affichage automatique des erreurs dans les formulaires

### Doctrine ORM
- Création d'entités avec `make:entity`
- Types de champs : `string`, `integer` et leurs options (length, nullable)
- Génération de migrations avec `make:migration`
- Exécution des migrations avec `doctrine:migrations:migrate`
- **Opérations CRUD complètes** :
  - **Create** : `persist()` et `flush()` pour créer
  - **Read** : `findAll()` et ParamConverter pour lire
  - **Update** : modification des propriétés puis `flush()` pour mettre à jour (pas besoin de `persist()` !)
  - **Delete** : `remove()` et `flush()` pour supprimer
- Création de méthodes personnalisées dans les Repositories
- Utilisation du **QueryBuilder** pour des requêtes complexes
- Filtrage avec `andWhere()` et `setParameter()`

### Twig
- Héritage de templates avec `{% extends %}`
- Création de blocs réutilisables avec `{% block %}`
- Utilisation de `{{ parent() }}` pour conserver le contenu parent
- Génération d'URLs dynamiques avec `{{ path('route', {id: value}) }}`
- Boucles avec `{% for item in collection %}`
- **Affichage des messages flash** avec `app.flashes('success')`
- **Génération automatique de formulaires** avec les helpers Twig

### Bootstrap
- Intégration de Bootstrap 4.4 via CDN
- Utilisation de composants : navbar, table, jumbotron, buttons, alerts
- Classes utilitaires : `container`, `mt-5`, `btn`, etc.
- Classes de couleurs pour les boutons : `btn-info`, `btn-warning`, `btn-danger`, `btn-primary`
- **Classe `alert-success`** pour les messages de confirmation

### Git & GitHub
- Gestion de versions avec Git
- Configuration du `.gitignore` pour Symfony
- Publication du code sur GitHub

## 📝 Exercices réalisés

### TP1 - Exercice 1 : Twig (Templates)
- ✅ Création du contrôleur `HomeController`
- ✅ Mise en place de `base.html.twig` avec Bootstrap
- ✅ Création de la navbar
- ✅ Template `home.html.twig` avec tableau des contacts

### TP1 - Exercice 2 : Twig (Routing)
- ✅ Template `contact.html.twig` avec jumbotron
- ✅ Route `/contact/{id}` fonctionnelle
- ✅ Liens cliquables dans la navbar et le tableau

### TP1 - Exercice 3 : Doctrine (Lecture)
- ✅ Configuration de la connexion base de données
- ✅ Création de l'entité `Contact` (id, nom, prenom, telephone, adresse, ville, age)
- ✅ Migration et création de la table en base
- ✅ Persistance de données via EntityManager
- ✅ Affichage dynamique des contacts depuis la base
- ✅ Route paramétrée `/contact/{id}` avec ParamConverter

### TP1 - Exercice 4 : Doctrine (Modification, Suppression, Filtrage)
- ✅ **Partie 1** : Bouton "Modifier" qui change le téléphone en "New number!"
- ✅ **Partie 2** : Bouton "Supprimer" qui supprime un contact de la base
- ✅ **Partie 3** : Filtre affichant uniquement les contacts de plus de 18 ans
- ✅ Méthode personnalisée `findAdults()` dans le Repository
- ✅ Utilisation du QueryBuilder pour filtrer les données

### TP1 - Exercice 5 : Formulaires avec validation
- ✅ **Partie 1** : Formulaire d'ajout de contact
  - Génération de la classe `ContactType` avec `make:form`
  - Création du contrôleur `ContactController`
  - Template `ajouter.html.twig` avec formulaire complet
  - Lien "Ajouter un contact" dans la navbar
  - **Validation complète** :
    - Nom et prénom : minimum 2 lettres
    - Téléphone : champ obligatoire non vide
    - Âge : entre 15 et 120 ans
  - Messages d'erreur personnalisés
  - Redirection avec message flash de succès
  - Gestion du problème **Turbo** avec `data-turbo="false"`
  
- ✅ **Partie 2** : Formulaire de modification de contact
  - Route `/contact/modifier/{id}`
  - Template `modifier.html.twig`
  - Pré-remplissage automatique des champs avec les données existantes
  - Même validation que pour l'ajout
  - Utilisation de `flush()` sans `persist()` (objet déjà géré par Doctrine)
  - Message flash "Contact modifié avec succès"

## 💡 Points clés techniques appris

### Différence persist() vs flush()
- **Pour un nouvel objet** : `persist()` + `flush()` 
- **Pour un objet existant** : uniquement `flush()` (Doctrine track déjà l'objet)

### Messages Flash
- Stockage temporaire en session
- Affichage une seule fois puis suppression automatique
- Types courants : success, danger, warning, info

### Problème Turbo
- Turbo intercepte les soumissions de formulaire
- Erreur : "Form responses must redirect to another location"
- Solution : `data-turbo="false"` sur les formulaires

### Validation Symfony
- Les contraintes se placent dans l'**entité** (pas dans le formulaire)
- Principe : les règles concernent les **données**, pas l'interface
- Validation automatique lors de `isValid()`

## 👨‍💻 Auteur

**Anthony CC-G** - Étudiant développeur web en formation

Formation : Septembre 2024 - Janvier 2026

## 📄 Licence

Projet éducatif - Libre d'utilisation pour l'apprentissage

---

⭐ N'hésite pas à mettre une étoile si ce projet t'a aidé dans ton apprentissage!