<?php

class Database 
{
    private $pdo = null;

    public function __construct()
    {
		$this->db_sgbd = "mysql";
		$this->db_name = "externe";
		$this->db_user = "root";
		$this->db_pass = "";
		$this->db_host = "localhost";
		$this->db_port = 3306;

    }

    // Connexion à la BDD
    private function getPDO()
    {
        if ($this->pdo === null) {

            try {
                // DSN
                $pdo = new PDO($this->db_sgbd . ":dbname=" . $this->db_name . ";
                                host=" . $this->db_host . ";
                                port=". $this->db_port, $this->db_user, $this->db_pass);


                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->exec("SET CHARACTER SET utf8");

                $this->pdo = $pdo;

            } catch (PDOException $e) {
                echo 'Erreur lors de la connexion à la BDD : ' . $e->getMessage();
                die();
            }

        }

        return $this->pdo;
    }

    // Requête simple
    public function query($parametre)
    {
        $strSQL  = $this->getPDO()->query($parametre);
        $data = $strSQL->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    // Requête préparée
    public function prepare($parametre, $attributs = array())
    {
        $query  = explode(" ", $parametre);
        // Récupération du 1èr mot
        $option = strtolower(array_shift($query));
       
        $req = $this->getPDO()->prepare($parametre);
        $req->execute($attributs);

        if ($option == "select" )
        {

            if ($req->rowCount() > 0) {
                $data = $req->fetchAll(PDO::FETCH_CLASS);
                return $data;
            }

        } elseif ($option == "insert" || $option == "update" || $option == "delete") {

            if ($option == "insert") {
                // Valeur id inséré
                return $this->getPDO()->lastInsertId();
            } else {
                return $req->rowCount();
            }
        }
    }

    // Une seule ligne
    public function row($parametre, $attributs = array())
    {
        $req = $this->getPDO()->prepare($parametre);
        $req->execute($attributs);
        $data = $req->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
}
class Externe extends Database
{
    private $table;
    private $db;

    public function __construct($table = "Ecole, Batiment_Administratif, Site_sportif_culturel")
    {
        $this->table = $table;
        $this->db = new Database();
    }

    public function findAll2($find)
    {
        $parametre = "SELECT ID_ecole as id, 
                             Nom_ecole as nom, 
                             Adresse_ecole as adresse, 
                             Tel_ecole as tel, 
                             Fax_ecole as fax, 
                             Longitude_ecole as longitude, 
                             Latitude_ecole as latitude, 
                             Nom_cat_ecole as idcat 
                             FROM Ecole E, Categorie_Ecole CE
                             WHERE E.ID_cat_ecole = CE.ID_cat_ecole AND Nom_ecole LIKE '%".$find."%' 
                             UNION 
                             SELECT ID_bat as id, 
                                    Nom_bat as nom, 
                                    Adresse_bat as adresse, 
                                    Tel_bat as tel, 
                                    Fax_bat as fax, 
                                    Longitude_bat as longitude, 
                                    Latitude_bat as latitude, 
                                    Nom_cat_bat as idcat
                                    FROM Batiment_Administratif BA, Categorie_Batiment CB 
                                    WHERE BA.ID_cat_bat = CB.ID_cat_bat AND Nom_bat LIKE '%".$find."%' 
                                    UNION SELECT ID_site as id, 
                                                 Nom_site as nom, 
                                                 Adresse_site as adresse, 
                                                 Tel_site as tel, 
                                                 Fax_site as fax, 
                                                 Longitude_site as longitude, 
                                                 Latitude_site as latitude, 
                                                 Nom_cat_site as idcat 
                                                 FROM Site_sportif_culturel S, Categorie_Site CS
                                                 WHERE S.ID_cat_site = CS.ID_cat_site AND Nom_site LIKE '%".$find."%'";
        $findAll = $this->db->query($parametre);
        return $findAll;
    }

    public function findAll($find)
    {
        $parametre = "SELECT ID_ecole as id, Nom_ecole as nom, Adresse_ecole as adresse, Tel_ecole as tel, Fax_ecole as fax, Longitude_ecole as longitude, Latitude_ecole as latitude, ID_cat_ecole idcat FROM Ecole WHERE Nom_ecole LIKE :find UNION SELECT * FROM Batiment_Administratif WHERE Nom_bat LIKE :find UNION SELECT * FROM Site_sportif_culturel WHERE Nom_site LIKE :find";
        $attribut = array("find" => $find);

        $findAll = $this->db->row($parametre, $attribut);
        return $findAll;
    }
}

class Batiment extends Database
{
    private $table;
    private $db;

    public function __construct($table = "Batiment_Administratif")
    {
        $this->table = $table;
        $this->db = new Database();
    }

    // Sélectionner tous les éléments
    public function findAll()
    {
        $parametre = "SELECT * FROM $this->table";

        $findAll = $this->db->query($parametre);
        return $findAll;
    }

    public function findAllbycat($id)
    {
        $parametre = "SELECT ID_bat as id, 
                             Nom_bat as nom, 
                             Adresse_bat as adresse, 
                             Tel_bat as tel, 
                             Fax_bat as fax, 
                             Nom_cat_bat as idcat FROM $this->table B, Categorie_Batiment CB 
                             WHERE B.ID_cat_bat=CB.ID_cat_bat
                             AND B.ID_cat_bat = ".$id;
        $findAllbycat = $this->db->query($parametre);
        return $findAllbycat;
    }

    // Sélectionner un élément par son id
    public function find($id = "")
    {
        if ($id) 
        {
            $parametre = "SELECT * FROM $this->table WHERE ID_bat = :id LIMIT 1";
            $attribut = array("id" => $id);
            $find = $this->db->row($parametre,$attribut);
            return $find;
        }
    }

    // Ajouter un élément
    public function add($nom = "", $adresse = "", $telephone = "", $fax = "", $longitude = "", $latitude = "", $categorie = "")
    {

        if ($nom  && $categorie)
        {
            $parametre = "INSERT INTO $this->table (ID_bat, Nom_bat, Adresse_bat, Tel_bat, Fax_bat, Longitude_bat, Latitude_bat, ID_cat_bat) 
                          VALUES (ID_bat, :nom, :adresse, :telephone, :fax, :longitude, :latitude, :categorie);";

            $attribut = array('nom'=>$nom,
                              'adresse'=>$adresse,
                              'telephone'=>$telephone,
                              'fax'=>$fax,
                              'longitude'=>$longitude,
                              'latitude'=>$latitude,
                              'categorie'=>$categorie);

            $add = $this->db->prepare($parametre,$attribut);
            return $add;
        }
    }

    // Modifier un élément
    public function edit($nom = "", $adresse = "", $telephone = "", $fax = "", $longitude = "", $latitude = "", $categorie = "", $id = "")
    {
        if ($nom && $categorie && $id) 
        {
            $parametre = "UPDATE $this->table SET Nom_bat=:nom, 
                                                  Adresse_bat=:adresse, 
                                                  Tel_bat=:telephone,
                                                  Fax_bat=:fax,
                                                  Longitude_bat=:longitude,
                                                  Latitude_bat=:latitude,
                                                  ID_cat_bat=:categorie
                                                  WHERE ID_bat=:id ";

            $attribut = array('nom'=>$nom,
                              'adresse'=>$adresse,
                              'telephone'=>$telephone,
                              'fax'=>$fax,
                              'longitude'=>$longitude,
                              'latitude'=>$latitude,
                              'categorie'=>$categorie,
                              'id'=>$id);

            $edit = $this->db->prepare($parametre, $attribut);
            return $edit;
        }
    }

    // Supprimer un élément
    public function delete($id = "") 
    {
        if ($id) 
        {
            $parametre = "DELETE FROM $this->table 
                          WHERE ID_bat=:id;";

            $attribut = array('id'=>$id);

            $delete = $this->db->prepare($parametre,$attribut);
            return $delete;
        }
    }
}

class CategorieBatiment extends Database
{
    private $table;
    private $db;

    public function __construct($table = "Categorie_Batiment")
    {
        $this->table = $table;
        $this->db = new Database();
    }

    // Sélectionner tous les éléments
    public function findAll()
    {
        $parametre = "SELECT * FROM $this->table";

        $findAll = $this->db->query($parametre);
        return $findAll;
    }

    public function find($id = "")
    {
        if ($id) 
        {
            $parametre = "SELECT * FROM $this->table ks WHERE ID_cat_bat = :id LIMIT 1";

            $attribut = array("id" => $id);

            $find = $this->db->row($parametre,$attribut);
            return $find;
        }
    }

    // Ajouter un élément
    public function add($categorie = "")
    {
        if ($categorie)
        {
            $parametre = "INSERT INTO $this->table(ID_cat_bat, Nom_cat_bat) 
                          VALUES (ID_cat_bat, :categorie);";

            $attribut = array('categorie'=>$categorie);

            $add = $this->db->prepare($parametre,$attribut);
            return $add;
        }
    }

    public function edit($id = "")
    {
        if ($id)
        {
            $parametre = "UPDATE $this->table SET Nom_cat_bat = :categorie
                          WHERE ID_cat_bat = $id ";

            $attribut = array('categorie'=>$_POST['categorie']);

            $edit = $this->db->prepare($parametre, $attribut);
            return $edit;
        }
    }

    // Supprimer un élément
    public function delete($id = "") 
    {
        if ($id) 
        {
            $parametre = "DELETE FROM $this->table 
                          WHERE ID_cat_bat=:id ";

            $attribut = array('id'=>$id);

            $delete = $this->db->prepare($parametre,$attribut);
            return $delete;
        }
    }
}

class Ecole extends Database
{
	private $table;
    private $db;

    public function __construct($table = "Ecole")
    {
        $this->table = $table;
        $this->db = new Database();
    }

    // Sélectionner tous les éléments
    public function findAll()
    {
        $parametre = "SELECT * FROM $this->table";

        $findAll = $this->db->query($parametre);
        return $findAll;
    }

    public function findAllbycat($id)
    {
        $parametre = "SELECT ID_ecole as id, 
                             Nom_ecole as nom, 
                             Adresse_ecole as adresse, 
                             Tel_ecole as tel, 
                             Fax_ecole as fax,
                             Nom_cat_ecole as idcat 
                             FROM $this->table E, Categorie_Ecole CE 
                             WHERE E.ID_cat_ecole = CE.ID_cat_ecole
                             AND E.ID_cat_ecole = ".$id;
        $findAllbycat = $this->db->query($parametre);
        return $findAllbycat;
    }

    // Sélectionner un élément par son id
    public function find($id = "")
    {
        if ($id) 
        {
            $parametre = "SELECT * FROM $this->table WHERE ID_ecole = :id LIMIT 1";
            $attribut = array("id" => $id);
            $find = $this->db->row($parametre,$attribut);
            return $find;
        }
    }

    // Ajouter un élément
    public function add($nom = "", $adresse = "", $telephone = "", $fax = "", $longitude = "", $latitude = "", $categorie = "")
    {

        if ($nom && $categorie)
        {
            $parametre = "INSERT INTO $this->table (ID_ecole, Nom_ecole, Adresse_ecole, Tel_ecole, Fax_ecole, Longitude_ecole, Latitude_ecole, ID_cat_ecole) 
                          VALUES (ID_ecole, :nom, :adresse, :telephone, :fax, :longitude, :latitude, :categorie);";

            $attribut = array('nom'=>$nom,
                              'adresse'=>$adresse,
                              'telephone'=>$telephone,
                              'fax'=>$fax,
                              'longitude'=>$longitude,
                              'latitude'=>$latitude,
                              'categorie'=>$categorie);

            $add = $this->db->prepare($parametre,$attribut);
            return $add;
        }
    }

    // Modifier un élément
    public function edit($nom = "", $adresse = "", $telephone = "", $fax = "", $longitude = "", $latitude = "", $categorie = "", $id = "")
    {
        if ($nom && $categorie && $id) 
        {
            $parametre = "UPDATE $this->table SET Nom_ecole=:nom, 
												  Adresse_ecole=:adresse, 
					    	                      Tel_ecole=:telephone,
											      Fax_ecole=:fax,
												  Longitude_ecole=:longitude,
												  Latitude_ecole=:latitude,
												  ID_cat_ecole=:categorie
											      WHERE ID_ecole=:id";

            $attribut = array('nom'=>$nom,
                              'adresse'=>$adresse,
                              'telephone'=>$telephone,
                              'fax'=>$fax,
                              'longitude'=>$longitude,
                              'latitude'=>$latitude,
                              'categorie'=>$categorie,
                              'id'=>$id);


            $edit = $this->db->prepare($parametre, $attribut);
            return $edit;
        }
    }

    // Supprimer un élément
    public function delete($id = "") 
    {
        if ($id) 
        {
            $parametre = "DELETE FROM $this->table 
                          WHERE ID_ecole=:id;";

            $attribut = array('id'=>$id);

            $delete = $this->db->prepare($parametre,$attribut);
            return $delete;
        }
    }
}


class CategorieEcole extends Database
{
    private $table;
    private $db;

    public function __construct($table = "Categorie_Ecole")
    {
        $this->table = $table;
        $this->db = new Database();
    }

    // Sélectionner tous les éléments
    public function findAll()
    {
        $parametre = "SELECT * FROM $this->table";

        $findAll = $this->db->query($parametre);
        return $findAll;
    }

    public function find($id = "")
    {
        if ($id) 
        {
            $parametre = "SELECT * FROM $this->table ks WHERE ID_cat_ecole = :id LIMIT 1";

            $attribut = array("id" => $id);

            $find = $this->db->row($parametre,$attribut);
            return $find;
        }
    }

    // Ajouter un élément
    public function add($categorie = "")
    {
        if ($categorie)
        {
            $parametre = "INSERT INTO $this->table(ID_cat_ecole, Nom_cat_ecole) 
                          VALUES (ID_cat_ecole, :categorie);";

            $attribut = array('categorie'=>$categorie);

            $add = $this->db->prepare($parametre,$attribut);
            return $add;
        }
    }

    public function edit($id = "")
    {
        if ($id)
        {
            $parametre = "UPDATE $this->table SET Nom_cat_ecole = :categorie
                          WHERE ID_cat_ecole= $id ";

            $attribut = array('categorie'=>$_POST['categorie']);

            $edit = $this->db->prepare($parametre, $attribut);
            return $edit;
        }
    }

    // Supprimer un élément
    public function delete($id = "") 
    {
        if ($id) 
        {
            $parametre = "DELETE FROM $this->table 
                          WHERE ID_cat_ecole=:id ";

            $attribut = array('id'=>$id);

            $delete = $this->db->prepare($parametre,$attribut);
            return $delete;
        }
    }
}

class Site extends Database
{
    private $table;
    private $db;

    public function __construct($table = "Site_sportif_culturel")
    {
        $this->table = $table;
        $this->db = new Database();
    }

    // Sélectionner tous les éléments
    public function findAll()
    {
        $parametre = "SELECT * FROM $this->table";

        $findAll = $this->db->query($parametre);
        return $findAll;
    }

    public function findAllbycat($id)
    {
        $parametre = "SELECT ID_site as id, 
                             Nom_site as nom, 
                             Adresse_site as adresse, 
                             Tel_site as tel, 
                             Fax_site as fax,
                             Nom_cat_site as idcat
                             FROM $this->table S, Categorie_Site CS 
                             WHERE S.ID_cat_site=CS.ID_cat_site
                             AND S.ID_cat_site =".$id;
        $findAllbycat = $this->db->query($parametre);
        return $findAllbycat;
    }

    // Sélectionner un élément par son id
    public function find($id = "")
    {
        if ($id) 
        {
            $parametre = "SELECT * FROM $this->table WHERE ID_site = :id LIMIT 1";
            $attribut = array("id" => $id);
            $find = $this->db->row($parametre,$attribut);
            return $find;
        }
    }

    // Ajouter un élément
    public function add($nom = "", $adresse = "", $telephone = "", $fax = "", $longitude = "", $latitude = "", $categorie = "")
    {

        if ($nom && $categorie)
        {
            $parametre = "INSERT INTO $this->table (ID_site, Nom_site, Adresse_site, Tel_site, Fax_site, Longitude_site, Latitude_site, ID_cat_site) 
                          VALUES (ID_site, :nom, :adresse, :telephone, :fax, :longitude, :latitude, :categorie);";

            $attribut = array('nom'=>$nom,
                              'adresse'=>$adresse,
                              'telephone'=>$telephone,
                              'fax'=>$fax,
                              'longitude'=>$longitude,
                              'latitude'=>$latitude,
                              'categorie'=>$categorie);

            $add = $this->db->prepare($parametre,$attribut);
            return $add;
        }
    }

    // Modifier un élément
    public function edit($nom = "", $adresse = "", $telephone = "", $fax = "", $longitude = "", $latitude = "", $categorie = "", $id = "")
    {
        if ($nom && $categorie && $id) 
        {
            $parametre = "UPDATE $this->table SET Nom_site=:nom, 
                                                  Adresse_site=:adresse, 
                                                  Tel_site=:telephone,
                                                  Fax_site=:fax,
                                                  Longitude_site=:longitude,
                                                  Latitude_site=:latitude,
                                                  ID_cat_site=:categorie
                                                  WHERE ID_site=:id ";

            $attribut = array('nom'=>$nom,
                              'adresse'=>$adresse,
                              'telephone'=>$telephone,
                              'fax'=>$fax,
                              'longitude'=>$longitude,
                              'latitude'=>$latitude,
                              'categorie'=>$categorie,
                              'id'=>$id);

            $edit = $this->db->prepare($parametre, $attribut);
            return $edit;
        }
    }

    // Supprimer un élément
    public function delete($id = "") 
    {
        if ($id) 
        {
            $parametre = "DELETE FROM $this->table 
                          WHERE ID_site=:id;";

            $attribut = array('id'=>$id);

            $delete = $this->db->prepare($parametre,$attribut);
            return $delete;
        }
    }
}

class CategorieSite extends Database
{
    private $table;
    private $db;

    public function __construct($table = "Categorie_Site")
    {
        $this->table = $table;
        $this->db = new Database();
    }

    // Sélectionner tous les éléments
    public function findAll()
    {
        $parametre = "SELECT * FROM $this->table";

        $findAll = $this->db->query($parametre);
        return $findAll;
    }

    public function find($id = "")
    {
        if ($id) 
        {
            $parametre = "SELECT * FROM $this->table ks WHERE ID_cat_site = :id LIMIT 1";

            $attribut = array("id" => $id);

            $find = $this->db->row($parametre,$attribut);
            return $find;
        }
    }

    // Ajouter un élément
    public function add($categorie = "")
    {
        if ($categorie)
        {
            $parametre = "INSERT INTO $this->table(ID_cat_site, Nom_cat_site) 
                          VALUES (ID_cat_site, :categorie);";

            $attribut = array('categorie'=>$categorie);

            $add = $this->db->prepare($parametre,$attribut);
            return $add;
        }
    }

    public function edit($id = "")
    {
        if ($id)
        {
            $parametre = "UPDATE $this->table SET Nom_cat_site = :categorie
                          WHERE ID_cat_site = $id ";

            $attribut = array('categorie'=>$_POST['categorie']);

            $edit = $this->db->prepare($parametre, $attribut);
            return $edit;
        }
    }

    // Supprimer un élément
    public function delete($id = "") 
    {
        if ($id) 
        {
            $parametre = "DELETE FROM $this->table 
                          WHERE ID_cat_site=:id ";

            $attribut = array('id'=>$id);

            $delete = $this->db->prepare($parametre,$attribut);
            return $delete;
        }
    }
}
