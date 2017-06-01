<?php 

ob_start(); 
?>

<h2 class=text-center> Ajouter une photo </h2>
<div class="well">

<form action= "index.php?action=ConfirmerPhoto" class="form-horizontal" role="form" enctype="multipart/form-data" method='POST'>
<input type="hidden" name="MAX_FILE_SIZE" value="2097152"> 

    <div class="form-group">
    	<label class="col-sm-4 control-label">Photo actuelle : </label>
			<div class="col-md-4">
				<?php if(isset($photo['nom_image']))
				{
					$userphoto 	= getCover($photo["nom_image"]);
					echo "<img src='$userphoto' width='200px' height='200px'>";
				}
				else
				{
					echo "<img src='./image/avatar.jpeg' width='200px' height='200px'>";
				}
				?>      
	            </div>
	</div>

    <div class="form-group">
        <label class="col-sm-4 control-label">Nouvelle photo : </label>
        <div class="col-sm-6">
            <input required type="file" name="photo" class="form-control" placeholder="Inserer une photo">
        </div>
    </div>

    <!--  Bouton de validation de la création du produit  -->                  
    <div class="form-group">
        <div class="col-sm-5 col-sm-offset-4">
          <button type="submit" class="btn btn-primary" name="btn-save">
          <span class="glyphicon glyphicon-save"></span> Enregistrer
        </button>  
        <a href="index.php?action=Accueil" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Annuler</a>
        </div>
    </div>

</form>   


</div>

<?php
                
            

            $contenupage = ob_get_clean();

            require "vue/template.php";


?>