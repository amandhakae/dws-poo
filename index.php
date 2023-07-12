<?php

//require_once('./Core/Animais/Animal.php');
require_once('./Core/Animais/Animal.php');
require_once('./Core/Banco/Conexao.php');

echo "<h1>localhost/dsw-poo</h1>";
$conexao = new Conexao("localhost", "root", "", "animais");

echo '<br>';

if (isset($_GET["salvar"]) && is_numeric($_GET['salvar'])) {
    $animal->getById($_GET['salvar']);
}

if (isset($_GET["editar"]) && is_numeric($_GET['editar'])) {
    $animal->getById($_GET['editar']);
}

if (isset($_GET["excluir"]) && is_numeric($_GET['excluir'])) {
    $animal->getById($_GET['excluir']);
}


?>

<html>

<body>

    $animal = new Animal($conexao);
    $animal->getAll();
    $animal->getById(1);

    ?>
    <html>

    <body>
        <form action="./index.php" method="POST" 
        style="padding-top: 30px;">
        <input type="hidden" name="salvar" value="0">
            <div style="padding: 5px;">
                <label>Nome</label>
                <input type="text" value="">
            </div style="padding: 5px;">
            <div>
                <label>Quantidade de patas</label>
                <input type="text" value="">
            </div style="padding: 5px;">
            <div>
                <label>Tipo</label>
                <input type="text" value="">
            </div>
            <div>
                <button type="submit" name="salvar">Salvar</button>
            </div>
        </form>
    </body>

    </html>