<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste de mes vehicules</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<?php
$mesVehicules = array(
    'Citroen' => 'C4',
    'Renault' => 'Clio',
    'Peugeot' => '306',
    'Nissan' => 'Juke',
    'Mercedes' => 'BENZ',
    'Volkswagen' => 'Golf',
    'Suzuki' => 'Swift',
    'Audi' => 'TT',
);
?>
    <table>
        <tr>
            <th>Marques</th>
            <th>Modeles</th>
        </tr>
<?php
foreach($mesVehicules as $marque => $modele){
?>
        <tr>
            <td><?php echo $marque;?></td>
            <td><?php echo $modele;?></td>
        </tr>
<?php
}
?>
    </table>
</body>
</html>