<?php
$usuario=$_POST['usuario'];
$contrasena=$_POST['contrasena'];
session_start();
$_SESSION['usuario']=$usuario;

$conexion=mysqli_connect("localhost","root","","hackathon"); 

$consulta= "SELECT*FROM perfiles where usuario='$usuario' and contrasena='$contrasena'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
    header("location:home.php");
}else{
    ?>
    <?php
    include("index.html");
    ?>
    <h1 class="bad">ERROR EN LA AUTENTIFICACIÓN</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);