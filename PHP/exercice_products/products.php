<?php
include 'src/views/elements/header.php';
include 'src/views/elements/footer.php';
include 'src/config/config.php';
include 'src/models/connect.php';

head();

$db=connection();

$sqlSelect='SELECT products.id,products.name,products.price, categories.name AS catName
         FROM products
		 INNER JOIN categories ON products.category_id= categories.id
		 ORDER BY id DESC ';
$reqSelect=$db->prepare($sqlSelect);
$reqSelect->execute();
$listeProduits=array();
while($data=$reqSelect->fetchObject())
{
    array_push($listeProduits,$data);
}

?>

<div class="container">
	<h2>Liste des produits</h2>

	<table class="table table-hover">
		<thead class="thead-dark">
		<tr>
			<th scope="col">#</th>
			<th scope="col">Nom</th>
			<th scope="col">Prix</th>
			<th scope="col">Categorie</th>
			<th scope="col">Actions</th>
		</tr>
		</thead>
		<tbody>
			<?php foreach ($listeProduits as $produit)
            { 
			?>
            <tr>
                <th scope="row"><?= $produit->id ?></th>
                <td><?= $produit->name ?></td>
                <td><?= $produit->price ?></td>
                <td><?= $produit->catName ?></td>
                <td>
                    <div>
						<form method="get" action="src/views/read.php" class="form-inline">
							<input type="number" name="id" value="<?= $produit->id ?>" readonly hidden>
							<input type="text" name="action" value="lire" readonly hidden>
							<button class="btn btn-primary mr-1" type="submit"><i class="fa fa-bars" aria-hidden="true"></i> Lire</button>
						</form>
						<form method="get" action="src/views/update.php" class="form-inline">
							<input type="number" name="id" value="<?= $produit->id ?>" readonly hidden>
							<input type="text" name="action" value="modify" readonly hidden>
							<button class="btn btn-warning mr-1" type="submit"><i class="fa fa-spinner" aria-hidden="true"></i> Modifier</button>
						</form>
						<form method="get" action="src/views/delete.php" class="form-inline">
							<input type="number" name="id" value="<?= $produit->id ?>"  readonly hidden>
							<input type="text" name="action" value="delete" readonly hidden>
							<button class="btn btn-danger mr-1" type="submit"><i class="fa fa-minus-square" aria-hidden="true"></i> Supprimer</button>
						</form>	
                    </div>
                </td>
            </tr>
            <?php
			}
			?>
		</tbody>
	</table>
	<a href="src/views/addProd.php">Cliquez ici pour ajouter un produit.</a>
</div>

<?php footer(); ?>