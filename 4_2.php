<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ΠΕΤΡΑ - ΨΑΛΙΔΙ - ΧΑΡΤΙ</title>
    <link rel="stylesheet" href="asset/style.css">
</head>
<body>

<?php

      $winner = "";
      $player_name = "";
      $player = 0;
      $machine = 0;
      $counter = 0;
      
      if(!empty($_POST['choice'])){
            
            function generate_computer_choice(){
                $computer = rand(0,2);

                if($computer == 0){
                $computer_choice = "Πέτρα";
                return $computer_choice;
                }elseif($computer == 1){
                $computer_choice = "Ψαλίδι";
                return $computer_choice;
                }else{
                $computer_choice = "Χαρτί";
                return $computer_choice;
                }
            }

             $result = generate_computer_choice();
             $player_choice = $_POST['choice'];
             $player_name = $_POST['first_name'];
         
            if (!empty($_POST['counter']) && is_numeric($_POST['counter'])) {
                $counter = $_POST['counter'] + 1;
            } else {
                $counter = 1; 
            }

   
                $player = $_POST['player'];
                $machine = $_POST['machine'];

            if($player_choice == $result){
                $winner = "Ισοπαλία";
            }else{

                    switch ($player_choice){

                        case "Ψαλίδι":
                            if($result == "Πέτρα"){
                            $winner = "Νίκησε ο Υπολογιστής!";
                            }else{
                            $winner = "Νίκησε ο Παίκτης";
                            }
                            break;

                        case "Πέτρα": 
                            if($result == "Χαρτί"){
                                $winner = "Νίκησε ο Υπολογιστής!";
                            } else{
                                $winner = "Νίκησε ο Παίκτης";
                            }
                        break;

                        case "Χαρτί":
                            if($result == "Ψαλίδι"){
                                $winner = "Νίκησε ο Υπολογιστής!";
                            }else{
                                $winner = "Νίκησε ο Παίκτης";
                            }
                            break;
                    }

            }

         if($winner == "Νίκησε ο Παίκτης"){
              $player = $_POST['player'] + 1;
         }elseif($winner == "Νίκησε ο Υπολογιστής!"){
              $machine = $_POST['machine'] + 1;
         }

    } else {
       $player_name = "";
    }

?>

<div class="form_style">
   <h3>Πέτρα Ψαλίδι Χαρτί</h3>
   <p>Βάλε το όνομα σου για να παίξεις</p>

   <form action="4_2.php" method="POST">

           <input type="text" name="first_name" placeholder="Βάλε το όνομα σου"> 
             
           <p>Επέλεξε ένα από τα παρακάτω και παίξε</p>
           <p style="font-size:14px;">Αντίπαλός σου είναι ο Υπολογιστής.
           Όποιος κάνει πρώτος 3 νίκες είναι νικητής!!!</p>

         <div>
            <input type="radio" value="Πέτρα" name="choice" id="petra">
            <label for="petra">Πέτρα</label>

            <input type="radio" value="Ψαλίδι" name="choice" id="psalidi">
            <label for="psalidi">Ψαλίδι</label>

            <input type="radio" value="Χαρτί" name="choice" id="xarti">
            <label for="xarti">Χαρτί</label>
         </div>

         <?php
          if($player == 3 || $machine == 3){
               echo "<br><br><a href='4_2.php'><button class='button'>Παίξε ξανά</button></a>";
          }else{
                echo "<br><br><button type='submit' class='button'>Παίξε</button>";
          } 
        ?>

         <input type="hidden" name="player"  value="<?php echo  $player ?>">
         <input type="hidden" name="player_name" value="<?php echo  $player_name ?>">
         <input type="hidden" name="machine"  value="<?php echo  $machine ?>">
         <input type="hidden" name="counter" value="<?php echo $counter?>">
    
         <table align="center" style="text-align: center;">
                <tr id="names_players">     
                   <th class="names_players">  
                       <label for="player">
                                <?php 
                                    $i = "Player..."; 
                                    if ($player_name != "") {
                                           $i = $player_name;
                                        } 
                                        echo $i; 
                                ?>
                        </label> 
                    </th>
                    <th class="image"><img src="https://www.pinclipart.com/picdir/big/494-4949167_vs-cliparts-versus-clipart-png-download.png" width="60" height="40" alt=""></th>
                    <th class="names_players"> <label for="machine">Υπολογιστής</label></th>
                </tr>

                <tr id="total">
                    <td class="total"><?php echo  $player ?></td>
                    <td class="total"> </td>
                    <td class="total"><?php echo  $machine ?></td>
                </tr>

            </table>
   </form>
</div>

<div style="margin:50px auto;text-align:center;">
   <?php
        if(!empty($_POST['choice'])){

              if($player == 3){
                 echo "<p>H επιλογη του <b>$i</b> ειναι <b> $player_choice</b></p>";
                 echo "<p>H επιλογη του <b>Υπολογιστη</b> ειναι <b>$result</b></p>";
                 echo "<p>Νικητής είναι o <b>$i</b>! Με σκορ: <b>$player - $machine</b></p>";
              }elseif($machine == 3){
                echo "<p>H επιλογη του <b>$i</b> ειναι <b> $player_choice</b></p>";
                echo "<p>H επιλογη του <b>Υπολογιστη</b> ειναι <b>$result</b></p>";
                echo "<p>Νικητής είναι ο <b>Υπολογιστης</b>! Με σκορ <b>$player - $machine</b></p>";
              }else{
                echo "<p>H επιλογη του <b>$i</b> ειναι <b> $player_choice</b></p>";
                echo "<p>H επιλογη του <b>Υπολογιστη</b> ειναι <b>$result</b></p>";
                $round = "Γύρος: $counter<sup>ος</sup>";
                echo "<p><b>$round</b> To αποτελεσμα ειναι: <b>$winner</b></p>";
              }
        }
    
    ?>
</div>
    
</body>
</html>
