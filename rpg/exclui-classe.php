<?php

if( isset($_GET["id"]) ) {
    require_once "src/ClasseDAO.php";
    $bd = new ClasseDAO();
    $id = intval( $_GET["id"] );
    
    try {
        $bd->apagar($id);
        echo "<script>
                alert('✅ Classe excluída!');
                window.location.replace('classe.php');
            </script>";
    } catch(Exception $erro) {
        echo "<script>
                alert('❌ Ocorreu algum erro...');
                window.location.replace('classe.php');
            </script>";
    }

} else {
    header("location: classe.php");
}