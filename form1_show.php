<?php
session_start();
$_SESSION['form_id'] = uniqid();
?><html><head><meta charset="utf-8"><title>Form1</title></head>
<body><?php
if( !empty($_SESSION['error_message'] )) {
 echo '<h2>' . implode('<br>',$_SESSION['error_message'] ) . '</h2>';
}
?><form method="post" action="form2_submit.php">
 <p>
   <label for="nom">Nom : </label>
   <input type="text" name="nom" id="nom">
 </p><p>
   <label for="prenom">Prénom : </label>
   <input type="text" name="prenom" id="prenom">

   <input type="hidden" name="form_id"
   		value="<?php print $_SESSION['form_id'];?>">

   	<p>
   		<label for="Genre">Genre : </label>
   		<input type="radio" name="Genre" value="femme"> femme
   		<input type="radio" name="Genre" value="homme"> homme
   	</p>

   	<select name="Annee">
   		<option value="">Choisir une année</option>
   		<option value="1997">1997</option>
   		<option value="1998">1998</option>
   		<option value="1999">1999</option>
   		<option value="2000">2000</option>
   		<option value="2001">2001</option>
   		<option value="2002">2002</option>
   	</select>
 </p><p style="text-align: center">
 <input type="submit" value="Valider">
 </p>
</form>
</body></html>
