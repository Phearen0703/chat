<?php
    session_start();
    require("../db.connection.php");

    $state = $conn->prepare("SELECT * FROM users");
    $state->execute();

    $result = $state->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $user):
        if($_SESSION["user_id"] !== $user["user_id"]){
    ?>
        <div class="card p-3 my-2" data-receiver-id="<?php echo $user['user_id']; ?>" data-sender-id="<?php echo $_SESSION['user_id']; ?>">
            <h5><?php echo $user['username']; ?></h5>
        </div>

        <?php }?>

    <?php endforeach?>
    
    <script>
        $(document).ready(function(){
            $(".card").click(function(){
                $("#receiver_info").text("You are chatting with: " + $(this).text());
                let receiverID = $(this).data("receiver-id");
                let senderID = $(this).data("sender-id");
                getAllMessagesFrom(receiverID, senderID);
                console.log(receiverID);

            });

            function getAllMessagesFrom(receiverID, senderID){
                $.ajax({
                    url: 'services/getAllMessage.php',
                    data:{
                        receiver_id: receiverID,
                        sender_id: senderID,
                        
                        
                    },
                    method: "POST",
                    success: function(data){
                        $("#message-list").html(data);
                    }
                })
            }
        })
    </script>