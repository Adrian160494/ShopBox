<?php
require_once "classes/DataBaseProducts.php";

$db= new DataBaseProducts();

$db_connect= $db->createConnection();

$name = ["Chleb",'Myszka','Klawiatura',"Parasol","Radio"];
$descritpion = ["Bardzo przydatny produkt, pomaga w pracy oraz czynnościach codziennych. Nie zastąpiony :)","Na brzydką pogode idealny. Wykonany z najlepszych i najtrwalszych materiałów","Czerwona, z lekkim połyskiem przyciąga każde spojrzenie, idealne do domu oraz do pracy.","Na zabicie czasu i głodu najlepszy. Można komponować z dodatkami czy bez, i tak jest najlepszy!","Poprostu jedno slowo, najlepszy i nie zastąpiony!"];
$image = ["img/radio.png","img/bread.png","img/keyboard.png","img/mouse.png","img/umbrela.png"];
$category = ["Telecomunication","Computers","Driving","Wheater","Music"];
$price = ["24.99","53.40","10.45","5.20","8.99"];

for($i=0;$i<5;$i++){
    for($n=0;$n<5;$n++){
        for($k=0;$k<5;$k++){
             $nameTo= $name[$i];
             $descriptionTo =$descritpion[$n];
             $imageTo =$image[$k];
             $categoryTo = $category[$n];
             $priceTo = $price[$k];
            $db->addProduct($db_connect,$nameTo,$descriptionTo,$imageTo,$categoryTo,$priceTo);
        }

    }
}

?>