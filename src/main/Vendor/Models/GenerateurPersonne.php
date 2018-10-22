<?php
/**
 * Created by IntelliJ IDEA.
 * User: jonathan
 * Date: 04/10/2018
 * Time: 15:24
 */

namespace Vendor\Models
{
    require_once(__DIR__ . "/../Models/Personne.php");

    class GenerateurPersonne
{

    var $prenom = array("John", "Baptiste", "Yannis", "Awa", "Brandon", "Lucas");
    var $nom = array("test", "test2", "test3", "test4", "test5", "test6");
    var $username = array("PigeonDetraque", "CascadeurFou", "HyeneEnrage", "CastorDupe", "LoupMalFame", "HibouMalin");
    var $distriMail = array("edu.univ-fcomte.fr");
    var $admin = array(0, 1);
    var $statutParticipation = array(0, 1, 2);
    var $accepte = array(0, 1);

    var $listPersonnes = [];

    public function __construct($nbre)
    {
        $this->listPersonnes = $this->getXPersonneRandom($nbre);
    }

    public function getPersonnes()
    {
        return $this->listPersonnes;
    }

    public function getPersonneRandom($sel){
        $aleaPrenom = rand(0 , sizeof($this->prenom)-1 );
        $aleaNom = rand(0 , sizeof($this->nom)-1 );
        $aleaUsername = rand(0 , sizeof($this->username)-1 );
        $aleaDistriMail = rand(0 , sizeof($this->distriMail)-1 );
        $aleaAdmin = rand(0, 1);
        $aleaStatutParticipation = rand(0, 2);
        $aleaAccepte = rand(0, 1);

        $pers = new Personne(
            $this->nom[$aleaNom],
            $this->prenom[$aleaPrenom],
            $this->username[$aleaUsername] . $sel,
            md5($this->username[$aleaUsername]),
            $this->username[$aleaUsername]  . $sel . "@" . $this->distriMail[$aleaDistriMail],
            $this->username[$aleaUsername]  . $sel . "@gmail.com",
            0,
            $this->statutParticipation[$aleaStatutParticipation],
            $this->accepte[$aleaAccepte]
        );
        return $pers;
    }

    public function getXPersonneRandom($nbre){
        for ($i = 0; $i < $nbre; $i++){
            $this->listPersonnes[$i] = $this->getPersonneRandom($i);
        }
        return $this->listPersonnes;
    }
}
}