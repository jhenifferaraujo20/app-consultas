<?php 
include "../includes/cabecalho.php" ; 
include "../includes/conexao.php";

$id_agenda = $_GET['id_agenda'];

$sqlBuscar = "SELECT * FROM tb_agenda WHERE id={$id_agenda};";

$listaDeAgenda = mysqli_query($conexao , $sqlBuscar);

$data = $hora = $id_medico = $sala = $id_paciente = "";

while($agenda = mysqli_fetch_assoc($listaDeAgenda)){
    $data = $agenda['data'];
    $hora = $agenda['hora'];
    $id_medico = $agenda['id_medico'];
    $sala = $agenda['sala'];
    $id_paciente = $agenda['id_paciente'];
}
?>

<h2 class="text-center mb-5">Alterar consulta</h2>
<form name="formulario-alterar-consulta" method="post" action="agenda-alterar.php">
    <input name="id_agenda" type="hidden" value="<?php echo $id_agenda;?>">
    <div class="row justify-content-center">
        <p class="col-md-4">
            <label class="form-label">Data</label><br>
            <input type="date" name="data" class="form-control" required value="<?php echo $data;?>">
        </p>
        <p class="col-md-4">
            <label class="form-label">Hora</label><br>
            <input type="time" name="hora" class="form-control" min="08:00" max="18:00" required value="<?php echo $hora;?>">
        </p>
        <p class="col-md-2">
            <label class="form-label">Sala</label><br>
            <select name="sala" class="form-select" required>
                <option value="1" <?php if($sala == '1'){ echo "selected "; } ?>>1</option>
                <option value="2" <?php if($sala == '2'){ echo "selected "; } ?>>2</option>
                <option value="3" <?php if($sala == '3'){ echo "selected "; } ?>>3</option>
            </select>
        </p>
    </div>
    <div class="row justify-content-center">
        <p class="col-md-5">
            <label class="form-label">Médico</label><br>
            <select name="id_medico" class="form-select" required>
                <?php 
                $sqlBuscaMedicos = "SELECT * FROM tb_medicos";
                $listaDeMedicos = mysqli_query($conexao, $sqlBuscaMedicos);

                while($medico = mysqli_fetch_assoc($listaDeMedicos)){
                    if($id_medico == $medico['id']){
                        echo "<option value='{$medico['id']}' selected>";
                    }else{
                        echo "<option value='{$medico['id']}'>";
                    }
                    echo $medico['nome'];
                    echo "</option>";
                }
                ?>
            </select>
        </p>
    
        <p class="col-md-5">
            <label class="form-label">Paciente</label><br>
            <select name="id_paciente" class="form-select" required>
            <?php 
                $sqlBuscaPacientes = "SELECT * FROM tb_pacientes";
                $listaDePacientes = mysqli_query($conexao, $sqlBuscaPacientes);

                while($paciente = mysqli_fetch_assoc($listaDePacientes)){
                    if($id_paciente == $paciente['id']){
                        echo "<option value='{$paciente['id']}' selected>";
                    }else{
                        echo "<option value='{$paciente['id']}'>";
                    }
                    echo $paciente['nome'];
                    echo "</option>";
                }
                ?>
            </select>
        </p>
    </div>
    <div class="row justify-content-end">
        <p class="col-md-2">
            <button type="subtmit" class="btn btn-success">Agendar</button>
        </p>
    </div>
</form>

<?php include "../includes/rodape.php" ; ?>