<?php

session_start();

//Incluir a conexão com o BD
include_once "conexao.php";

$sql = "DELETE FROM agendamentos WHERE id='" . $_GET["id"] . "'";

if (mysqli_query($conn, $sql)) {
    echo "Desmarcado com sucesso";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
