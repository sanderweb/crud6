<!DOCTYPE html>
<?php
    include("conexao.php");
    $grupo = selectAllPessoa();    
?>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
    <h1>Agenda pessoal</h1>
    <a href="https://www.youtube.com/watch?v=t9Yoq3SfFsU&index=1&list=PLfs7O23seKWnn5YT7GarQHIAAJDgB4ZZ3" target="_blank">Video Aula</a> <br> <br>
    <a href="inserir.php">Add Pessoa</a>
    
    <table border="1">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Nascimento</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        
        <tbody>
            <?php 
                foreach ($grupo as $pessoa) { ?> 
                
                <tr>
                    <td><?=$pessoa["nome"]?></td>
                    <!-- FUNCTION ALINHA DATA E HORA 2 PASSO DD/MM/AAAA-->
                    <td><?=formataData($pessoa["nascimento"]) ?></td>
                    <td><?=$pessoa["telefone"]?></td>
                    <td><?=$pessoa["endereco"]?></td>
                    <td> 
                        <form name="alterar" action="alterar.php" method="post">
                            <input type="hidden" name="id" value="<?=$pessoa["id"] ?>" />
                            <input type="submit" value="Editar" name="editar">
                        </form>
                    </td>
                    <td>Excluir</td>
                </tr> 
                   
            <?php } ?>    
        </tbody>       
        
    </table>
    
    
    <!-- FUNCTION ALINHA DATA E HORA 1 PASSO DD/MM/AAAA-->    
    <?php 
        function formataData($data){
            $array = explode("-", $data);
            // $data = 2016-04-14
            // $array[0] = 2016, $array[1] = 04 e $array[2] = 14
            $novaData = $array[2]."/".$array[1]."/".$array[0];
            return $novaData;
        }
    
    ?>
    
</body>
</html>