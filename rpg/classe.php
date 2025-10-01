<?php
//Importando arquivos
require_once "src/ClasseDAO.php";
require_once "src/Classe.php";

$bd = new ClasseDAO();
//var_dump( $bd->listarTodos() );

//Inicializando sessão
session_start();

//Testando se já existe uma sessão
if( !isset( $_SESSION["rpg"] ) ) {
    $_SESSION["rpg"] = null;
}

if( $_SERVER["REQUEST_METHOD"] == "POST" ) {
    $classe = $_POST["classe"];
    $caracteristicas = $_POST["caracteristicas"];

    $objClasse = new Classe(
        classe: $classe,
        caracteristicas: $caracteristicas
    );

    try {
        if( $_POST["id"] != null || $_POST["id"] != "" ) {
            $id = $_POST["id"];
            $result = $bd->editar(intval($id), $objClasse);
            $_SESSION["rpg"] = "Classe editada!";
            var_dump($result);
        } else {
            $bd->salvar($objClasse);
            $_SESSION["rpg"] = "Classe registrada!";
        }
    } catch(Exception $erro) {
        $_SESSION["rpg"] = "Ocorreu algum erro.";
    }

    //var_dump( $_SESSION["rpg"] );
    echo "<script>
            alert('{$_SESSION["rpg"]}');
            window.location.replace('classe.php');
          </script>";
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RPG</title>
</head>
<body>
    <a href="index.php">Voltar para personagens</a>

    <h1 id="titulo">Nova classe</h1>

    <form action="#" method="post">
        <input type="hidden" name="id" id="id">

        <input type="text" name="classe" id="classe" placeholder="Nome da classe" required>

        <br><br>

        <textarea name="caracteristicas" id="caracteristicas" cols="30" rows="4" placeholder="Características da classe"></textarea>

        <br><br>

        <input type="submit" value="Registrar" id="btn-submit">
    </form>
    <br>
    <button id="btn-cancelar" onclick="restaurar()"> Cancelar edição </button>

    <hr>

    <section id="lista">
    <h3>Lista de classes</h3>
    <table>
        <thead>
            <th>COD</th>
            <th>CLASSE</th>
            <th>CARACTERÍSTICAS</th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            <?php foreach( $bd->listarTodos() as $c ) : ?>
                <tr>
                    <td> <?= $c[0] ?> </td>
                    <td> <?= $c[1] ?> </td>
                    <td> <?= $c[2] ?> </td>
                    <td> 
                        <button onclick="editar(
                                            <?= $c[0] ?>,
                                            '<?= $c[1] ?>',
                                            '<?= $c[2] ?>'
                                        )"> Alterar </button> 
                    </td>
                    <td>
                        <button onclick="excluir(<?= $c[0] ?>, '<?= $c[1] ?>')">Excluir</button>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
        
    </table>
    </section>

    <script>
        //Mapeando componentes html
        const titulo = document.getElementById("titulo");
        const campoClasse = document.getElementById("classe");
        const campoCaracteristicas = document.getElementById("caracteristicas");
        const btnAlterar = document.getElementById("btn-alterar");
        const btnCancelar = document.getElementById("btn-cancelar");
        const lista = document.getElementById("lista");
        const btnSubmit = document.getElementById("btn-submit");
        const campoId = document.getElementById("id");

        //Escondendo o botão de cancelar edição
        btnCancelar.style.display = "none";

        function editar(id, classe, caracteristicas) {
            btnCancelar.style.display = "inline";
            lista.style.display = "none";
            titulo.innerHTML = "Editar classe";
            btnSubmit.value = "Atualizar";
            campoId.value = id;
            campoClasse.value = classe;
            campoCaracteristicas.value = caracteristicas;
        }

        function restaurar() {
            window.location.reload();
        }

        function excluir(id, classe) {
            if( confirm("Excluir a classe " + classe + "?") ) {
                window.location.replace("exclui-classe.php?id=" + id)
            }
        }
    </script>
</body>
</html>
