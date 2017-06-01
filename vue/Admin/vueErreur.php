 <?php

///Titre onglet
$titretab = "Komidi Accueil";
// Menu de la page
ob_start(); 
foreach($adminmenupage as $page_name => $page_url) 
{
	$class = '';
	if ($current_page == $page_url) {
		$class = 'active';
	}
	echo "<li class='$class'>
		<a href='$page_url'>".$adminpage_name ."</a>".
	 "</li>";
}
$menupage = ob_get_clean();

//Contenu de la page
ob_start(); 

?>
   <br><br><br>
   <h3>Une erreur de type : </h3><h2><?= $msgErreur ?></h2> <h3>est survenue</h3>
   <br><br><br>

<?php
//Appel de template

require "vue/Admin/template.php";
 ?>