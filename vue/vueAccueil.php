<?php

ob_start(); 


///////////////////////////////////// ALERTE MESSAGE ////////////////////////////////
if(isset($msg))
{
    echo $msg;
}

?>

<!--  ////////////////////////////  BARRE DE RECHERCHE //////////////////////////-->
<div class="row">
  <div class="col-md-8 col-sm-offset-2">

  <hr>

    <form method="POST" action='index.php?action=Rechercher'>
      <div class="input-group" id="adv-search">
        <input align=center type="text" name='find' class="form-control" placeholder="Rechercher un utilisateur, un service, un numéro..." required autofocus/>
          <div class="input-group-btn">
          <button type="sumbit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
          </div>
      </div>
    </form>  

  <hr>

  </div> 
</div> 


<!-- //////////////////////////////// ORGANIGRAMME //////////////////////////// -->

<div class="row">

  <div class="col-md-4">
    <div class="well">        
      <ul class="navigation">
        <li  class="toggleSubMenu"><span>Cabinet</span>
         <ul class="subMenu">
          <?php foreach ($cabinet as $direction) {
            echo '<li><a href="index.php?action=Rechercher&find='.$direction["nomPalier3"].'">'.$direction["nomPalier3"]."</a></li>"; } ?>
          </ul>
        </li>
      </ul>
    </div>
  </div>

  <div class="col-md-4"> 
    <div class="well">        
      <ul class="navigation">
        <li  class="toggleSubMenu"><span>Maire</span>
          <ul class="subMenu">
            <li><a href="index.php?action=Rechercher&find=Secrétariat du maire">Secretariat</a></li>
          </ul>
        </li>
        <li><a href="index.php?action=Rechercher&find=élus">Les Élus</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="col-md-4"> 
    <div class="well">            
      <ul class="navigation">
        <li><a href="index.php?action=Rechercher&find=Police Municipale">Police Municipale</a>
        </li>
      </ul>
    </div>
  </div>

</div>


<div class="row">

  <div class="col-md-4 col-sm-offset-4">
    <div class="well">
      <center><label class="labele"><a href="index.php?action=Rechercher&find=Direction générale des services"> Direction Générale des services </a></label></center>      
      <ul class="navigation">
      <hr>
        <li><a href="index.php?action=Rechercher&find=Secrétariat DGS">Secrétariat</a></li>
        <li class="toggleSubMenu"><span>Direction Culture / Animation</span>
          <ul class="subMenu">
          <?php foreach ($direction13 as $direction) 
          {
            echo '<li><a href="index.php?action=Rechercher&find='.$direction["nomPalier3"].'">'.$direction["nomPalier3"]."</a></li>"; 
          } ?>
          </ul>
        </li>
      </ul>
    </div>
  </div>

