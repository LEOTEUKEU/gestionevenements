<?php
session_start();
require_once ('../PHP/dp.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Formulaire de l'organisateur</title>
    <meta name="description" content="une plateforme de gestion de manifestation au sein d'une université">
    <!-- add boostrap -->
    <link rel="stylesheet" href="../bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="Style3.css">
    <script src="jquery-3.4.1.min"></script>
    <script src="https://cdn.cinetpay.com/seamless/main.js"></script>
    <style>
        .sdk {
            display: block;
            position: absolute;
            background-position: center;
            text-align: center;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
    <script>
        function checkout() {
            CinetPay.setConfig({
                apikey: '14288468476660306cb91379.50734939',//   YOUR APIKEY
                site_id: '5873325',//YOUR_SITE_ID
                notify_url: 'http://mondomaine.com/notify/',
                mode: 'PRODUCTION'
            });
            CinetPay.getCheckout({
                transaction_id: Math.floor(Math.random() * 100000000).toString(), // YOUR TRANSACTION ID
                amount: 100,
                currency: 'XOF',
                channels: 'ALL',
                description: 'Test de paiement',   
                 //Fournir ces variables pour le paiements par carte bancaire
                customer_name:"Joe",//Le nom du client
                customer_surname:"Down",//Le prenom du client
                customer_email: "down@test.com",//l'email du client
                customer_phone_number: "088767611",//l'email du client
                customer_address : "BP 0024",//addresse du client
                customer_city: "Antananarivo",// La ville du client
                customer_country : "CM",// le code ISO du pays
                customer_state : "CM",// le code ISO l'état
                customer_zip_code : "06510", // code postal

            });
            CinetPay.waitResponse(function(data) {
                if (data.status == "REFUSED") {
                    if (alert("Votre paiement a échoué")) {
                        window.location.reload();
                    }
                } else if (data.status == "ACCEPTED") {
                    if (alert("Votre paiement a été effectué avec succès")) {
                        window.location.reload();
                    }
                }
            });
            CinetPay.onError(function(data) {
                console.log(data);
            });
        }
    </script>

</head>

<body>
    <div class="container-fluid"> <!-- le background ou je vais inserer une image-->
        <div class="container formu"> <!-- la div du formulaire -->
            <!-- text avant les input -->
            <div class="texte">
                <i class="fas fa-calendar-alt"></i>
                <h2><strong>Créer un nouvel  evenement:</strong> </h2>
                <p>Remplissez les différents informations de la manifestation :</p>
            </div>
            <form action="../PHP/traitement.php" method="post">

  <!--                  <div class="place line">
                        <label>Nom :
                        <input type="text" name="nom" 
                        placeholder="Nom" required></label>
                        <div class="pren" required><label>Prénom :
                        <input type="text" name="prenom"     placeholder="Prénom"></label></div>
                    </div>

                    <div class="place line">
                        <label>Email :
                        <input type="email" name="Id_Email" placeholder="Pseudo@gmail.com" required></label>
                    </div>
-->    
                    <div class="place line">
                        <label>Intitulé :
                        <input type="text" name="Intitule" placeholder="Titre de l'évènement" required></label>
                    </div>

                    <div class="place line">
                        <label>Thème :
                        <input type="text" name="Theme" placeholder="Thème de l'évènement"></label>
                    </div>
                
                    <div class="place line">
                        <label>Organisateur :
                       <?php $db=new db(); 
                          echo $db->type();
                       ?>
                       </label>
                    </div>

                    <div class="place line">
                         <label>Type de salle :
                         <?php $db=new db(); 
                          echo $db->typesalle();
                       ?>                
                         </label>
                   </div>     
<!--
                         <input type="checkbox" name="type_salle[]" value="Salle"> Salle<br>
                         <input type="checkbox" name="type_salle[]" value="Salle de conférence"> Salle de conférence
                         <input type="checkbox" name="type_salle[]" value=" Salle de formation"> Salle de formation
                         <input type="checkbox" name="type_salle[]" value="Hall"> Hall
                    </div>
--> 
                    <div class="place line">
                        <label>Date début :
                        <input type="datetime-local" name="DATE_deb" required></label>
                    </div>

                    <div class="place line">
                        <label>Date Fin :
                        <input type="datetime-local" name="DATE_fin" required></label>
                    </div>

                    <div class="place">
                        <label>Commentaire : 
                        <textarea name="comment" id="com" cols="68" rows="6" placeholder="Ajouter un commetaire"></textarea>
                    </div>

                    <!-- Ajouter l'import d'un fichier ! Affiche.... -->

                    <center><a href="api.php"><button type="submit" class="btn btn-primary" onclick="checkout()" >Ajouter un évenement</button></a>
                       <a href="http://localhost/home2.php"><button type="button" class="btn btn-primary" value="Home">Retour à la page d'acceuil</button></a> 
                    </center>
               
            </form>
        </div>
    </div>

    <?php
    if(isset($_SESSION['erreur']))
    {
       echo "<script> alert('". $_SESSION['erreur'] ."') </script>";
    }
    session_destroy();
    ?>
</body>
</html>