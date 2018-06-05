<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet"> 
    <title>Document</title>
</head>
<body>
    <style>
        body{
            background:#000;
            
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
        }
        
        #texto{
            font-size: 30px;
            animation: texto 1.0s infinite;
        }
        @keyframes texto{
            50%{
                opacity: 0;
            }
        }
        .svg{
            height:300px;
            width:300px
        }
    </style>
    
    <form method="post" action="" id="form">
        <input type="text" name="comentario" class="comentario" id="comentario">
        <input type="submit" id="enviar">
    </form>
    <br/>
    <div id="comentarios">
        
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script> 
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
</html>