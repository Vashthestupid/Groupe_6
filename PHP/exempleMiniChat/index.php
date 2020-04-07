<?php
require_once 'src/views/elements/head.php';
require_once 'src/views/elements/footer.php';
require 'src/config/config.php';
require 'src/models/connect.php';


head();
$db=Connection();
if(isset($_POST["mes"])) {
    $text = htmlspecialchars(trim($_POST["mes"]));
    $sqlInsert="INSERT INTO chat(message) VALUE(:text)";
    $req=$db->prepare($sqlInsert);
    $req->bindParam(":text",$text);
    $req->execute();


}

$messages = array();
$sqlSelect = "SELECT message FROM chat ORDER BY datemessage DESC";
$reqSelect=$db->prepare($sqlSelect);
$reqSelect->execute();

while ($data=$reqSelect->fetchObject()){
    array_push($messages,$data);
}


?>
    <h1>Mini - Chat</h1>
    <hr>
    <div>
        <form method="POST">

            <div class="form-group">
                <label for="message">Votre message</label>
                <input type="text" name="mes" class="form-control" id="message">

            </div>
            <button type="submit" class="btn btn-outline-dark">Envoyer</button>
        </form>
    </div>
    <div id="message" class="mt-5">
        <?php
        foreach ($messages as $message){

        ?>
        <p class="p-3 card"><?= $message->message; ?></p>
        <?php
        }
            ?>
    </div>
<?php
footer();