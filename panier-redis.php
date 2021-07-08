<?php
require "redis-connexion.php";
//on recupere tous les elements dans cles pour itérer desses
$cles = $redis->keys("*");
for ($i = 0; $i < count($cles); $i++) {
	if ($cles[$i] == "panier") {
		unset($cles[$i]);
	}
}

$redis->del("panier");
foreach ($cles as $value) {

	//on set le ttl à 60*5 pour chaque element du panier
	$redis->expire($value, 300);
	$redis->rpush("panier", $redis->get($value));
}
$redis->expire("panier", 300);

if (isset($_POST['panier'])) {
	$redis->del($_POST["nom"]);
	$qte = $_POST["qte"] - 1;

	if ($qte > 0) {
		$redis->set($_POST["nom"], $_POST["nom"] .  $_POST["type"] .  $qte .  $_POST["prix"]);
		$redis->del("panier");
		$cles = $redis->keys("*");
		foreach ($cles as $value) {
			$redis->expire($value, 300);
			$redis->rpush("panier", $redis->get($value));
		}
	} else {
		$redis->del("panier");
		$cles = $redis->keys("*");
		foreach ($cles as $value) {
			$redis->expire($value, 300);
			$redis->rpush("panier", $redis->get($value));
		}
	}

	$redis->expire("panier", 300);
}

$list = $redis->lrange("panier", 0, -1);
