<?php


      class db{

       public $pdo=null;   
          public function db1(){
               

            $this->pdo= new PDO('mysql:host=localhost;dbname=DATABASE;charset=utf8', 'root','');

           return $this->pdo;

          }
        

          public function type(){
              
            $query = "SELECT nom FROM organisateur";
            $result = $this->db1()->query($query);

            echo '<select name="type">';
                echo '<option value=\"\" disabled selected>Selectionner l\'organisateur de l\'evenement </option>';
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo '<option value="' . $row['nom'] . '">' . $row['nom'] . '</option>';
            }
            echo '</select>';

          }


          public function typesalle(){
              
            $query = "SELECT nom_salle FROM salle";
            $result = $this->db1()->query($query);

            echo '<select name="type_salle">';
                echo '<option value=\"\" disabled selected>Veuillez Selectionner la salle </option>';
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo '<option value="' . $row['nom_salle'] . '">' . $row['nom_salle'] . '</option>';
            }
            echo '</select>';

          }


     };




     


?>