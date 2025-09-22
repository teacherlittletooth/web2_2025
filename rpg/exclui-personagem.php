<?php

if( isset( $_GET["id"] ) ) {
    require_once "src/PersonagemDAO.php";

    $bd = new PersonagemDAO();

    $id = intval( $_GET["id"] );

    $result = $bd->apagar($id);

    if( $result ) {
        echo "<script>
                alert('✅ Personagem excluído!');
                window.location.replace('index.php');
            </script>";
    } else {
        echo "<script>
                alert('❌ Ocorreu algum erro.');
                window.location.replace('index.php');
            </script>";
    }
} else {
    header("location: index.php");
}