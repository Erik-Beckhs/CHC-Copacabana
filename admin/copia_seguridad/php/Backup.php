    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../../alertifyjs/css/alertify.css">
        <link rel="stylesheet" href="../../alertifyjs/css/themes/default.css">
        <script src="../../alertifyjs/alertify.js"></script>
    </head>
    <body>
        
    </body>
    </html>
    
<?php
include './Connet.php';
$day=date("d");
$mont=date("m");
$year=date("Y");
$hora=date("H-i-s");
$fecha=$day.'_'.$mont.'_'.$year;
$DataBASE=$fecha."_(".$hora."_hrs).sql";
$tables=array();
$result=SGBD::sql('SHOW TABLES');
if($result){
    while($row=mysqli_fetch_row($result)){
       $tables[] = $row[0];
    }
    $sql='SET FOREIGN_KEY_CHECKS=0;'."\n\n";
    $sql.='CREATE DATABASE IF NOT EXISTS '.BD.";\n\n";
    $sql.='USE '.BD.";\n\n";;
    foreach($tables as $table){
        $result=SGBD::sql('SELECT * FROM '.$table);
        if($result){
            $numFields=mysqli_num_fields($result);
            $sql.='DROP TABLE IF EXISTS '.$table.';';
            $row2=mysqli_fetch_row(SGBD::sql('SHOW CREATE TABLE '.$table));
            $sql.="\n\n".$row2[1].";\n\n";
            for ($i=0; $i < $numFields; $i++){
                while($row=mysqli_fetch_row($result)){
                    $sql.='INSERT INTO '.$table.' VALUES(';
                    for($j=0; $j<$numFields; $j++){
                        $row[$j]=addslashes($row[$j]);
                        $row[$j]=str_replace("\n","\\n",$row[$j]);
                        if (isset($row[$j])){
                            $sql .= '"'.$row[$j].'"' ;
                        }
                        else{
                            $sql.= '""';
                        }
                        if ($j < ($numFields-1)){
                            $sql .= ',';
                        }
                    }
                    $sql.= ");\n";
                }
            }
            $sql.="\n\n\n";
        }else{
            $error=1;
        }
    }
    if($error==1){
        echo 'Ocurrio un error inesperado al crear la copia de seguridad';
    }else{
        chmod(BACKUP_PATH, 0777);
        $sql.='SET FOREIGN_KEY_CHECKS=1;';
        $handle=fopen(BACKUP_PATH.$DataBASE,'w+');
        if(fwrite($handle, $sql)){
            fclose($handle);
            header("location:index.php?success=1");
        }else{
            header("location:index.php?success=0");
        }
    }
}else{
    echo 'Ocurrio un error inesperado';
}
mysqli_free_result($result);