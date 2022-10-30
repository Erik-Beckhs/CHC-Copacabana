<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../alertifyjs/css/alertify.css">
    <link rel="stylesheet" href="../alertifyjs/css/themes/default.css">

    
    <script src="../js/jquery-2.1.4.min.js"></script>
    <script src="../alertifyjs/alertify.js"></script>

    <title>Document</title>
</head>
<body>
    <button id="ejecuta">Ver Alertify</button>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        $('#ejecuta').click(function(){
            //alertify.success('mensaje de exito');
            alert('mensaje de exito');
        });
    })
</script>