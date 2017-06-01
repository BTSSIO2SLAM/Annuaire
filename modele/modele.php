<?php

//FONCTION SGBD

class Database 
{
    private $pdo = null;

    public function __construct()
    {
		$this->db_sgbd = "mysql";
		$this->db_name = "annuaire";
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

class Annuaire extends Database
{
	private $table;
    private $db;

    public function __construct($table = "Image")
    {
        $this->table = $table;
        $this->db = new Database();
    }

    public function palier3($id)
    {
    	$parametre = "SELECT nomPalier3 FROM Palier3 WHERE idPalier2 = :id";
    	$attribut = array("id" => $id);
    	$res = $this->db->prepare($parametre,$attribut);
    	return $res;

    }

    public function findphoto($user)
    {
            $parametre = "SELECT * FROM $this->table ks WHERE code_user = :user LIMIT 1";
            $attribut = array("user" => $user);
            $find = $this->db->row($parametre,$attribut);
            return $find;
    }

	public function addphoto()
	{
		  if (isset($_FILES['photo']))
	      {
	          $nomAncien = $_FILES['photo']['tmp_name'];
	          $nomNouveau = $_FILES['photo']['name'];
	          while (strpos($nomNouveau," ")) 
	          {
	              $index = strpos($nomNouveau," ");
	              $len = strlen($nomNouveau);
	              $NewNom = "";
	              for ($i = 0; $i <= $len-1 ; $i++) 
	              { 
	                  if ($i == $index) 
	                  {
	                      $NewNom.="_";
	                  }
	                  else
	                  {
	                      $NewNom.=$nomNouveau[$i];
	                  }
	              }
	              $nomNouveau = $NewNom;
	          }
	      }

		$user=$_SESSION["ldapuser"];
		$parametre = "INSERT INTO $this->table VALUES(code_image,:photo,:user)";
	    $attribut = array("photo" => $nomNouveau,
	    				  "user" => $user);
	    $add = $this->db->prepare($parametre,$attribut);
	    move_uploaded_file($nomAncien,"../komidi/image/".$nomNouveau);
	    return $add;
	}

	public function editphoto()

	

		{
		  if (isset($_FILES['photo']))
	      {
	          $nomAncien = $_FILES['photo']['tmp_name'];
	          $nomNouveau = $_FILES['photo']['name'];
	          while (strpos($nomNouveau," ")) 
	          {
	              $index = strpos($nomNouveau," ");
	              $len = strlen($nomNouveau);
	              $NewNom = "";
	              for ($i = 0; $i <= $len-1 ; $i++) 
	              { 
	                  if ($i == $index) 
	                  {
	                      $NewNom.="_";
	                  }
	                  else
	                  {
	                      $NewNom.=$nomNouveau[$i];
	                  }
	              }
	              $nomNouveau = $NewNom;
	          }
	      }
	      move_uploaded_file($nomAncien,"./image/".$nomNouveau);

		$user=$_SESSION["ldapuser"];
		$parametre = "UPDATE $this->table SET nom_image = :photo
                      					  WHERE code_user= :user ";

	    $attribut = array("photo" => $nomNouveau,
	    				  "user" => $user);

	    $edit = $this->db->prepare($parametre,$attribut);
	    return $edit;
	}
}


function SGBD() {
	// Paramètres de connexion 
    $PARAM_sgbd         ="mysql";       // SGBDR
    $PARAM_hote         ="localhost";   // le chemin vers le serveur 
    $PARAM_port         ="3306";        // Port de connexion
    $PARAM_nom_bd       ="annuaire";   // le nom de votre base de données
    $PARAM_utilisateur  ="root";        // nom utilisateur 
    $PARAM_mot_passe    ="";            // mot de passe utilisateur
    $PARAM_dsn          =$PARAM_sgbd.":host=".$PARAM_hote.";dbname=".$PARAM_nom_bd; // Nom de la source de données

    $dboptions = array(
    PDO::ATTR_PERSISTENT => FALSE,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",);

    $cnx = new PDO($PARAM_dsn, $PARAM_utilisateur, $PARAM_mot_passe, $dboptions);
    return $cnx;
}

function Palier3($id) {
    $cnx = SGBD();
    $strSQL = "SELECT * FROM Palier3 WHERE idPalier2=".$id." ORDER BY Position";
    $res = $cnx->query($strSQL);
    return $res;
}

function getServices()
{
	$cnx=SGBD();
	$strSQL = "SELECT * from Service ORDER BY NomService";
    $services = $cnx->query($strSQL);
    return $services;
}

function getSession($ldapuser, $group, $data) 
{

	@session_start();
	$_SESSION['ldapuser'] = $ldapuser;
	$_SESSION['group'] = $group;

	if(isset($data[0]['ipphone'][0]))
	{
		$_SESSION['interne'] = $data[0]['ipphone'][0];
	}
}




//FONCTIONS LDAP

    function appel($appelant,$appele) 
      {

          $oSocket = fsockopen ("10.2.100.18", 5038, $errno, $errstr, 20);
          if (!$oSocket) {
          echo "$errstr ($errno)<br>\n";
          } else {
          fputs($oSocket, "Action: login\r\n");
          fputs($oSocket, "Events: off\r\n");
          fputs($oSocket, "Username: admin\r\n");
          fputs($oSocket, "Secret: j90xt5\r\n\r\n");
          fputs($oSocket, "Action: originate\r\n");
          fputs($oSocket, "Channel: SIP/$appelant\r\n");
          fputs($oSocket, "WaitTime: 30\r\n");
          fputs($oSocket, "CallerId: $appelant\r\n");
          fputs($oSocket, "Exten: $appele\r\n");
          fputs($oSocket, "Context: from-internal\r\n");
          fputs($oSocket, "Priority: 1\r\n\r\n");
          fputs($oSocket, "Action: Logoff\r\n\r\n");
          sleep(3);
          fclose($oSocket);
          }
        }
      

function findservice($ds,$domain,$dn,$user,$password,$find)
{
	$ldapbind = @ldap_bind($ds, $user.'@'.$domain, $password); //Authentification
	$filter="(&(department=$find))"; //Filtre
	$result = ldap_search($ds, $dn, $filter);
	return $result;
}

function finduser($ds,$domain,$dn,$user,$password,$find)
{
	$ldapbind = @ldap_bind($ds, $user.'@'.$domain, $password); //Authentification
	$filter="(&(sAMAccountName=$find))"; //Filtre
	$result = ldap_search($ds, $dn, $filter);
	return $result;
}

function find($ds,$domain,$dn,$user,$password,$find)
{
	$ldapbind = @ldap_bind($ds, $user.'@'.$domain, $password); //Authentification
	$filter="(&(objectcategory=person)(objectclass=user)(|(company=$find*)(sAMAccountName=$find*)(cn=$find*)(telephoneNumber=$find*)(department=*$find*)(mail=$find*)(sn=$find*)(givenname=$find*)(ipPhone=$find*)))"; //Filtre
	$result = ldap_search($ds, $dn, $filter);
	return $result;
}

function edit($ds,$dn)
{
	if(!empty($_POST["nom"])) 
	{
		$nom = $_POST["nom"];
		$data["sn"] = $nom;
	}

	if(!empty($_POST["prenom"])) 
	{
		$prenom = $_POST["prenom"];
		$data["givenname"] = $prenom;
	}


	if(!empty($_POST["organisation"])) 
	{
		$organisation = $_POST["organisation"];
		$data["company"] = $organisation;
	}
		else
	{
		$data["company"]= array();
	}

	if(!empty($_POST["service"])) 
	{
		$service = $_POST["service"];
		$data["department"] = $service;
	}
		else
	{
		$data["department"]= array();
	}

	if(!empty($_POST["fonction"])) 
	{
		$fonction = $_POST["fonction"];
		$data["title"] = $fonction;
	}
		else
	{
		$data["title"]= array();
	}

	if(!empty($_POST["mail"])) 
	{
		$mail = $_POST["mail"];
		$data["mail"] = $mail;
	}
		else
	{
		$data["mail"]= array();
	}

	if(!empty($_POST["adresse"])) 
	{
		$adresse = $_POST["adresse"];
		$data["streetaddress"] = $adresse;
	}
		else
	{
		$data["streetaddress"]= array();
	}

	if(!empty($_POST["telephone"])) 
	{
		$telephone = $_POST["telephone"];
		$data["telephonenumber"] = $telephone;
	}
		else
	{
		$data["telephonenumber"]= array();
	}


	if(!empty($_POST["interne"])) 
	{
		$interne = $_POST["interne"];
		$data["ipphone"] = $interne;
	}
		else
	{
		$data["ipphone"]= array();
	}

	if(!empty($_POST["mobile"])) 
	{
		$mobile = $_POST["mobile"];
		$data["mobile"] = $mobile;
	}
	else
	{
		$data["mobile"]= array();
	}

	if(!empty($_POST["fax"])) 
	{
		$fax = $_POST["fax"];
		$data["facsimiletelephonenumber"] = $fax;
	}
	else
	{
		$data["facsimiletelephonenumber"] = array();
	}

	$edit=ldap_mod_replace($ds, $dn, $data);
	return $edit;
}




?>
