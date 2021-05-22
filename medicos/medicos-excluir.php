<?php 

include "../includes/conexao.php";

$id_medico = $_GET['id_medico'];

$sqlExcluir = "DELETE FROM tb_medicos WHERE id = {$id_medico}";

$resultado = mysqli_query($conexao, $sqlExcluir);

if($resultado){
    header('Location: medicos-listar.php');
}else{
    echo "Ocorreu algum problema";
}
?>