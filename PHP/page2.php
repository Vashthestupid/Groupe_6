<?php
$nom = 'TAUVERON';
$prenom = 'Loïc';
$bool = true; // 1
$bool0 = false; // 0
$dixAns = 10;
$age = 26;
$b = '<br>';

//Construction d'un if/else
/*if($nom == $prenom){
    echo "T'es parents ne se sont pas foulés";
}else{
    echo "OK";
}*/

//On peut aussi utiliser des elsif autant de fois que l'on veut

/* 
if(){

}elseif(){

} elseif(){

} else {

}
*/

// Exercice 1

$tab1 = array('Mercedes','Renault','Peugeot','Audi','BMW');

foreach($tab1 as $key => $value){
    echo $value.$b;
}

// Exercice 2

$tab2 = array(
    'Apple' => 'Iphone 11',
    'Samsung' => 'Galaxy S10',
    'HTC'=> 'One X'
);

echo $b;

foreach($tab2 as $key => $value){
    echo $key." => ".$value.$b;
    //echo $key." ".$value."<br>";
}

?>