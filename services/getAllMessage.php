<?php
    require("../db.connection.php");
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        $state = $conn->prepare("SELECT * FROM messages WHERE (receiver_id = :receiver_id AND sender_id = :sender_id) OR (sender_id = :receiver_id AND receiver_id = :sender_id)");
        $state->execute([
            ":receiver_id" => $_POST["receiver_id"],
            ":sender_id" => $_POST["sender_id"],
        ]);
        $result = $state->fetchAll(PDO::FETCH_ASSOC);

        foreach($result as $message){
            if($message["sender_id"] == $_POST["sender_id"]){

         
    
?> 

<div class="alert-primary my-2 p-2 float-end" style="width: fit-content;">
                        <p><?= $message["message"]?></p>
                    </div>
<?php    }else{?>
    <div class="alert-secondary my-2 p-2" style="width: fit-content;">
                        <p><?= $message["message"]?></p>
                    </div>
<?php }}}?>