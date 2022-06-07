# BileMo
Projet OpenClassrooms n°7 : Créez un web service exposant une API

## Présentation du projet
BileMo est une entreprise offrant toute une sélection de téléphones mobiles haut de gamme.
Il s'agit de créer une API BtoB comportant les fonctionalités suivantes :
- consulter la liste des produits BileMo ;
- consulter les détails d’un produit BileMo ;
- consulter la liste des utilisateurs inscrits liés à un client sur le site web ;
- consulter le détail d’un utilisateur inscrit lié à un client ;
- ajouter un nouvel utilisateur lié à un client ;
- supprimer un utilisateur ajouté par un client.


## Installation
Clônez le repisoty GitHub et migrez la base de données incluse dans le livrabe sur un serveur ≥ PHP 8 (identifiants à modifier dans le fichier `.env`).

## Authentification

### Headers
Content-Type: application/json

### Body
{"email": "`EMAIL_CLIENT`", "password": "`MDP_CLIENT`"}

PS : Remplacez les variables `EMAIL_CLIENT` et `MDP_CLIENT` par les identifiants correspondant.

### Identifiants :
- aix-en-provence@fnac.tm.fr : p2g5AE8q
- lille@darty.com : X56g6Vfd
- bordeaux@orange.fr : y3JQ37tm
- reims@virgin.fr : J3a3fTv2