<?php
include '../views/elements/head.php';
include '../views/elements/footer.php';
include '../config/config.php';
include '../models/connect.php';

head();

$db=connection();
$sqlSelect='SELECT products.id,products.name,products.price, categories.name AS catName
         FROM products
         INNER JOIN categories ON products.category_id= categories.id';
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
			<th scope="col">Name</th>
			<th scope="col">Price</th>
			<th scope="col">Category</th>
			<th scope="col">Actions</th>
		</tr>
		</thead>
		<tbody>
			<?php foreach ($listeProduits as $product)
            { ?>
            <tr>
                <th scope="row"><?= $product->id ?></th>
                <td><?= $product->name ?></td>
                <td><?= $product->price ?></td>
                <td><?= $product->catName ?></td>
                <td>
                    <div>
                        <form method="get" action="src/views/traitement.php" class="form-inline">
                            <input type="number" value="<?= $product->id ?>" name="id" readonly="readonly" class="d-none"/>
                            <input type="text" value="read" name="action" class="d-none"/>
                            <button class="btn btn-primary" type="submit"><i class="fa fa-bars" aria-hidden="true"></i> Lire</button>
                        </form>
                        <form method="get" action="src/views/traitement.php" class="form-inline">
                            <input type="number" value="<?= $product->id ?>" name="id" readonly="readonly" class="d-none"/>
                            <input type="text" value="modify" name="action" class="d-none"/>
                            <button class="btn btn-warning" type="submit"><i class="fa fa-spinner" aria-hidden="true"></i> Modifier</button>
                        </form>
                        <form method="get" action="src/views/traitement.php" class="form-inline" >
                            <input type="number" value="<?= $product->id ?>" name="id" readonly="readonly" class="d-none"/>
                            <input type="text" value="delete" name="action" class="d-none"/>
                            <button class="btn btn-danger" type="submit"><i class="fa fa-minus-square" aria-hidden="true"></i> Supprimer</button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php
			}
			?>
		</tbody>
	</table>
</div>

<?php footer(); ?>