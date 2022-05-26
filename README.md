# KidsEvents

Webs site url : https://phpstack-778914-2652173.cloudwaysapps.com

# Sommaire : 
1) Présentation du projet 
2) La chart graphique
3) Les fonctions
    - Liste des fonctions
    - Description détaillée de l'ensemble des fonctions
5) Le modèle des données
6) Les contraintes 

# Présentation du projet
Ce projet a pour but de créer une application web pour l’entreprise KidsEvents.
KidsEvents est une entreprise d’organisation d'anniversaire pour les enfants de 3 à 12 ans. L’objectif de cette application est de proposer une solution aux clients de KidsEvents qui leur permet de faire leurs réservations en ligne parmi une liste de thèmes principaux (princesse, pirates, chevalier …) auxquels peuvent être ajoutés des suppléments (ballons, machine a barbe a papa, … ).

# La chart graphique

- Le logo  ![logo_kids_events](https://user-images.githubusercontent.com/78727838/170513580-79a07097-b23f-47e9-bb11-b01ffd0e1f94.png)

La page doit respecter le code couleur du logo est resté dans le même thème.

# Les fonctions - Liste des fonctions
**Pour les parents - partie public** 
- Consulter la liste des thèmes.
- Consulter la liste des suppléments
- Créer un compte pour réserver un anniversaire 
- S’authentifier 

**Pour les parents - partie privée**
- Se déconnecter 
- Réserver un anniversaire avec un thèmes et des suppléments
- Consulter le montant total de l'événement 
- Consulter les archives des anniversaires réservé auparavant

**Les administrateurs**
- S'authentifier 
- Déconnexion
- Consulter les anniversaire réservé 
- Créer, modifier, supprimer un thème
- Créer, modifier, supprimer un supplément 

<img width="996" alt="Capture d’écran 2022-05-26 à 16 57 47" src="https://user-images.githubusercontent.com/78727838/170515147-5b3564ca-1b7f-413d-8cbd-c9cb359a6c47.png">

# Les fonctions - Description détaillée de l’ensemble des fonctions

**Un visiteur ou un administrateur doit pouvoir se connecter pour confirmer son identité et ainsi avoir accès au site selon les droits qui lui sont attribués.**

- Nom cas d'utilisation : Connexion 
- Acteur cas d'utilisation : Utilisateur
- Pré conditions : Aucun
- Post condition : L’utilisateur est authentifié
- Scénario normal : 
  - La page de connexion d’affiche 
  - L’utilisateur saisit des champs et valide 
  - La page d’accueil s’affiche avec les pages accessibles
- Exceptions:
  - L’utilisateur commet une erreur sur la saisie de l’identifiant ou du mot de passe
  - Le système en informe l’utilisateur, retour à l'étape 1


<img width="600" alt="Capture d’écran 2022-05-26 à 14 50 28" src="https://user-images.githubusercontent.com/78727838/170517497-4e567fbd-7946-4444-8f51-746d4a0e0d6a.png">

- Contrôle de saisi : 
  - le mail de l'utilisateur : il doit correspondre au mot de passe renseigné 
  - Le mot de passe : il doit correspondre au mail d’utilisateur renseigné



**Un visiteur doit voir afficher la list des thèmes lorsqu’il est sur la page d’accueil  du site**

- Nom cas d'utilisation : Consultation des thèmes 
- Acteur cas d'utilisation : Utilisateur
- Pré conditions : Aucun
- Post condition : List des thèmes 
- Scénario normal : 
  - L’utilisateur arrive sur la page d’accueil  
  - La liste des thèmes s’affiche 

<img width="1071" alt="Capture d’écran 2022-05-26 à 14 55 55" src="https://user-images.githubusercontent.com/78727838/170518134-6f072dc9-9049-4330-8049-e6eb5badcb8e.png">



**Un visiteur a la possibilité d'afficher la page détail d’un thème**

- Nom cas d'utilisation : Afficher des détails d’un thème
- Acteur cas d'utilisation : Utilisateur
- Pré conditions : Aucun
- Post condition : Les détails du thèmes sont affichés
- Scénario normal : 
  - L’utilisateur passe sa sourie sur le thème voulu  
  - L’utilisateur clique sur le button permettant d’affichage des détails qui se situe au milieu de la photo 
  - Une nouvelle page s’affiche avec le détail du thème choisi

<img width="1131" alt="Capture d’écran 2022-05-26 à 15 01 14" src="https://user-images.githubusercontent.com/78727838/170518973-334c575d-df15-472e-a368-024355d32377.png">



**Un administrateur doit avoir la possibilité d’ajouter un thème. Il faut donc cliquer sur le bouton permettant cette fonction situé dans la barre de navigation. Ensuite il suffit de renseigner les champs nécessaires à la création du thème souhaité : Nom, description, durée, prix, nombre maximum d’enfants, nombre minimum d’enfants, âge minimale des enfants, âge maximum des enfants, importer une image puis valider.**

- Nom cas d'utilisation : Ajouter un thème
- Acteur cas d'utilisation : Administrateur
- Pré conditions : Être authentifié en tant qu’administrateur
- Post condition : Le thème est ajouté
- Scénario normal : 
  - L’administrateur clique sur le bouton d’ajout d’un thème  
  - Alors un formulaire apparaît permettant de saisir les champ nécessaires à la création d’un thème
  - L’administrateur saisit les champs et valide
  - Le système contrôle la validité des champs saisis
  - Retour sur la page détaillée du nouveau thème
- Exceptions : 
  - L’administrateur commet une erreur sur la saisie d’un ou plusieurs champs
  - Le système en informe l’utilisateur, retour à l'étape 3

<img width="1383" alt="Capture d’écran 2022-05-26 à 15 25 51" src="https://user-images.githubusercontent.com/78727838/170519721-ae0c0708-e009-4315-9458-eae9d447d2be.png">



**Un administrateur doit avoir la possibilité de modifier un thème**

- Nom cas d'utilisation : Modifier un thème
- Acteur cas d'utilisation : Administrateur 
- Pré conditions : Être authentifié en tant qu’administrateur
- Post condition : Le thème est modifié
- Scénario normal : 
  - L'administrateur se trouve sur le page de detaille d’un thème
  - L’administrateur clique sur le bouton de modification  
  - L’administrateur peut alors modifier les champs souhaités et valider
  - Le système contrôle la validité des champs modifiés
  - Retour au descriptif du thème 
- Exceptions :
  - L’utilisateur commet une erreur sur la modification d’un ou plusieur champs
  - Le système en infirme d’utilisateur, retour à l'étape 2

<img width="1202" alt="Capture d’écran 2022-05-26 à 15 33 02" src="https://user-images.githubusercontent.com/78727838/170520562-e0949863-e546-4d72-b679-4160aa3fec49.png">



**Un administrateur doit avoir la possibilité de supprimer un thème**

- Nom cas d'utilisation : Supprimer un thème
- Acteur cas d'utilisation : Administrateur 
- Pré conditions : Être authentifié en tant qu’administrateur
- Post condition : Le thème est supprimé
- Scénario normal : 
  - L'administrateur se trouve sur le page de detaille d’un thème 
  - L’administrateur peut alors cliquer sur le bouton de suppression
  - Retour à la page d’accueil

<img width="1202" alt="Capture d’écran 2022-05-26 à 15 35 41" src="https://user-images.githubusercontent.com/78727838/170526005-77f2fa98-7f79-441e-aa9b-cf515c73f3b5.png">


**Un administrateur doit avoir la possibilité d’ajouter un supplement. Il faut donc cliquer sur le bouton permettant cette fonction situé dans la barre de navigation. Ensuite il suffit de renseigner les champs nécessaires à la création du supplement souhaité : Nom, description, prix, importer une image puis valider.**

- Nom cas d'utilisation : Ajouter un supplement
- Acteur cas d'utilisation : Administrateur
- Pré conditions : Être authentifié en tant qu’administrateur
- Post condition : Le supplement est ajouté
- Scénario normal : 
  - L’administrateur clique sur le bouton d’ajout d’un supplement  
  - Alors un formulaire apparaît permettant de saisir les champ nécessaires à la création d’un supplement
  - L’administrateur saisit les champs et valide
  - Le système contrôle la validité des champs saisis
  - Retour à la page d’accueil
- Exceptions : 
  - L’administrateur commet une erreur sur la saisie d’un ou plusieurs champs
  - Le système en informe l’utilisateur, retour à l'étape 3


<img width="679" alt="Capture d’écran 2022-05-26 à 17 59 18" src="https://user-images.githubusercontent.com/78727838/170526808-5f1b3360-1595-420f-b39c-557c7bad8e22.png">



**Un administrateur doit avoir la possibilité de modifier un supplement**

- Nom cas d'utilisation : Modifier un supplement
- Acteur cas d'utilisation : Administrateur 
- Pré conditions : Être authentifié en tant qu’administrateur
- Post condition : Le supplement est modifié
- Scénario normal : 
  - L'administrateur se trouve sur le page de detaille d’un supplement
  - L’administrateur clique sur le bouton de modification  
  - L’administrateur peut alors modifier les champs souhaités et valider
  - Le système contrôle la validité des champs modifiés
  - Retour à la page d’accueil 
- Exceptions :
  - L’utilisateur commet une erreur sur la modification d’un ou plusieur champs
  - Le système en infirme d’utilisateur, retour à l'étape 3


<img width="815" alt="Capture d’écran 2022-05-26 à 18 01 22" src="https://user-images.githubusercontent.com/78727838/170527189-b723d850-f8d3-4e95-86dd-5f28621c5941.png">



**Un administrateur doit avoir la possibilité de supprimer un supplement**

- Nom cas d'utilisation : Supprimer un supplement
- Acteur cas d'utilisation : Administrateur 
- Pré conditions : Être authentifié en tant qu’administrateur
- Post condition : Le supplement est supprimé
- Scénario normal : 
  - L'administrateur se trouve sur le page de detaille d’un supplement 
  - L’administrateur peut alors cliquer sur le bouton de suppression
  - Retour à la page d’accueil

<img width="1799" alt="Capture d’écran 2022-05-26 à 18 00 16" src="https://user-images.githubusercontent.com/78727838/170527054-761e5b8a-c7fe-4186-98a8-ef4239513769.png">



**Un nouvelle utilisateur doit pouvoir créer un compte**

- Nom cas d'utilisation : Créer un compte 
- Acteur cas d'utilisation : Utilisateur 
- Pré conditions : Aucun
- Post condition : Un nouvelle utilisateur est créer
- Scénario normal : 
  - L’utilisateur se rend sur la page de connexion 
  - L’utilisateur clique sur le bouton d'inscription
  - L’utilisateur peut alors remplir les champs
  - Le système contrôle la validité des champs saisis 
  - Retour sur la page de connexion
- Exceptions : 
  - L’administrateur commet une erreur sur la saisie d’un ou plusieurs champs 
  - Le système en informe l’utilisateur, retour à l'étape 3

<img width="775" alt="Capture d’écran 2022-05-26 à 15 42 18" src="https://user-images.githubusercontent.com/78727838/170527657-9cd35a36-326f-4843-b4a7-7ee3b7d9feab.png">



**Un utilisateur doit avoir la possibilité de réserver un anniversaire avec différent supplément et un thème pour une date et un lieu.**

- Nom cas d'utilisation : Réserver un anniversaire
- Acteur cas d'utilisation : Utilisateur authentifié 
- Pré conditions :  Être identifier comme utilisateur
- Post condition : Un anniversaire est réservé
- Scénario normal : 
  - L’utilisateur ajout au panier tous les suppléments qu’il désire
  - L’utilisateur se rend sur son pannier 
  - L’utilisateur remplie de formulaire de réservation 
  - Le système contrôle la validité des champs saisis
  - Redirection vers la page des commandes
- Exceptions : 
  - L’utilisateur commet une erreur sur la saisie d’un ou plusieurs champs
  - Le système en informe l’utilisateur, retour à l'étape 3

<img width="1163" alt="Capture d’écran 2022-05-26 à 15 52 45" src="https://user-images.githubusercontent.com/78727838/170528218-e2f3d293-bc40-4600-9189-c47bfbccb5dd.png">



**Un utilisateur doit avoir la possibilité de consulter la liste de tous ses anniveraire passé**

- Nom cas d'utilisation : Consulter l'historique des anniversaire
- Acteur cas d'utilisation : Utilisateur authentifié 
- Pré conditions :  Être identifier comme utilisateur
- Post condition : Voir la liste des anniversaire réaliser
- Scénario normal : 
  - L’utilisateur clique sur le bouton d’historique dans le barre de navigation
  - Le système redirige l’utilisateur sur la page des historique
  - La liste des anniversaire s’affiche

<img width="1163" alt="Capture d’écran 2022-05-26 à 16 01 02" src="https://user-images.githubusercontent.com/78727838/170528514-8e9d3877-e803-4e6f-806e-033cf5058f12.png">



**Un administrateur doit avoir la possibilité de voire la liste de tous les anniversaire à venir**

- Nom cas d'utilisation : Consulter l'historique des anniversaire
- Acteur cas d'utilisation : Administrateur
- Pré conditions :  Être identifier comme Administrateur
- Post condition : Voir la liste des anniversaire a venir
- Scénario normal : 
  - L’administrateur clique sur le bouton dans la barre de navigation
  - Le système redirige l’administrateur sur le page des réservation future
  - La liste des anniversaire s’affiche

<img width="1163" alt="Capture d’écran 2022-05-26 à 16 08 06" src="https://user-images.githubusercontent.com/78727838/170528854-38bfc95c-a7ee-4247-9106-0084bdc3ede7.png">



**L’utilisateur doit pouvoir se déconnecter s’il le souhaite**

- Nom cas d'utilisation : Déconnexion
- Acteur cas d'utilisation : Utilisateur / Administrateur
- Pré conditions :  Être authentifier
- Post condition : L’utilisateur est déconnecté
- Scénario normal : 
  - L’utilisateur à la possibilité de clique sur un bouton qui permet de se déconnecter dans la barre de navigation
  - Si l’utilisateur choisit de se déconnecter, il clique sur le bouton
  - L’utilisateur est alors déconnecter
  - La page d’accueil est alors présenté

<img width="246" alt="Capture d’écran 2022-05-26 à 16 12 14" src="https://user-images.githubusercontent.com/78727838/170529224-f48b2a85-2cee-4246-b4cf-ae38b1767b13.png">


# Les données - Le modèle des données 

<img width="1541" alt="Capture d’écran 2022-05-26 à 18 14 19" src="https://user-images.githubusercontent.com/78727838/170529428-d21106cc-cc6d-4211-8cc4-d0492f6c24e8.png">

# Les contraintes 

**Fonctionnelles :**

La solution devra être accessible via un navigateur web. On observe deux types d’utilisateur, les parents et les administrateurs. Chaque utilisateur doit être identifié et connecté

**Techniques :**

L’application devra être accessible en ligne par un navigateur. Le choix des outils de réalisation du projet est défini : 
- Serveur web : Apache
- Langage : PHP
- Framework : Symfony 
- BDD : MySQL
