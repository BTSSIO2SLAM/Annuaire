<?php

//Contenu de la page
ob_start(); 

if(isset($msg))
{
	echo $msg;
}

?>


	<form action= "index.php?action=Modifier" class="form-horizontal" role="form" method='POST'>

    <div class="well">
      <div class="row">
        <div class="col-md-10">
       
        <div class="col-sm-offset-2">
        <h2><?php  if(isset($data[0]['department'][0])) { echo $data[0]["cn"][0]." <small> - ".$data[0]["department"][0]."</small>"; } else { echo $data[0]["cn"][0]; } ?></h2><br>
            
                <button type="submit" class="btn btn-default btn-primary" name="btn-update"><i class="glyphicon glyphicon-save"></i> Enregistrer modifications </button>
                <a href="index.php?action=Accueil" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Retour à l'annuaire</a>

        </div>

        </div>
        <div class="col-md-2">
            <?php if(isset($photo['nom_image']))
                {
                    $userphoto  = getCover($photo["nom_image"]);
                    echo "<img src='$userphoto' class='img-thumbnail' width='150px' height='150px'>
                          <center> <a href='index.php?action=EditPhoto'> Modifier la photo </a></center>";
                }
                else
                {
                    echo "<img src='./image/avatar.jpeg' width='150px' height='150px'> 
                          <center> <a href='index.php?action=Photo'> Ajouter une photo </a></center>";

                }
                ?>      
        </div>
        </div>
    </div>

<hr>



      <div class="row">
        <div class="col-md-6">
        <table class='table table table-responsive'>
        <thead>
        <tr>
            <th colspan="2"><center> Contact </center></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td> Nom : </td>
            <td><input required type="text" value="<?php if(isset($data[0]['sn'][0])) { echo $data[0]['sn'][0]; } ?>" name="nom" class="form-control" > </td>
        </tr>
        <tr>
            <td> Prénom : </td>
            <td> <input required type="text" value="<?php if(isset($data[0]['sn'][0])) { echo $data[0]['givenname'][0]; } ?>" name="prenom" class="form-control"> </td>
        </tr>
        <tr>
            <td> Organisation : </td>
            <td>   <input <?php if(isset($data[0]['company'][0])) { if($data[0]['company'][0]=="Ville - Mairie du Tampon") { echo "checked"; } }?> type="radio" name="organisation" value="Ville - Mairie du Tampon"> Ville - Mairie du Tampon<br>
                   <input <?php if(isset($data[0]['company'][0])) { if($data[0]['company'][0]=="CCAS") { echo "checked"; } } ?>type="radio" name="organisation" value="CCAS du Tampon"> CCAS du Tampon<br>
                   <input <?php if(isset($data[0]['company'][0])) { if($data[0]['company'][0]=="Caisse des Ecoles") { echo "checked"; } } ?>type="radio" name="organisation" value="Caisse des Ecoles"> Caisse des Ecoles </td>
        </tr>
        <tr>
            <td> Service : </td>
            <td> <select class="form-control" id="service" name="service">
                <?php
                    foreach ($services as $service)
                    {
                        ?>
                        <option <?php if(isset($data[0]['department'][0])){if($service['NomService']==$data[0]['department'][0]) { echo "selected"; }} ?>><?php echo $service['NomService']; ?></option>
                        <?php
                    }
                    ?>
                </select> </td>
        </tr>
        <tr>
            <td> Fonction : </td>
            <td> <input type="text" value="<?php if(isset($data[0]['title'][0])){ echo $data[0]['title'][0];} ?>" name="fonction" class="form-control" placeholder="exemple: responsable, secrétaire..."> </td>
        </tr>
        </tbody>
        </table>

        </div>


        <div class="col-md-6">
        <table class='table table table-responsive'>
        <thead>
        <tr>
            <th colspan="2"><center> Coordonnées </center></th>
        </tr>
        </thead>
        <tr>
            <td> E-mail : </td>
            <td> <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?php if(isset($data[0]['mail'][0])) { echo $data[0]['mail'][0]; } ?>" name="mail" class="form-control" onblur="verifMail(this)" > </td>
        </tr>
        <tr>
            <td> Lieu de travail : </td>
            <td> <input type="text" value="<?php if(isset($data[0]['streetaddress'][0])) { echo $data[0]['streetaddress'][0]; } ?>" name="adresse" class="form-control" > </td>
        </tr>
        <tr>
            <td> Téléphone : </td>
            <td><input pattern=0262[0-9]{6} maxlength="10" type="text" value="<?php if(isset($data[0]["telephonenumber"][0])) { echo $data[0]['telephonenumber'][0]; } ?>" class="form-control" name="telephone" onblur="verifTelephone(this)"> <small><i>exemple: 0262123456</i> </small></td>
        </tr>
        <tr>
            <td> N°interne : </td>
            <td> <input pattern=[0-9]{4} maxlength="4" type="text" value="<?php if(isset($data[0]['ipphone'][0])) { echo $data[0]["ipphone"][0]; }?>" class="form-control" name="interne" onblur="verifInterne(this)"> <small><i>exemple: 0000</i> </small></td>
        </tr>
       <tr>
            <td> Mobile : </td>
            <td> <input pattern=069[0-9]{7} maxlength="10"  type="text" value="<?php if(isset($data[0]["mobile"][0])) { echo $data[0]['mobile'][0]; } ?>" class="form-control" name="mobile" onblur="verifMobile(this)"><small><i>exemple: 0692123456</i> </small> </td>
        </tr>
        <tr>
            <td> N° Fax : </td>
            <td><input pattern=0262[0-9]{6} maxlength="10" type="text" value="<?php if(isset($data[0]['facsimiletelephonenumber'][0])) { echo $data[0]["facsimiletelephonenumber"][0]; } ?>" class='form-control' name="fax" onblur="verifTelephone(this)"><small><i>exemple: 0262123456</i> </small> </td>
        </tr>
        </table>
       </div>    
      </div>
    

    </form>


<?php

			$contenupage = ob_get_clean();

			require "vue/template.php";


?>