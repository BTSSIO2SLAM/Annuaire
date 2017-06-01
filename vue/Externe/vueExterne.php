<?php

//Contenu de la Service
ob_start(); 

if(isset($msg))
{
    echo $msg;
}

?>

<div class="row">
    <div class="col-md-8 col-sm-offset-2">
    <hr>
        <form method="POST" action='index2.php?action=Rechercher'>
            <div class="input-group" id="adv-search">   
                <input align=center type="text" name='find' class="form-control" placeholder="Rechercher un organisme..." required autofocus/>
                 <div class="input-group-btn">
                    <button type="sumbit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                </div>
            </div>
        </form>  
        <hr>
    </div>  
</div>

            
<div class="container">
<div class="row">
<div class="col-md-4"> 
<div class="well" style="-moz-border-radius:20px; -webkit-border-radius:20px; border-radius:20px;">        
<center><label class="labele"> Ecoles </label></center>
<ul class="navigation">
  <hr>
  <?php foreach ($ecoles as $ecole) {
      echo '<li><a href="index2.php?action=Rechercher&ecole='.$ecole["ID_cat_ecole"].'">'.$ecole["Nom_cat_ecole"]."</a></li>"; } ?>
</ul>
</div>
</div>

<div class="col-md-4"> 
<div style="-moz-border-radius:20px; -webkit-border-radius:20px; border-radius:20px;" class="well">        
<center><label class="labele"> Batiments Administratifs </label></center>
<ul class="navigation">
  <hr>
  <?php foreach ($batiments as $batiment) {
      echo '<li><a href="index2.php?action=Rechercher&batiment='.$batiment["ID_cat_bat"].'">'.$batiment["Nom_cat_bat"]."</a></li>"; } ?>
</ul>
</div>
</div>

<div class="col-md-4"> 
<div style="-moz-border-radius:20px; -webkit-border-radius:20px; border-radius:20px;" class="well">            
<center><label class="labele"><center>Site Sportif et Culturel</center></label></center>
<ul class="navigation">
  <hr>
  <?php foreach ($sites as $site) {
      echo '<li><a href="index2.php?action=Rechercher&site='.$site["ID_cat_site"].'">'.$site["Nom_cat_site"]."</a></li>"; } ?>
</ul>
</div>
</div>
</div>
</div>



<?php

$contenupage = ob_get_clean();

require "vue/template.php";


?>