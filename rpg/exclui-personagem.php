<?php

if( isset($_GET["id"]) ) {
    require_once "src/PersonagemDAO.php";
    $bd = new PersonagemDAO();
    $id = intval( $_GET["id"] );
    
    try {
        $bd->apagar($id);
        echo "<script>
                alert('✅ Personagem excluído!');
                window.location.replace('index.php');
            </script>";
    } catch(Exception $erro) {
        echo "<script>
                alert('❌ Ocorreu algum erro...');
                window.location.replace('index.php');
            </script>";
    }

} else {
    header("location: index.php");
}