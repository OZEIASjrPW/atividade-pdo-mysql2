<?php
require_once './vendor/autoload.php';

use AtividadePDOMySQL\MySQLConnection; //PDO

$bd = new MySQLConnection(); //PDO('mysql:host=localhost;dbname=biblioteca', 'root', '');

$comando = $bd->prepare('SELECT * FROM generos');
$comando->execute();

$generos = $comando->fetchALL(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Biblioteca</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <main class="container">
            <a class="btn btn-primary" href='insert.php'>Novo Gênero</a>
            <table class="table">
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach($generos as $g): ?>
                    <tr>
                        <td><?=$g['id'] ?></td>
                        <td><?=$g['nome'] ?></td>
                        <td>
                            <a class="btn btn-secondary" href="update.php?id=<?= $g['id'] ?>">Editar</a>
                            <a class="btn btn-danger" href="delete.php?id=<?= $g['id'] ?>">Remover</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
         </main>
    </body>
</html>




