<?php
/**
 * Created by IntelliJ IDEA.
 * User: jonathan
 * Date: 04/10/2018
 * Time: 15:24
 */

namespace DAO\tests\units\generation
{

class GenerateurPersonne
{

    var $prenom = array("John", "Baptiste", "Yannis", "Awa", "Brandon", "Lucas");
    var $nom = array("test", "test2", "test3", "test4", "test5", "test6");
    var $username = array("PigeonDétraqué", "CascadeurFou", "HyèneEnragé", "CastorDupé", "LoupMalFamé", "HibouMalin");
    var $distriMail = array("outlook", "gmail", "aol", "yahoo", "hotmail");
    var $admin = array(0, 1);

    var $listPersonnes;

    public function __construct($nbre)
    {
        $this->listPersonnes = $this->getXPersonneRandom(nbre);
    }

    public function getPersonnes()
    {
        return $this->listPersonnes;
    }

    public function getPersonneRandom($sel){
        $aleaPrenom = rand(0 , $this->prenom->count()-1 );
        $aleaNom = rand(0 , $this->nom->count()-1 );
        $aleaUsername = rand(0 , $this->nom->count()-1 );
        $aleaDistriMail = rand(0 , $this->nom->count()-1 );
        $aleaAdmin = rand(0 , 1 );

        return new Personne(
            $this->nom[$aleaNom],
            $this->prenom[$aleaPrenom],
            $this->username[$aleaUsername] . $sel,
            $this->username[$aleaUsername],
            $this->username[$aleaUsername] . "@" . $this->distriMail[$aleaDistriMail] ."com",
            $this->admin[$aleaAdmin]
        );
    }

    public function getXPersonneRandom($nbre){
        $this->listPersonnes = array();
        for ($i = 0; $i < $nbre; $i++){
            $this->listePersonne[$i] = $this->getPersonneRandom($i);
        }
    }
}
}