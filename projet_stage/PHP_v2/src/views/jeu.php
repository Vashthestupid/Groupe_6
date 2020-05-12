<?php
error_reporting(E_ALL &~ E_NOTICE);

if (isset($_SESSION['login'])) {
	$mail = $_SESSION['login'];
} else {
	$mail = "";
}

$selectJeux = "SELECT 
	jeux.idJeu,
	jeux.imageJeu,
	jeux.titreJeu,
	jeux.resumeJeu 
	FROM jeux
	ORDER BY jeux.idJeu";

$reqSelectJeux = $db->prepare($selectJeux);
$reqSelectJeux->execute();

$listeJeux = array();

while($data = $reqSelectJeux->fetchObject()){
	array_push($listeJeux, $data);
	
}
?>
	<br>
	<div class="container">
		<p class="d-flex justify-content-center lead">Liste des jeux </p>
		<div class="row">
		<?php
		foreach($listeJeux as $jeu){
			?>
			<div class="col-sm-12 col-md-6 col-lg-4">
				<div class="card h-100">
					<img src="../../public/image/<?= $jeu->imageJeu ?>" alt="<?= $jeu->imageJeu ?>" class="card-img-top w-50 h-50 mx-auto">
					<div class="card-body">
						<h5 class="card-title d-flex justify-content-center "><?= $jeu->titreJeu ?></h5>
						<p class="card-text"><?= $jeu->resumeJeu?></p>
					</div>
					<div class="card-footer">
						<form action="detailJeu.php" method="get">
							<input type="number" name="id" id="id" value="<?= $jeu->idJeu ?>" readonly hidden>
							<input type="text" name="action" id="action" value="lire" readonly hidden>
							<input class="btn btn-secondary w-100" type="submit" value="Voir +">
						</form>
					</div>
				</div>
			</div>
		<?php
		}
		?>
        </div>
        <br>
        <nav aria-label="Page navigation example" class="d-flex justify-content-center">
            <ul class="pagination">
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>
	</div>
<?php
footer();