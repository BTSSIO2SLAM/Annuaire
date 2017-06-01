<?php 

ob_start(); 

?>


<a href="index.php?action=Accueil" class="btn btn-large btn-default"><span class="glyphicon glyphicon-backward"></span> &nbsp; Retour à l'annuaire</a>


<hr>

<div class="well">
    <div class="row">
        <div class="col-md-8 col-sm-offset-2">
        <br>
        <h2><?php if(isset($data[0]['department'][0])) { echo $data[0]["cn"][0]." <small> - ".$data[0]["department"][0]."</small>"; } else { echo $data[0]["cn"][0]; } ?> </h2>
        
 

                <?php 

        if(isset($data[0]['ipphone'][0]))
        { 
            echo " <button type='button' class='btn btn-info' data-toggle='modal' data-target='#myModal'><i class='glyphicon glyphicon-earphone'></i>&nbsp; Appeler</button> "; 
        }

        if(isset($_SESSION['ldapuser']))
        { ?>

          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button  type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Appel</h4>
                </div>
                <div class="modal-body">

                Appel vers <?php echo $data[0]['ipphone'][0] ?> ...<br> <br>

                Veuillez décrocher votre téléphone après confirmation

                </div>
                <div class="modal-footer">
                <a href="index.php?action=Appeler&id=<?php echo $data[0]['ipphone'][0] ?>&user=<?php echo $data[0]['cn'][0]?>" type="button" class="btn btn-default">Confirmer</a>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                </div>
              </div>
              
            </div>
          </div>

        <?php } else { ?>

            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Pour appeler, veuillez vous connecter</h4>
                    </div>
                    <div class="modal-body">
                    <small> <i> note: Rentrer les mêmes identifiants de messagerie </i></small>
                      <form method=post action="index.php?action=Authentification&user=<?php echo $data[0]['cn'][0]?>">
                        <div class="form-group">
                          <input type="text" name=login placeholder="Identifiant" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <input type="password" name=password placeholder="Mot de passe" class="form-control" required>
                        </div>
                        <button name="btn-cnx" type="submit" class="btn btn-success">Connexion</button>
                      </form>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    </div>
                  </div>
                  
                </div>
          </div>

          <?php } ?>

        </div>
        <div class="col-md-2">

        <?php if(isset($photo['nom_image']))
                {
                    $userphoto  = getCover($photo["nom_image"]);
                    echo "<img src='$userphoto'  width='150px' height='150px'>";
                }
                else
                {
                    echo "<img src='./image/avatar.jpeg' width='150px' height='150px'>";
                }
                ?>   
        </div>
        </div>
    </div>

    <hr>

      <div class="row">
        <div class="col-md-6">
        <div class="well" style="background-color:#fff;">
        <table class='table table table-responsive'>
        <thead>
        <tr>
            <th colspan="2"><center> Contact </center></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td> Nom : </td>
            <td> <?php if(isset($data[0]["sn"][0])){ echo $data[0]["sn"][0]; } else { echo "Non défini"; } ?> </td>
        </tr>
        <tr>
            <td> Prénom : </td>
            <td> <?php if(isset($data[0]["givenname"][0])){ echo $data[0]["givenname"][0]; } else { echo "Non défini"; } ?> </td>
        </tr>
        <tr>
            <td> Organisation : </td>
            <td> <?php if(isset($data[0]["company"][0])){ echo $data[0]["company"][0]; } else { echo "Non défini"; } ?> </td>
        </tr>
        <tr>
            <td> Service : </td>
            <td> <?php if(isset($data[0]["department"][0])){ echo $data[0]["department"][0]; } else { echo "Non défini"; } ?> </td>
        </tr>
        <tr>
            <td> Fonction : </td>
            <td> <?php if(isset($data[0]["title"][0])){ echo $data[0]["title"][0]; } else { echo "Non défini"; } ?> </td>
        </tr>
        </tbody>
        </table>
        </div>
        </div>

        <div class="col-md-6">
        <div class="well" style="background-color:#fff;">
        <table class='table table table-responsive'>
        <thead>
        <tr>
            <th colspan="2"><center> Coordonnées </center></th>
        </tr>
        </thead>
        <tr>
            <td> E-mail : </td>
            <td> <?php if(isset($data[0]["mail"][0])){ echo $data[0]["mail"][0]; } else { echo "Non défini"; } ?> </td>
        </tr>
        <tr>
            <td> Adresse lieu : </td>
            <td> <?php if(isset($data[0]["streetaddress"][0])){ echo $data[0]["streetaddress"][0]; } else { echo "Non défini"; } ?> </td>
        </tr>
        <tr>
            <td> Téléphone : </td>
            <td> <?php if(isset($data[0]["telephonenumber"][0])){ echo wordwrap($data[0]["telephonenumber"][0],2," ",1); } else { echo "Non défini"; } ?> </td>
        </tr>
        <tr>
            <td> N°interne : </td>
            <td> <?php if(isset($data[0]["ipphone"][0])){ echo $data[0]["ipphone"][0]; } else { echo "Non défini"; } ?> </td>
        </tr>
        <tr>
            <td> Mobile pro : </td>
            <td> <?php if(isset($data[0]["mobile"][0])){ echo wordwrap($data[0]["mobile"][0],2," ",1); } else { echo "Non défini"; } ?> </td>
        </tr>
        <tr>
            <td> N° Fax : </td>
            <td> <?php if(isset($data[0]["facsimiletelephonenumber"][0])){ echo wordwrap($data[0]["facsimiletelephonenumber"][0],2," ",1); } else { echo "Non défini"; } ?> </td>
        </tr>
        </table>
       </div>
      </div>
    </div>

     <?php
                
            

            $contenupage = ob_get_clean();

            require "vue/template.php";


?>