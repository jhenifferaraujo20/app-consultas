<?php include "../includes/cabecalho.php"; ?>

<p>
    <a href="medicos-formulario-inserir.php" class="btn btn-success">Novo médico</a>
</p>

<?php
include "../includes/conexao.php";

$sqlBusca = "SELECT * FROM tb_medicos;";
$listaDeMedicos = mysqli_query($conexao , $sqlBusca);
?>

<div class="table-responsive">
    <table class="table table-hover table-success">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>CRM</th>
                <th>Especialidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($medico = mysqli_fetch_assoc($listaDeMedicos)){
                echo "<tr>";
                echo "<td>{$medico['id']}</td>";
                echo "<td>{$medico['nome']}</td>";
                echo "<td>{$medico['telefone']}</td>";
                echo "<td>{$medico['crm']}</td>"; 
                echo "<td>{$medico['especialidade']}</td>";
                echo "<td><a href='medicos-formulario-alterar.php?id_medico={$medico['id']}' class='btn btn-success'>Alterar</a> ";
                echo "<a href='medicos-excluir.php?id_medico={$medico['id']}' class='btn btn-danger'>Excluir</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include "../includes/rodape.php"; ?>