</div>


      
<div class="row">

  <div class="col-md-4"> 
    <div class="well">        
      <center><label class="labele"><a href="index.php?action=Rechercher&find=Pole Administration / Ressource / Reglementation"> Pole Administration / Ressource / Reglementation </a></label></center>
      <ul class="navigation">
        <hr>
        <li  class="toggleSubMenu"><span>Direction Administration / Générale / Système d'information</span>
          <ul class="subMenu">
          <?php foreach ($direction1 as $direction) 
          {
            echo '<li><a href="index.php?action=Rechercher&find='.$direction["nomPalier3"].'">'.$direction["nomPalier3"]."</a></li>"; 
          } ?>
          </ul>
        </li>
        <li class="toggleSubMenu"><span>Direction des Affaires juridiques / Règlementation / Commande publique</span>
          <ul class="subMenu">
          <?php foreach ($direction2 as $direction) 
          {
            echo '<li><a href="index.php?action=Rechercher&find='.$direction["nomPalier3"].'">'.$direction["nomPalier3"]."</a></li>"; 
          } ?>
          </ul>
        </li>
        <li class="toggleSubMenu"><span>Direction des ressources humaines</span>
          <ul class="subMenu">
            <?php foreach ($direction3 as $direction) 
            {
              echo '<li><a href="index.php?action=Rechercher&find='.$direction["nomPalier3"].'">'.$direction["nomPalier3"]."</a></li>"; 
            } ?>
          </ul>
        </li>
        <li class="toggleSubMenu"><span>Direction Finances / Contrôle de gestion</span>
          <ul class="subMenu">
            <?php foreach ($direction4 as $direction) 
            {
              echo '<li><a href="index.php?action=Rechercher&find='.$direction["nomPalier3"].'">'.$direction["nomPalier3"]."</a></li>"; 
            } ?>
          </ul>
        </li>
      </ul>
    </div>
  </div>

  <div class="col-md-4"> 
    <div class="well">        
      <label class="labele"><a href="index.php?action=Rechercher&find=Pole Education / Prevention / Insertion / Solidarité"><center> Pole Education / Prevention / Insertion / Solidarité </center></a></label>
      <ul class="navigation">
        <hr>
        <li class="toggleSubMenu"><span>Direction Vie scolaire / Restauration</span>
          <ul class="subMenu">
        <?php foreach ($direction5 as $direction) {
            echo '<li><a href="index.php?action=Rechercher&find='.$direction["nomPalier3"].'">'.$direction["nomPalier3"]."</a></li>"; } ?>
          </ul>
        </li>
        <li class="toggleSubMenu"><span>Direction Sport / Jeunesse / Vie Associative</span>
          <ul class="subMenu">
            <?php foreach ($direction6 as $direction) {
            echo '<li><a href="index.php?action=Rechercher&find='.$direction["nomPalier3"].'">'.$direction["nomPalier3"]."</a></li>"; } ?>
          </ul>
        </li>
        <li class="toggleSubMenu"><span>Direction Coh&eacute;sion Sociale</span>
          <ul class="subMenu">
              <?php foreach ($direction7 as $direction) {
            echo '<li><a href="index.php?action=Rechercher&find='.$direction["nomPalier3"].'">'.$direction["nomPalier3"]."</a></li>"; } ?>
          </ul>
        </li>
        <li class="toggleSubMenu"><span>Direction de la Solidarité / Santé</span>
          <ul class="subMenu">
            <?php foreach ($direction8 as $direction) {
            echo '<li><a href="index.php?action=Rechercher&find='.$direction["nomPalier3"].'">'.$direction["nomPalier3"]."</a></li>"; } ?>
          </ul>
        </li>
      </ul>
    </div>
  </div>

  <div class="col-md-4"> 
    <div class="well">            
      <center><label class="labele"><center><a href="index.php?action=Rechercher&find=Pole Technique"> Pole Technique</a></center></label></center>
      <ul class="navigation">
        <hr>
        <li class="toggleSubMenu"><span>Direction Aménagement du territoire / Développement économique</span>
          <ul class="subMenu">
        <?php foreach ($direction9 as $direction) {
            echo '<li><a href="index.php?action=Rechercher&find='.$direction["nomPalier3"].'">'.$direction["nomPalier3"]."</a></li>"; } ?>
          </ul>
        </li>
        <li class="toggleSubMenu"><span>Direction Architecture / Urbanisme / Superstructure</span>
          <ul class="subMenu">
            <?php foreach ($direction10 as $direction) {
            echo '<li><a href="index.php?action=Rechercher&find='.$direction["nomPalier3"].'">'.$direction["nomPalier3"]."</a></li>"; } ?>
          </ul>
        </li>
        <li class="toggleSubMenu"><span>Direction Voirie / Energie / Logistique</span>
          <ul class="subMenu">
              <?php foreach ($direction11 as $direction) {
            echo '<li><a href="index.php?action=Rechercher&find='.$direction["nomPalier3"].'">'.$direction["nomPalier3"]."</a></li>"; } ?>
          </ul>
        </li>
        <li class="toggleSubMenu"><span>Direction Environnement / Sécurité / Eau agricole</span>
          <ul class="subMenu">
            <?php foreach ($direction12 as $direction) {
            echo '<li><a href="index.php?action=Rechercher&find='.$direction["nomPalier3"].'">'.$direction["nomPalier3"]."</a></li>"; } ?>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>




<?php

$contenupage = ob_get_clean();

require "vue/template.php";


?>
