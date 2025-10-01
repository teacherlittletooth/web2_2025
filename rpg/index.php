<?php
//Importando arquivos
require_once "src/PersonagemDAO.php";
require_once "src/Personagem.php";

$bd = new PersonagemDAO();
//var_dump( $bd->listarTodos() );

//Inicializando sessão
session_start();

//Testando se já existe uma sessão
if( !isset( $_SESSION["rpg"] ) ) {
    $_SESSION["rpg"] = null;
}

if( $_SERVER["REQUEST_METHOD"] == "POST" ) {
    $nome = $_POST["nome"];
    $classe = $_POST["classe"];
    $forca = $_POST["forca"];
    $agilidade = $_POST["agilidade"];
    $inteligencia = $_POST["inteligencia"];

    $personagem = new Personagem(
        nome: $nome,
        classe: $classe,
        forca: $forca,
        agilidade: $agilidade,
        inteligencia: $inteligencia
    );

    try {
        $bd = new PersonagemDAO();

        if( $_POST["id"] != null || $_POST["id"] != "" ) {
            $id = $_POST["id"];
            $result = $bd->editar(intval($id), $personagem);
            $_SESSION["rpg"] = "Personagem editado!";
            var_dump($result);
        } else {
            $bd->salvar($personagem);
            $_SESSION["rpg"] = "Personagem registrado!";
        }
    } catch(Exception $erro) {
        $_SESSION["rpg"] = "Ocorreu algum erro.";
    }

    //var_dump( $_SESSION["rpg"] );
    echo "<script>
            alert('{$_SESSION["rpg"]}');
            //window.location.replace('index.php');
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
    <h1 id="titulo">Novo personagem</h1>

    <form action="#" method="post">
        <input type="hidden" name="id" id="id">

        <input type="text" name="nome" id="nome" placeholder="Nome do personagem" required>

        <br><br>

        <select name="classe" id="classe" required>
            <option value="">Selecione uma classe...</option>
            <option value="Mago">Mago</option>
            <option value="Orc">Orc</option>
            <option value="Paladino">Paladino</option>
            <option value="Ladino">Ladino</option>
            <option value="Guerreiro">Guerreiro</option>
        </select>

        <br><br>

        <label for="forca">Força:</label>
        <input type="range" name="forca" id="forca" min="1" max="30" step="1">

        <br><br>

        <label for="agilidade">Agilidade:</label>
        <input type="range" name="agilidade" id="agilidade" min="1" max="30" step="1">

        <br><br>

        <label for="inteligencia">Inteligência:</label>
        <input type="range" name="inteligencia" id="inteligencia" min="1" max="10" step="1">

        <br><br>

        <input type="submit" value="Registrar" id="btn-submit">
        <button id="btn-cancelar" onclick="restaurar()"> Cancelar edição </button>
    </form>

    <hr>

    <section id="lista">
    <h3>Lista de personagens</h3>
    <table>
        <thead>
            <th>COD</th>
            <th>NOME</th>
            <th>CLASSE</th>
            <th>FORÇA</th>
            <th>AGILIDADE</th>
            <th>INTELIGÊNCIA</th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            <?php foreach( $bd->listarTodos() as $p ) : ?>
                <tr>
                    <td> <?= $p[0] ?> </td>
                    <td> <?= $p[1] ?> </td>
                    <td> <?= $p[2] ?> </td>
                    <td> <?= $p[3] ?> </td>
                    <td> <?= $p[4] ?> </td>
                    <td> <?= $p[5] ?> </td>
                    <td> 
                        <button onclick="editar(
                                            <?= $p[0] ?>,
                                            '<?= $p[1] ?>',
                                            '<?= $p[2] ?>',
                                            <?= $p[3] ?>,
                                            <?= $p[4] ?>,
                                            <?= $p[5] ?>
                                        )"> Alterar </button> 
                    </td>
                    <td>
                        <button onclick="excluir(<?= $p[0] ?>, '<?= $p[1] ?>')">Excluir</button>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
        
    </table>
    </section>

    <script>
        //Mapeando componentes html
        const titulo = document.getElementById("titulo");
        const campoNome = document.getElementById("nome");
        const campoClasse = document.getElementById("classe");
        const campoForca = document.getElementById("forca");
        const campoAgilidade = document.getElementById("agilidade");
        const campoInteligencia = document.getElementById("inteligencia");
        const btnAlterar = document.getElementById("btn-alterar");
        const btnCancelar = document.getElementById("btn-cancelar");
        const lista = document.getElementById("lista");
        const btnSubmit = document.getElementById("btn-submit");
        const campoId = document.getElementById("id");

        //Escondendo o botão de cancelar edição
        btnCancelar.style.display = "none";

        function editar(id, nome, classe, forca, agilidade, inteligencia) {
            btnCancelar.style.display = "inline";
            lista.style.display = "none";
            titulo.innerHTML = "Editar personagem";
            btnSubmit.value = "Atualizar";
            campoId.value = id;
            campoNome.value = nome;
            campoClasse.value = classe;
            campoForca.value = forca;
            campoAgilidade.value = agilidade;
            campoInteligencia.value = inteligencia;
        }

        function restaurar() {
            window.location.reload();
        }

        function excluir(id, nome) {
            if( confirm("Excluir o personagem " + nome + "?") ) {
                window.location.replace("exclui-personagem.php?id=" + id)
            }
        }
    </script>
</body>
</html>
