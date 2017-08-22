<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <h1><?php echo e($title); ?></h1>
    <h3><?php echo e($content); ?></h3>
    <p>Nome: <?php echo e($name); ?></p>
    <p>Email: <?php echo e($email); ?></p>
    <p>Telefone: <?php echo e($telefone); ?></p>
    <p>Endereco: <?php echo e($endereco); ?></p>
    <p>Complemento: <?php echo e($complemento); ?></p>
    <p>Cidade: <?php echo e($cidade); ?></p>
    <p>Estado: <?php echo e($estado); ?></p>
    <p>CEP: <?php echo e($cep); ?></p>
</div>
</body>
</html>