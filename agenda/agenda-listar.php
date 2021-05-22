<?php include "../includes/cabecalho.php"; ?>

<?php 
include "../includes/conexao.php";
$sqlBusca = "SELECT
            tb_agenda.id,
            tb_agenda.data,
            tb_agenda.hora,
            tb_medicos.nome as 'nome_medico',
            tb_agenda.sala,
            tb_pacientes.nome as 'nome_paciente'
            FROM tb_agenda
            INNER JOIN tb_pacientes ON tb_agenda.id_paciente = tb_pacientes.id
            INNER JOIN tb_medicos ON tb_agenda.id_medico = tb_medicos.id;";

$listaDeAgenda = mysqli_query($conexao , $sqlBusca);
?>

<?php if(isset($_GET['mensagem'])){
    if($_GET['mensagem'] == 'cadastrado'){ ?>
        <div class="alert alert-success">
            Cadastrado com sucesso!
        </div>
    <?php
    }
    if($_GET['mensagem'] == 'excluido'){ ?>
        <div class="alert alert-danger">
            Excluído com sucesso!
        </div>
    <?php
    }
    if($_GET['mensagem'] == 'alterado'){ ?>
        <div class="alert alert-warning">
            Alterado com sucesso!
        </div>
    <?php
    }
}
    ?>

<p>
    <a href="agenda-formulario-inserir.php" class="btn btn-success"><i class="bi bi-plus-circle"></i> Agendar consulta</a>
</p>

<div class="table-responsive">
    <table class="table table-hover table-success">
        <thead>
            <tr>
                <th>ID</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Médico</th>
                <th>Sala</th>
                <th>Paciente</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($agenda = mysqli_fetch_assoc($listaDeAgenda)){
                echo "<tr>";
                echo "<td>{$agenda['id']}</td>";
                $dataBrasil = date('d/m/Y', strtotime($agenda['data']));
                echo "<td>{$dataBrasil}</td>";
                echo "<td>{$agenda['hora']}</td>"; 
                echo "<td>{$agenda['nome_medico']}</td>";
                echo "<td>{$agenda['sala']}</td>";
                echo "<td>{$agenda['nome_paciente']}</td>";
                echo "<td><a href='agenda-formulario-alterar.php?id_agenda={$agenda['id']}' class='btn btn-warning'><i class='bi bi-pencil'></i></a> ";
                echo "<a href='agenda-excluir.php?id_agenda={$agenda['id']}' class='btn btn-danger'><i class='bi bi-x-lg'></i></a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include "../includes/rodape.php"; ?>