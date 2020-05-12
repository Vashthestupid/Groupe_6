<?php
error_reporting(E_ALL &~ E_NOTICE);
session_start();
if (isset($_SESSION['login'])) {
	$mail = $_SESSION['login'];
} else {
	$email = "";
}


// On récupère les données de la table 'livres' 

$selectLivres = "SELECT livres.idLivre, 
					livres.imageLivre,
					livres.titreLivre,
					livres.resumeLivre
					FROM livres
					ORDER BY livres.idLivre
					DESC
					LIMIT 0,6
					";

$reqSelectLivres = $db->prepare($selectLivres);
$reqSelectLivres->execute();

$listeLivres = array();

while($data = $reqSelectLivres->fetchObject()){
	array_push($listeLivres, $data);
}


?>
<br>
<div class="container">
	<p class="d-flex justify-content-center lead">Liste des livres </p>
	<div class="row">
	<?php
	foreach($listeLivres as $livre){
		?>
		<div class="col-sm-12 col-md-6 col-lg-4">
			<div class="card h-100">
				<img src="../../public/image/<?= $livre->imageLivre ?>" alt="<?= $livre->imageLivre ?>" class="card-img-top w-50 h-50 mx-auto">
				<div class="card-body">
					<h5 class="card-title d-flex justify-content-center "><?= $livre->titreLivre ?></h5>
					<p class="card-text"><?= $livre->resumeLivre ?></p>
				</div>
				<div class="card-footer">
					<form action="detailLivre" method="get">
						<input type="number" name="id" id="id" value="<?= $livre->idLivre ?>" readonly hidden>
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