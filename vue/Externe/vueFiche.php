<?php 

ob_start(); 

?>
<div class="container">
<a href="index2.php?action=client" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Retour à l'annuaire</a>
</div>

<hr>

<div class="container">
    <div class="well">
      <div class="row">
        <div class="col-md-8">
        
        <center><h2><?php if(isset($resultat["nom"])) { echo $resultat["nom"]; } ?></h2></center>

               

        </div>
        
        </div>
    </div>

<hr>

    <div class="container">
      <div class="row">
        <div class="col-md-6">
        <div class="well" style="-moz-border-radius:20px; -webkit-border-radius:20px; border-radius:20px; background-color:#fff;">
        <table class='table table table-responsive'>
        <thead>
        <tr>
            <th colspan="2"><center> Contact </center></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td> Organisme : </td>
            <td> <?php if(!empty($resultat["nom"])) { echo $resultat["nom"]; } else { echo "Non défini"; } ?> </td>
        </tr>
        <tr>
            <td> Adresse : </td>
            <td> <?php if(!empty($resultat["adresse"])) { echo $resultat["adresse"]; } else { echo "Non défini"; } ?> </td>
        </tr>
        <tr>
            <td> Telephone : </td>
            <td> <?php if(!empty($resultat["tel"])) { echo wordwrap($resultat["tel"],2," ",1); } else { echo "Non défini"; } ?> </td>
        </tr>
        <tr>
            <td> Fax : </td>
            <td> <?php if(!empty($resultat["fax"])) { echo wordwrap($resultat["fax"],2," ",1); } else { echo "Non défini"; } ?> </td>
        </tr>
        </tbody>
        </table>
        </div>
        </div>

        <div class="col-md-6">

        <div id="map" style="width:100%;height:500px"></div>
        </div>

        <script>
        function myMap() {

            <?php
            if(!empty($resultat["longitude"]))
            {
                $longitude=$resultat["longitude"];
            }
            if(!empty($resultat["latitude"]))
            {
                $latitude=$resultat["latitude"];
            }


          echo "var myLatLng = {lat: ".$latitude.", lng: ".$longitude."};" ?>

          var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            center: myLatLng
          });

          var marker = new google.maps.Marker({
            position: myLatLng,
            map: map
          });
        }

        </script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEwg99kvHy8Pt1A_UCQQwzqzfIJS9YIdg &callback=myMap"></script>
        

     <?php
                
            

            $contenupage = ob_get_clean();

            require "vue/template.php";


?>