<?php
    include_once 'conexion.php';

    //Leer
    $sql_leer = 'SELECT * FROM colores';
    $gsend = $pdo->prepare($sql_leer);
    $gsend->execute();

    $resultado = $gsend->fetchAll();

    //Agregar
    if($_POST){
        $color = $_POST['color'];
        $descripcion = $_POST['descripcion'];

        $sql_agregar = 'INSERT INTO colores (color, descripcion) VALUES (?,?)';
        $sent_agregar = $pdo->prepare($sql_agregar);
        $sent_agregar->execute(array($color,$descripcion));

        $sent_agregar = null;
        $pdo = null;

        header('location:index.php');
    }

    //Editar
    if($_GET){
        $id = $_GET['id'];
        $sql_unico = 'SELECT * FROM colores WHERE id=?';
        $gsend_unico = $pdo->prepare($sql_unico);
        $gsend_unico->execute(array($id));

        $resultado_unico = $gsend_unico->fetch();
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <title>Etiquetas</title>
  </head>
  <body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <?php foreach($resultado as $dato): ?>
                    <div class="alert alert-<?php echo $dato['color']?> text-uppercase" role="alert">
                        <?php echo $dato['color']?>
                        -
                        <?php echo utf8_encode($dato['descripcion'])?>
                        <a href="eliminar.php?id=<?php echo $dato['id']?>" class="float-right ml-3">
                            <i class="far fa-trash-alt"></i>
                        </a>
                        <a href="index.php?id=<?php echo $dato['id']?>" class="float-right">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col-md-6">
                <?php if(!$_GET):?>
                    <h2>Agregar Etiquetas</h2>
                    <form method="POST">
                        <input type="text" name="color" class="form-control">
                        <input type="text" name="descripcion" class="form-control mt-3">
                        <button class="btn btn-primary mt-3">Agregar</button>
                    </form>
                <?php endif ?>

                <?php if($_GET):?>
                    <h2>Editar Etiquetas</h2>
                    <form method="GET" action="editar.php">
                        <input type="text" name="color" class="form-control" value="<?php echo $resultado_unico['color']?>">
                        <input type="text" name="descripcion" class="form-control mt-3" value="<?php echo utf8_encode($resultado_unico['descripcion'])?>">
                        <input type="hidden" name="id" value="<?php echo $resultado_unico['id']?>">
                        <button class="btn btn-primary mt-3">Editar</button>
                    </form>
                <?php endif ?>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>

<?php
    $pdo = null;
    $gsent = null;
?>