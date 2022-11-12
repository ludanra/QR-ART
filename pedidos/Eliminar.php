<?php

session_start();
$array = $_SESSION['carrito'];

for($i=0;$i<count($array);$i++){

    if($array[$i]['cod_prod'] != $_POST['cod']){

        $arraynuevo[]=array(


            'cod'=>$array[$i]['cod_prod'],
            'nombre'=>$array[$i]['nombre'],
            'precio'=>$array[$i]['precio'],
            'foto'=>$array[$i]['foto'],
            'cantidad'=>$array[$i]['cantidad'],

        );

    }
}

if(isset($arraynuevo)){

    $_SESSION['carrito']=$arraynuevo;
}else{
    unset($_SESSION['carrito']);
}

echo "Eliminado";





?>