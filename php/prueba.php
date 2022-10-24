<?php
$servername="localhost";
$username="root";
$password="";
$dbname="base";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "SELECT * FROM `roles`";

$query = $conn->query($sql);

$rolusuario=3;   // rol del usuario que esta en la tabla agenda, este dato se debe obtener con un select de agenda 
				// para simplificar se puso a mano

$combo = 'ID: <select class="selector" name="roles" >\n';

while ($datos = mysqli_fetch_assoc($query)){

    $selected = '';
    if ($rolusuario == $datos['codigorol']){
        $selected = 'selected';
    }

    $combo .= '<option value="'.$datos['codigorol'].'"" '.$selected.'>'.$datos['descripcionrol'].'</option>\n';
}
$combo .= "</select>";
echo $combo;
?>