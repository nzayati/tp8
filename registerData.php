<?php
$link = new Mongo(); // connexion
$db = $link->selectDB("leNomDeVotreBaseDeDonneeMongoDB");
 
$collectionArticles = $db->articles;
$collectionArticles->insert(array(
    'titre' => 'Le titre de mon article',
    'contenu' => 'Lorem ipsum, dolor sit amet...'
));
?>