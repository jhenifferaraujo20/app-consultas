<?php 
include "../includes/cabecalho.php"; 
include "../includes/conexao.php";
?>

<h2 class="text-center mb-5">Agendar consulta</h2>
<form name="formulario-inserir-consulta" method="post" action="agenda-inserir.php">
    <div class="row justify-content-center">
        <p class="col-md-4">
            <label class="form-label">Data</label><br>
            <input type="date" name="data" class="form-control" required>
        </p>
        <p class="col-md-4">
            <label class="form-label">Hora</label><br>
            <input type="time" name="hora" class="form-control" min="08:00" max="18:00" required>
        </p>
        <p class="col-md-2">
            <label class="form-label">Sala</label><br>
            <select name="sala" class="form-select" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
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
                    echo "<option value='{$medico['id']}'>";
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
                    echo "<option value='{$paciente['id']}'>";
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