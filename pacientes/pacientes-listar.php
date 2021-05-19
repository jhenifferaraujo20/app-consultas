<?php include "../includes/cabecalho.php"; ?>

<p>
    <a href="pacientes-formulario-inserir.php" class="btn btn-success">Novo paciente</a>
</p>

<?php
include "../includes/conexao.php";

$sqlBusca = "SELECT * FROM tb_pacientes;";
$listaDePacientes = mysqli_query($conexao , $sqlBusca);
?>

<div class="table-responsive">
    <table class="table table-hover table-success">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Data de nascimento</th>
                <th>Convênio</th>
                <th>Diagnóstico</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($paciente = mysqli_fetch_assoc($listaDePacientes)){
                echo "<tr>";
                echo "<td>{$paciente['nome']}</td>";
                echo "<td>{$paciente['telefone']}</td>";
                $dataBrasil = date('d/m/Y', strtotime($paciente['data_nascimento']));
                echo "<td>{$dataBrasil}</td>";
                echo "<td>{$paciente['convenio']}</td>"; 
                echo "<td>{$paciente['diagnostico']}</td>";
                echo "<td><a href='pacientes-formulario-alterar.php?id_paciente={$paciente['id']}' class='btn btn-success'>Alterar</a> ";
                echo "<a href='pacientes-excluir.php?id_paciente={$paciente['id']}' class='btn btn-danger'>Excluir</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include "../includes/rodape.php"; ?>