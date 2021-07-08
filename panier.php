<html>

<head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />

</head>

<body>
    <?php
    include("panier-redis.php");
    ?>
    <br>
    <br>
    <h1>Panier</h1>
    <table>
        <tr>
            <th>Nom</th>
            <th>Type</th>
            <th>Quantité</th>
            <th>Prix</th>

        </tr>


        <?php
        $i = 1;
        foreach ($list as $value) {
            $attributs = explode('_', $value);
            //var_dump($attributs);
            echo <<<BEGIN
	<form action="panier.php" method="post">
<tr>
	<td>$attributs[0] <input type="text" name="nom" value="$attributs[0]" hidden></td>
		<td>$attributs[1]<input type="text" name="type" value="$attributs[1]" hidden></td>
		<td>$attributs[2]<input type="text" name="qte" value="$attributs[2]" hidden></td>
		<td>$attributs[3]<input type="text" name="prix" value="$attributs[3]" hidden></td>
</tr>
</form>
BEGIN;
            $i++;
        }

        ?>
    </table>







</body>

</html>