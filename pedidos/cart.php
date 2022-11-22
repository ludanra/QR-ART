<?php session_start();


//empieza el carrito
if(isset($_SESSION['carrito']) || isset($_POST['nombre_prod'])){
	if(isset($_SESSION['carrito'])){
		$carrito_mio=$_SESSION['carrito'];
		if(isset($_POST['nombre_prod'])){
			$nombre_prod=$_POST['nombre_prod'];
			$precio_prod=$_POST['precio_prod'];
			$cantidad=$_POST['cantidad'];
			$cod_prod=$_POST['cod_prod'];
			$donde=-1;
			for($i=0;$i<=count($carrito_mio)-1;$i ++){
			   if($ref==$carrito_mio[$i]['cod_prod']){
			   	  //Sacamos esta linea para que no aumente la cantidad y genere una linea nueva
			   //	$donde=$i;
			   }
			}
			if($donde != -1){
				$cuanto=$carrito_mio[$donde]['cantidad'] + $cantidad;
				$carrito_mio[$donde]=array("nombre_prod"=>$nombre_prod,"precio_prod"=>$precio_prod,"cantidad"=>$cuanto,"cod_prod"=>$cod_prod);
			}else{
				$carrito_mio[]=array("nombre_prod"=>$nombre_prod,"precio_prod"=>$precio_prod,"cantidad"=>$cantidad,"cod_prod"=>$cod_prod);
			}
		}
	}else{
		$nombre_prod=$_POST['nombre_prod'];
			$precio_prod=$_POST['precio_prod'];
			$cantidad=$_POST['cantidad'];
			$cod_prod=$_POST['cod_prod'];
		$carrito_mio[]=array("nombre_prod"=>$nombre_prod,"precio_prod"=>$precio_prod,"cantidad"=>$cantidad,"cod_prod"=>$cod_prod);	
	}
	if(isset($_POST['cantidad'])){
		$id=$_POST['id'];
		$cuantos=$_POST['cantidad'];
		if($cuantos<1){
			$carrito_mio[$id]=NULL;
		}else{
			$carrito_mio[$id]['cantidad']=$cuantos;


		}
	}
	if(isset($_POST['id2'])){
		$id=$_POST['id2'];
		$carrito_mio[$id]=NULL;
	}
	


$_SESSION['carrito']=$carrito_mio;
}
//termina el carrito




 if(isset($_SESSION['carrito'])){

for($i=0;$i<=count($carrito_mio)-1;$i ++){
 if($carrito_mio[$i]!=NULL){ 
$totalc = $carrito_mio['cantidad'];
$totalc ++ ;
 $totalcantidad += $totalc;
 }}}





header("Location: ".$_SERVER['HTTP_REFERER']."");












?>
