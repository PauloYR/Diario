<?php
session_start();
$_SESSION["id"] = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1.0"
        name="viewport">
  <meta content="ie=edge"
        http-equiv="X-UA-Compatible">
  <link href="https://fonts.googleapis.com/css?family=Anton"
        rel="stylesheet">
    <link rel="stylesheet" href="css/uikit.min.css" />
    
  <title>Document</title>
</head>
<body>
  <style>
        body{
            background: #000;
            
            font-family: 'Anton', sans-serif;
            
        }
        .circulo{
            stroke-dasharray:345;
            animation: giros 4.0s infinite;
        }
        @keyframes giros {
            to{
                stroke-dashoffset:2760;
            }
        }
        #comentarios{
            color:white;
            align-items:center;
            justify-content:center;
            margin-left: 400px;
        }
        
        #texto{
            font-size: 30px;
            animation: texto 1.0s infinite;
        }
        @keyframes texto{
            0%{

            }
            50%{
                opacity: 0;
                
            }
            100%{

            }
        }
        .svg{
            height:300px;
            width:300px
        }
        .circulo{
            stroke: #4151CC;
        }
  </style>
  <form action=""
        id="form"
        method="post"
        name="form">
    <input class="comentario"
          id="comentario"
          name="comentario"
          type="text"> 
    <input id="enviar"
          type="submit">
  </form>
  <br>

  <div id="comentarios"></div>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="js/uikit.min.js"></script>
  <script src="js/uikit-icons.min.js"></script> 
  <script>
    <?php echo "alert(\"{$_SESSION['id']}\");"; ?>
    fetch('preloder.php')
            .then((response) => {
                response.text().then((texto) => {
                    document.getElementById('comentarios').innerHTML = texto;
                })
            })
        setTimeout("lerolero()", 4000);
        function lerolero() {
        fetch('comentarios.php')
            .then((response) => {
                response.text().then((texto) => {
                    document.getElementById('comentarios').innerHTML = texto;
                })
            })
        }
        
    
    $('#enviar').on('click',function(e){
        e.preventDefault();
        var form = $('#form')[0];
        var formData = new FormData(form);
    /*TESTE:*/
        $.ajax({
            url:'upload.php',
            type: 'POST', 
            data: formData, 
            processData: false, 
            contentType: false, 
            success:function(data){
            //Preloader
            fetch('preloder.php')
                .then((response) => {
                    response.text().then((texto) => {
                        document.getElementById('comentarios').innerHTML = texto;
                    })
                })
            //intervalo
            setTimeout("lerolero()", 4000);
            function lerolero() {
            fetch('comentarios.php')
                .then((response) => {
                    response.text().then((texto) => {
                        document.getElementById('comentarios').innerHTML = texto;
                    })
                })
            }
            //Zera o comentario
            var comentario = document.getElementById('comentario');
            comentario.value = "";
            }
        });
    });
    
</script>
</body>
</html>
