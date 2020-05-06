<?php 

function formulaireLire(){
    ?>
    <form action="src/views/detail.php" method="get">
        <input type="number" name="id" id="id" value="" readonly hidden>
        <input type="text" name="action" id="action" value="lire" readonly hidden>
        <input class="btn btn-secondary w-100" type="submit" value="Voir +">
    </form>	
    <?php
}

