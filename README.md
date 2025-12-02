# 📒 TP Agenda Symfony

![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Symfony](https://img.shields.io/badge/Symfony-7-000000?style=for-the-badge&logo=symfony&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Doctrine](https://img.shields.io/badge/Doctrine-ORM-FC6A31?style=for-the-badge&logo=doctrine&logoColor=white)
![Twig](https://img.shields.io/badge/Twig-Templates-339933?style=for-the-badge&logo=symfony&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-4.4-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
![Composer](https://img.shields.io/badge/Composer-Dependency-885630?style=for-the-badge&logo=composer&logoColor=white)

Projet réalisé dans le cadre de ma formation développeur web (septembre 2024 - janvier 2026)

## 📋 Description

Application de gestion de contacts développée avec Symfony, Twig et Doctrine. Ce projet permet de créer, lister, afficher, modifier et supprimer des contacts stockés en base de données avec des formulaires validés, un système d'authentification complet et une catégorisation des contacts.

## 🛠️ Technologies utilisées

- **PHP** 8.x
- **Symfony** 7
- **Twig** (moteur de templates)
- **Doctrine ORM** (gestion de base de données et relations)
- **MySQL** 8.0
- **Bootstrap** 4.4
- **Composer** (gestionnaire de dépendances)
- **Symfony Forms** (génération et validation de formulaires)
- **Symfony Security** (authentification et autorisation)

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
- ✅ **Système d'inscription** avec hashage des mots de passe
- ✅ **Système de connexion/déconnexion** sécurisé
- ✅ **Gestion des permissions** selon l'état de connexion
- ✅ **Protection des fonctionnalités sensibles** (modification, suppression)
- ✅ **Catégorisation des contacts** (famille, amis, travail)
- ✅ **Relations entre entités** (ManyToOne Contact → Category)
- ✅ **Affichage des catégories** dans le tableau de contacts
- ✅ **Sélection de catégorie** dans les formulaires d'ajout/modification

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
- S'inscrire : http://localhost:8000/register
- Se connecter : http://localhost:8000/login

## 📁 Structure du projet
```
├── src/
│   ├── Controller/
│   │   ├── HomeController.php            # Contrôleur principal (liste, affichage, modification, suppression)
│   │   ├── ContactController.php         # Contrôleur des formulaires (ajout, modification)
│   │   ├── RegistrationController.php    # Contrôleur d'inscription
│   │   └── SecurityController.php        # Contrôleur de connexion/déconnexion
│   ├── Entity/
│   │   ├── Contact.php                   # Entité Contact avec contraintes de validation
│   │   ├── Category.php                  # Entité Category pour catégoriser les contacts
│   │   └── User.php                      # Entité User pour l'authentification
│   ├── Form/
│   │   ├── ContactType.php               # Classe de formulaire Contact avec sélection de catégorie
│   │   └── RegistrationFormType.php      # Classe de formulaire d'inscription
│   └── Repository/
│       ├── ContactRepository.php         # Repository pour les requêtes Contact
│       ├── CategoryRepository.php        # Repository pour les requêtes Category
│       └── UserRepository.php            # Repository pour les requêtes User
├── templates/
│   ├── base.html.twig                    # Template parent (layout) avec navbar dynamique
│   ├── home/
│   │   └── home.html.twig                # Page d'accueil avec tableau et permissions
│   ├── contact/
│   │   ├── ajouter.html.twig             # Formulaire d'ajout de contact
│   │   └── modifier.html.twig            # Formulaire de modification de contact
│   ├── registration/
│   │   └── register.html.twig            # Formulaire d'inscription
│   ├── security/
│   │   └── login.html.twig               # Formulaire de connexion
│   └── contact.html.twig                 # Page détails d'un contact
├── config/
│   └── packages/
│       └── security.yaml                 # Configuration du système de sécurité
├── migrations/                            # Fichiers de migration Doctrine
├── public/                                # Point d'entrée de l'application
├── .gitignore                             # Fichiers ignorés par Git
└── composer.json                          # Dépendances du projet
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

### Symfony Security
- Commande `make:user` pour créer l'entité User
- Commande `make:registration-form` pour générer le système d'inscription
- Commande `make:security:form-login` pour générer le système de connexion
- Configuration du fichier `security.yaml` :
  - Définition des **password hashers** pour le cryptage
  - Configuration des **providers** (fournisseurs d'utilisateurs)
  - Configuration des **firewalls** (pare-feu de sécurité)
  - Définition des **access_control** (contrôle d'accès)
- Redirections après connexion/déconnexion avec `default_target_path` et `target`
- Protection CSRF avec `enable_csrf: true`
- Variable Twig `app.user` pour détecter l'utilisateur connecté
- `app.user.userIdentifier` pour récupérer l'email de l'utilisateur

### Symfony Forms
- Génération de classes de formulaire avec `make:form`
- Création de formulaires avec `createForm()`
- Liaison formulaire-entité automatique
- Traitement des soumissions avec `handleRequest()`
- Validation avec `isSubmitted()` et `isValid()`
- Affichage dans Twig avec `form_start()`, `form_widget()`, `form_end()`
- Désactivation de Turbo avec `data-turbo="false"` pour éviter les conflits
- **EntityType** : type de champ pour afficher des entités en liste déroulante
- Option `class` : spécifier quelle entité afficher
- Option `choice_label` : définir quelle propriété afficher dans le dropdown
- Option `placeholder` : texte par défaut dans le menu déroulant
- Option `required` : rendre le champ obligatoire ou optionnel

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

### Relations Doctrine
- **Les 3 types de relations** : OneToOne (1:1), OneToMany/ManyToOne (1:N), ManyToMany (N:N)
- Création d'une **relation ManyToOne** (côté "plusieurs")
- Création d'une **relation OneToMany** (côté "un")
- Relations **bidirectionnelles** : navigation dans les deux sens
- Relations **unidirectionnelles** : navigation dans un seul sens
- **Clé étrangère** : stockée du côté "Many" (ex: `category_id` dans `contact`)
- Annotation `#[ORM\ManyToOne]` pour définir une relation
- Annotation `#[ORM\OneToMany]` pour l'inverse de la relation
- Propriété `targetEntity` pour spécifier l'entité cible
- Propriété `mappedBy` pour indiquer le côté propriétaire de la relation
- **Cascade operations** : gestion des suppressions/mises à jour en cascade
- **Collection** Doctrine pour gérer les ensembles d'entités liées

### Twig
- Héritage de templates avec `{% extends %}`
- Création de blocs réutilisables avec `{% block %}`
- Utilisation de `{{ parent() }}` pour conserver le contenu parent
- Génération d'URLs dynamiques avec `{{ path('route', {id: value}) }}`
- Boucles avec `{% for item in collection %}`
- **Conditions** avec `{% if %}...{% endif %}`
- **Affichage conditionnel** selon l'état de connexion avec `{% if app.user %}`
- **Affichage des messages flash** avec `app.flashes('success')`
- **Génération automatique de formulaires** avec les helpers Twig
- **Importance d'adapter les blocs** générés automatiquement par Symfony
- **Opérateur ternaire** : `{{ condition ? valeur_si_vrai : valeur_si_faux }}`
- **Navigation dans les relations** : `{{ contact.category.title }}`
- **Gestion des valeurs nulles** : vérifier l'existence avant d'accéder aux propriétés

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

### TP1 - Exercice 6 : Sécurité et Authentification
- ✅ **Partie 1** : Système d'inscription
  - Création de l'entité `User` avec `make:user`
  - Génération du formulaire d'inscription avec `make:registration-form`
  - Hashage automatique des mots de passe avec `password_hashers`
  - Template `register.html.twig` avec formulaire d'inscription
  - Validation de l'email (unique en base)
  - Lien "S'inscrire" dans la navbar
  - Migration et création de la table `user`
  
- ✅ **Partie 2** : Système de connexion/déconnexion
  - Génération du système de connexion avec `make:security:form-login`
  - Création du `SecurityController` avec routes `/login` et `/logout`
  - Template `login.html.twig` avec formulaire de connexion
  - Configuration de `security.yaml` pour l'authentification
  - Redirections après connexion/déconnexion vers la page d'accueil
  - Protection CSRF activée
  - Lien "Se connecter" dans la navbar
  
- ✅ **Partie 3** : Gestion des permissions
  - Affichage conditionnel du menu selon l'état de connexion :
    - Utilisateur **non connecté** : liens "S'inscrire" et "Se connecter" visibles
    - Utilisateur **connecté** : lien "Ajouter un contact" visible + message de connexion
  - Protection des fonctionnalités sensibles :
    - Boutons "Modifier" et "Supprimer" visibles uniquement pour les utilisateurs connectés
    - Bouton "Afficher" visible pour tout le monde
  - Message "Vous êtes connecté en tant que [email]" avec lien de déconnexion
  - Utilisation de `{% if app.user %}` dans les templates Twig

### TP1 - Exercice 7 : Relations entre entités
- ✅ **Partie 1** : Création de l'entité Category et relation avec Contact
  - Création de l'entité `Category` (id, title)
  - Génération des 3 catégories : famille, amis, travail
  - Création de la relation **ManyToOne** du côté Contact
  - Création de la relation **OneToMany** du côté Category (bidirectionnelle)
  - Migration pour ajouter la table `category` et la colonne `category_id` dans `contact`
  - Compréhension des **clés étrangères** et de leur stockage
  
- ✅ **Partie 2** : Affichage et gestion des catégories dans l'interface
  - Ajout d'une colonne "Catégorie" dans le tableau de la page d'accueil
  - Affichage du titre de la catégorie pour chaque contact
  - Gestion des contacts sans catégorie avec l'opérateur ternaire Twig
  - Ajout du champ **EntityType** dans `ContactType` pour la sélection de catégorie
  - Configuration du dropdown avec `choice_label` et `placeholder`
  - Test complet : ajout, modification, et assignation de catégories

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

### Sécurité Symfony
- **Hashage des mots de passe** : jamais stocker de mots de passe en clair
- **Password hasher** : algorithme automatique et sécurisé (bcrypt/argon2)
- **CSRF Protection** : tokens de sécurité pour empêcher les attaques
- **app.user** : variable Twig magique pour accéder à l'utilisateur connecté
- **Affichage conditionnel** : utiliser `{% if app.user %}` pour les permissions
- **Firewall** : système de protection des routes dans Symfony

### Relations entre entités
- **Identifier le type de relation** : se poser 2 questions (combien de A pour un B ? combien de B pour un A ?)
- **Côté propriétaire** : toujours du côté "Many" dans une relation OneToMany/ManyToOne
- **Clé étrangère** : stockée dans la table du côté "Many"
- **Relation bidirectionnelle** : permet la navigation dans les deux sens mais nécessite plus de configuration
- **Approche méthodique** : créer d'abord l'entité simple, puis ajouter la relation (meilleure compréhension)
- **EntityType dans les formulaires** : pour créer des dropdowns liés à des entités
- **Opérateur ternaire en Twig** : pour gérer les valeurs nulles élégamment

### Comparaison avec d'autres outils
- Les relations en Doctrine sont similaires à celles dans **PowerBI** ou d'autres outils de modélisation
- Même concept de **cardinalité** (1:1, 1:N, N:N)
- Différence : en Symfony, on choisit explicitement si la relation est bidirectionnelle
- Les **tables intermédiaires** (pour ManyToMany) peuvent être personnalisées en Symfony

### Bonnes pratiques apprises
- Toujours **adapter les blocs Twig** générés par les commandes Symfony
- **Vider le cache** après modification de `security.yaml` : `php bin/console cache:clear`
- Utiliser `make:security:form-login` (pas `make:auth` qui est déprécié)
- Rediriger l'utilisateur après connexion ET déconnexion pour une meilleure UX
- **Commenter plutôt que supprimer** le code qui pourrait servir de référence
- **Tester systématiquement** toutes les fonctionnalités après implémentation
- **Approche méthodique** : comprendre chaque étape plutôt que chercher la rapidité

## 👨‍💻 Auteur

**Anthony CC-G** - Étudiant développeur web en formation

Formation : Septembre 2024 - Janvier 2026

## 📄 Licence

Projet éducatif - Libre d'utilisation pour l'apprentissage

---

⭐ 