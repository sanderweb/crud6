<?php 
if(isset($_POST["acao"])){
    if ($_POST["acao"]=="inserir"){
        inserirPessoa();    
    }
}

function abrirBanco(){
    $conexao = new mysqli("localhost", "root", "", "agenda");
    return $conexao;
}

function inserirPessoa(){
    $banco = abrirBanco();
    $banco = new mysqli("localhost", "root", "", "agenda");
    $sql = "INSERT INTO pessoa(nome, nascimento, endereco, telefone) VALUES ('{$_POST["nome"]}','{$_POST["nascimento"]}','{$_POST["endereco"]}','{$_POST["telefone"]}')";
    $banco->query($sql);
    $banco->close();
    voltarIndex();
}

function selectAllPessoa(){
    $banco = abrirBanco();
    $sql = "SELECT * FROM pessoa ORDER BY nome";
    $resultado = $banco->query($sql);
    while ($row = mysqli_fetch_array($resultado)){
        $grupo[] = $row;
    }
    
    return $grupo;
}

function voltarIndex(){

    header("Location:index.php");
}    
?>
