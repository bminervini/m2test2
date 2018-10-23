<?php
// back
namespace Vendor\Gestion;
    
    require_once(__DIR__ ."/../DAO/DAO.php");
    
    use \DAO\DAO;

    class GestionAdmin{
        
        private $dao;

        public function __construct()
        {
            $this->dao = new \Vendor\DAO\DAO();
        }

        function acceptInactiveUser($id){
            $this->dao->acceptUserAccount($id);
            $this->sendMailToUser($id);
            $_POST = array();
        }

        function sendMailToUser($id)
        {
            $personne = $this->dao->e($id , "personne");
            \Vendor\Mailing\MailSender::SendMail("m2test2.croissant.show@gmail.com" , $personne['gmail'] , "Waouw" , "oklm");
        }

        function deleteUser($id){
            $this->dao->deletePersonne($id);
            $_POST = array();
        }

        function deleteParticipant($id){
            $this->dao->deleteParticipation($id);
            $_POST = array();
        }

        function getAllParticipants(){
            $req = $this->dao->getAllParticipants(1);
            $result = $req->fetchAll();
            $req->closeCursor();

            return $result;
        }

        function getAllInactiveUser(){
            $req = $this->dao->getActivedOrNotPersons(0);
            $result = $req->fetchAll();
            $req->closeCursor();

            return $result;
        }

        function getAllActiveUser(){
            $req = $this->dao->getActivedOrNotPersons(1);
            $result = $req->fetchAll();
            $req->closeCursor();

            return $result;
        }

        

        public static function displayTable($table, $addBtn, $delBtn){
            
            echo '<form method="post"><thead>
                    <tr style="text-align:center;">
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Edumail</th>
                        <th scope="col">Gmail</th>
                        <th scope="col">isAdmin</th>
                        <th scope="col">participe</th>
                    </tr>
                </thead>
                <tbody>';
                

            if(empty($table)){
                echo '<tr>
                        <th scope="row"></th>
                        <td>No users to display</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                     </tr>'; 
            }
            
            $cnt = 0;
            foreach($table as $val)
            { 
                echo '<tr style="text-align:center;">
                        <th style="text-align:center;" scope="row">'.$cnt.'</th>
                        <td>'.$val['username'].'</td>
                        <td>'.$val['nom'].'</td>
                        <td>'.$val['prenom'].'</td>
                        <td>'.$val['mail'].'</td>
                        <td>'.$val['gmail'].'</td>
                        <td>'.$val['isAdmin'].'</td>
                        <td>'.$val['statutParticipation'].'</td>';

                if($addBtn) echo '<td style="text-align:center;"><button type="submit" name="add" class="btn btn-success" value="'.base64_encode($val['idPersonne']).'"><i class="fas fa-plus"></i></button></td>'; 

                if($val['isAdmin'] == 0 && $delBtn){
                    echo '<td style="text-align:center;"><button type="submit" name="delete" class="btn btn-danger" value="'.base64_encode($val['idPersonne']).'"><i class="fas fa-trash-alt"></i></button></td>';
                }else{
                    echo '<td></td>';
                }

                echo '</tr>';

                $cnt++;
            }

            echo '</tbody>
                  </from>';
        }

        public static function displayParticipant($table){

            echo '<form method="post"><thead>
                    <tr style="text-align:center;">
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Croissant</th>
                    </tr>
                </thead>
                <tbody>';


            if(empty($table)){
                echo '<tr>
                        <th scope="row"></th>
                        <td>No users to display</td>
                        <td></td>
                        <td></td>
                     </tr>';
            }

            $cnt = 1;
            foreach($table as $val)
            {
                echo '<tr style="text-align:center;">
                        <th style="text-align:center;" scope="row">'.$cnt.'</th>
                        <td>'.$val['username'].'</td>
                        <td>'.$val['nom'].'</td>
                        <td>'.$val['prenom'].'</td>
                        <td>'.$val['ameneCroissant'].'</td>
                      </tr>';

                $cnt++;
            }

            echo '</tbody>';
        }
      
    }

?>