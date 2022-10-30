<?php
error_reporting(0);

if(isset($_POST['submit2']))
{
$fname=$_POST['fname'];
$dni=$_POST['dni'];
$mnumber=$_POST['mobilenumber'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$sql="INSERT INTO  usuario(nombrecom,email,pass,telefono, dni, idtipou) VALUES('$fname','$email','$pass', '$mnumber', '$dni', 3)";
$query = $dbh->prepare($sql);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
session_start();
$_SESSION['login']=$email;
$idcli=$lastInsertId;

$archivoActual = $_SERVER['PHP_SELF'];
header("refresh:1;url=".$archivoActual);

?>
<script type="text/javascript">
            $(window).load(function(){
                $('#myModalCalificaAtr').modal('show');
            });
</script>

<?php
}

}

?>

    <script type="text/javascript">
    $(document).ready(function(){
        $('#solicitaA').click(function(){
          rating=$('#rating2').val();
          comentario=$('#comentA').val();
          idcli=$('#idcliA').val();
          idat=$('#idat').val();
          agregarcomentarioA(rating,comentario,idcli, idat);
        });
    });
</script>