<?php 

include "../includes/conexao.php";

$id_paciente = $_GET['id_paciente'];

$sqlExcluir = "DELETE FROM tb_pacientes WHERE id = {$id_paciente}";

$resultado = mysqli_query($conexao, $sqlExcluir);

if($resultado){
    echo "Excluído com sucesso <br>";
    echo "<a href='pacientes-listar.php'>Voltar</a>";
}else{
    echo "Ocorreu algum problema";
}
?>