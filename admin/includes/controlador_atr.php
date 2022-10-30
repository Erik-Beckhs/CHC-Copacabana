<?php
    //var_dump($_POST);
    $estado=$_POST['estado'];
    $id=$_POST['id'];
    include("config.php");
        if($estado==1)
        {
            $newest=0;
        }
        else{
            $newest=1;
        }
        $sql="update atractivo set activo=$newest where ID = $id";
        $query=$dbh->prepare($sql);
        $query->execute();
        header("location:../manage-attractives.php?estado=$estado&cambio=1");
        if($query->execute()):
            ?>
        <script>
        alertify.success("Eliminado con exito!");
        </script>
        <?php endif
?>
