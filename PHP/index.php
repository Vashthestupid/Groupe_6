<?php 

// Pas d'accents dans les noms de variables!

//variables
$nom = 'TAUVERON';
$prenom = 'Loïc';
$bool = true; // 1
$bool0 = false; // 0
$dixAns = 10;
$age = 26;
$b = '<br>';

//constantes
/*define('TVA', 20);
define('TVA10', 10);
define('TVA55', 5.5);

echo TVA;
echo $b;
echo TVA10;
echo $b;
echo TVA55;*/

//Tableau

$tab1 = [];
$tab2 = array();

$tab1 = array('toto','tata','23',19);
$tab2 = [11,'a',19,'b'];


//Tableau associatif

$tableVehicule = array(
    "X1"=>"BMW",
    "X2" => "Mercedes"

);

$tab3 = array(array("A","B"), array(1,2));

//var_dump($tab3);
foreach($tab3 as $key => $value){
    //var_dump($value);
    foreach($value as $k=>$v){
        var_dump($k);
        echo $k.' '.$v;
        echo $b;
    }
}

/*var_dump($tableVehicule);
echo $b;
foreach($tableVehicule as $key => $value){
    echo $key." ".$value.$b;
}

for($i=0; $i< count($tab1); $i++){
    echo $tab1[$i].'<br>';
}

foreach($tab1 as $key => $value){
    echo "La cle: ".$key." et sa valeur ".$value." .".$b; 
}

var_dump($tab1);
echo $b;
var_dump($tab2);*/


/*echo "<p>Je m'appelle ".$prenom." ".$nom." et j'ai ".$age." ans.</p>";

echo "<p>Age dans 10 ans = ".($age + $dixAns). ".</p>";*/

// var_dump() // servir uniquement pour les développeurs

/*var_dump($nom);
var_dump($age);
echo $b;
printf("J'ai %d ans", $age); // %d pour integer
echo $b;
printf("Je m'appelle %s", $prenom); // %s pour string
echo $b;
print_r($nom);*/

?>

<!--<p>Je m'appelle <?php echo $prenom; ?> <?php echo $nom;?> et j'ai <?php echo $age;?> ans.</p>-->