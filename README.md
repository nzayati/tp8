# TP 8 NoSQL GiantMix 


##### Auteurs :
- Zayati Narjess
- Bricha Fatima-Zahra
- Mekedem Sara

## APP overview:
Application web PHP de site marchand/vente en ligne implémentant des technos NoSQL.



- Création de compte --> Système d'inscription utilisant MongoDB, disponible via register.php, cette page permet de créer un compte avec les données {email & password}. ces données sont persistées sur MongoDB -> {Collection: users} et permettent par la suite la connexion. 

- Connexion avec un compte --> page index.php permet de se connecter à son compte avec les données des utilisateurs enregistrés auparavant.

- Catalogue des produits --> Les données concernant les produits {productName, productType, quantity, price}

--> Problèmes rencontrés: configuration de MongoDB avec PHP très complexe, et les extensions installées ne 
permettent pas de faire les échanges de données comme souhaité. Nous avons pris beaucoup de temps et cela nous a retardé sur le projet au point que la fonction de recherche avec elasticSearch d'un produit n'est pas aboutie bien qu'on y ait réfléchi et qu'on connaisse la techno.

- Panier d'Achats sous forme de liste Redis d'articles avec leur type de produits, quantité et prix

## Structure de l'application

#### Partie MongoDB

- index.php : Affichage les informations du user si connecté
- login.php : Front pour se connecter 
- login_action.php : back pour se connecter
- library.php : contient toutes les fonctions pour se connecter et s'inscrire
- register.php :front pour s'inscrire
- register_action.php : back pour s'inscrire
- mongodb.json : contient la bdd de mongodb
- script.js: code JS qui affiche si le mot de passe et sa confirmation se correspondent


#### Partie Redis

- redis-connexion.php: Etablit la connection au serveur redis
- panier.php : itère sur la liste des produits dans le panier 
- panier-redis.php: récupère le panier et définit sa limite d'expiration de 300secondes soit 5min
- /predis : la config poula connexion au serveur redis

#### Partie ElasticSearch
-elasticsearch.txt : contient la structure des produits de la bdd
-recherche.php : affiche le résultat de recherche
