<?php
require_once 'src/views/elements/head.php';
require_once 'src/views/elements/footer.php';

head();
?>
    <h1>Site de mes véhicules</h1>
    <hr>
    <div>
        <?php
            if(isset($_GET['empty'])){
                if($_GET['empty'] == true){
                    ?>
                    <div class="alert alert-danger" role="alert">
                        Ces champs ne peuvent pas être vides.
                    </div>
                    <?php
                }
            }
        ?>
        <?php
        if(isset($_GET['existe'])){
            if($_GET['existe'] == true){
            ?>
            <div class="alert alert-danger">
                La marque et le modèle existent déjà.
            </div>
            <?php
            }
        }
        ?>
        <form action="src/views/mesVehicules.php" method="post">
            <div class="form-group">
                <label for="modele">Modele</label>
                <input type="text" name="mode" id="modele">
            </div>
            <div class="form-group">
                <label for="marque">Marque</label>
                <input type="text" name="mark" id="marque">
            </div>

            <input class="btn btn-outline-dark" type="submit" value="Valider">
        
        </form>
        <br>
        <a href="src/views/mesVehicules.php">
            <button type="button" class="btn btn-outline-dark">
                Mes véhicules
            </button>
        </a>

    </div>
 <?php
footer();