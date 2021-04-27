<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire PHP</title>
</head>

<body> 
<?php
// ON REGARDE SI LE FORMULAIRE EST VALIDÉ
if (isset($_POST['Envoyer'])) {
    // isset permet de savoir si ma variable est définie
    // On va déclarer notre Rayon et notre Total
    $rayon = (int)$_POST['rayon'];
    $total = (int)$_POST['total'];
    
    // On définit le port dès le départ c'est pas trop mal ;)
    $port = 50;
    // Si Rayon < 20 ET Total > 800
    if ($rayon <= 20 && $total >= 800) {
        // Alors => PORT à 0€
        $port = 0;
        // Sinon 	
        // Si (Rayon >20 ET Total > 800) OU (Rayon<20 ET Total<800)  
    } else if (($rayon >= 20 && $total >= 800) || ($rayon <= 20 && $total <= 800)) {
        // Alors => PORT à 30€
        $port = 30;
    }
    // On calcul le côut final
    $calcul = $total + $port;
    $calcul_tva = ($calcul/100)*20;
    echo "<h1>Merci pour votre commande !</h1>";
    echo "<p>Les frais de port sont à $port &euro;</p>";
    echo "<p>Cher(e) ".htmlspecialchars($_POST['prenom'])." ".htmlspecialchars($_POST['nom'])." vous restez nous devoir la somme de $calcul &euro;</p>";
    echo "<p>N'oublions pas la TVA de 20% soit :".$calcul_tva."&euro;</p>";
    // var_dump($_POST);

// SINON MON FORMULAIRE N'EST PAS VALIDÉ DONC JE L'AFFICHE
} else {
?>
<h1>Veuillez renseigner les informations pour votre commande...</h1>
<form action="index.php" method="POST">
        <p>
            <label for="nom">Nom :
                <input placeholder="Votre nom" type="text" name="nom" id="nom" required>
            </label>
        </p>
        <p>
            <label for="prenom">Prénom :
                <input placeholder="Votre prénom" type="text" name="prenom" id="prenom" required>
            </label>
        </p>
        <p>
            <label for="email">Email :
                <input placeholder="Votre email" type="email" name="email" id="email" required>
            </label>
        </p>
        
        <p>
            <label for="rayon">Rayon :
                <input placeholder="Votre rayon" type="text" name="rayon" id="rayon" required>
            </label>
        </p>
        <p>
            <label for="total">Total :
                <input placeholder="Votre total" type="text" name="total" id="total" required>
            </label>
        </p>
        <p>
            <!-- <input type="submit" name="Envoyer"> -->
            <button type="submit" name="Envoyer">Envoyer</button>
        </p>
    </form>
<?php
} // FIN DE L'AFFICHAGE DU FORMULAIRE
?>
</body>
</html>