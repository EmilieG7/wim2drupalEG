<?php
session_start();

var_dump($_POST);
var_dump($_SESSION);

$_SESSION['error_message'] = array();
//Sécurité, identification du formulaire
if(!isset($_POST) || !isset($_POST['form_id'])
                  || ($_POST['form_id'] != $_SESSION['form_id'])) {
    $_SESSION['error_message'][] = 'Formulaire non reconnu !';
}
//Validation des données
if( empty($_POST['nom']) ) {
 $_SESSION['error_message'][] = 'Nom manquant !';
}
else {
 $values['nom'] = str_replace(array("\r","\n"),'',$_POST['nom']);
}
if( empty($_POST['prenom']) ) {
 $_SESSION['error_message'][] = 'Prénom manquant !';
}
else{
 $values['prenom'] = str_replace(array("\r","\n"),'',$_POST['prenom']);
}
//Réaffichage du formulaire si erreurs
if( !empty($_SESSION['error_message'] )) {
    //header( 'Location: form1_show.php' ) ;
}
//Enregistrement si tout est OK
else {
 $pdo = new PDO('mysql:host=localhost;dbname=wim2drupalEG', 'root', '');
 $sql = 'INSERT INTO wim2_etudiant (nom, prenom) VALUES (:nom,:prenom)';
 $stmt = $pdo->prepare($sql);
 $nb_insert = $stmt->execute($values);
 //Test erreur d'insertion
 if($nb_insert == 0) {
    $_SESSION['error_message'][] ='Erreur BD';
    //header( 'Location: form1_show.php' );
 }
 //Confirmation de l'insertion
 else {
    $_SESSION['error_message'] = '';
    echo '<html><head><meta charset="utf-8"><title>Confirmation</title>
    </head><body>
    <h2>Données enregistrées</h2><a href="form1_show.php">Retour</a>
    </body></html>';
 }
}
?>