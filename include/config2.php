<?php

// Page courante
    $current_page = basename($_SERVER['PHP_SELF']); // Ex: index.php



    $adminmenupage = array(
        'Ecole' => "index.php?action=Accueil",
        'Batiment Administratif' => "index.php?action=Batiment",
        'Site Sportif et Cultuel' => "index.php?action=Site"
        );
?>