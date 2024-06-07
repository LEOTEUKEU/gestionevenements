<?php 

$bdd=new PDO('mysql:host=localhost;dbname=DATABASE;charset=utf8', 'root','');

 $nm=$bdd->prepare("INSERT INTO organisatuer (pseudo,mail,profession,num_tel,nom,prénom) VALUES(:pseudo,:mail,:profession,:num_tel,:nom,:prenom)");

 $donn = $nm->execute(array(
     'pseudo'=> $_POST['pseudo'],
     'mail'=> $_POST['mail'],
     'num_tel'=> $_POST['num_tel'],
     'nom'=> $_POST['nom'],
     'prenom'=> $_POST['prenom'],
     'profession'=> $_POST['profession']
 ));
 
 

 header('location:../LOGIN/admin_space.php');

 ?>