<?php
require_once '../Controller/connection.php';
require_once 'task_reports.php';
require_once '../Model/NovaTarefa.php';
require_once '../Model/VerStage.php';

    // Deixando a entrada "tarefa"
    //com uma informação qualquer, para não gerar erro
    $dados= array(
        'tarefa'=>'',
        );

        //Caso haja um erro
        $erros_validacao=array();

    $tarefa = new NovaTarefa;

    // variáveis de confirmação se todos os requisitos foram preenchidos
        $confTarefa=false;
    //contador de itens
        $contador=0;

    if (isset($_POST['tarefa']) && $_POST['tarefa'] !='')
    {
        $dados = array();

        $tarefa->setTarefa($_POST['tarefa']);
        $tarefaGet=$tarefa->getTarefa();
        if (isset($tarefaGet))
        {
            $dados['tarefa']=$tarefaGet;
            $confTarefa=true;
            $contador+=1;
        }
        else
        {
            $erros_validacao['tarefa']='A tarefa está em branco';
        }

    }

    //tarefa e se há essa informação
    if($confTarefa)
    {
        $paraFazer=$dados['tarefa'];
    }else
    {
        $paraFazer ='sem informação';
    }
?>
    <?php if($name!='admin'):?>
        <form method='POST'><font size="5">
            <label>
            Incluir nova tarefa
                <input type="text" required name="tarefa" size="50" maxlength="100" placeholder="Digitar aqui, máximo de 100 caracteres"/>
            </label>
            <?php if(isset($erros_validacao['tarefa'])):?>
                        <span class="erro" >
            <?php echo $erros_validacao['tarefa'];?>
                        </span>
            <?php endif;?>
            <button type="submit">Enviar</button>
        </form>
    <?php endif; ?>
<?php
    if($contador==1)
    {
        // Publicando a tarefa
        $id_user = $_SESSION["id"];
         //echo ("<script>location.href='#';</script>");
         $sqlGravar="INSERT INTO tasks(task, status, id_user) VALUES ('$paraFazer',1,'$id_user')";     

         if(mysqli_query($conn,$sqlGravar)){
            echo "<script language='javascript' type='text/javascript'>
            alert('Registro incluído com sucesso!');
            window.location.href='task_reports2.php';
            </script>";
        }else{
            echo "<script language='javascript' type='text/javascript'>
            alert('Registro não incluído!');
            window.location.href='task_reports2.php';
            </script>";
        }
        mysqli_close($conn);
    }
    

    
?>
    <br><br>
    <?php if($name!='admin'):?>
        <div style = "clear:both; height: 5px;"></div>
        <a href ="../Controller/listarTarefa.php" class="button">Apagar ou editar tarefas</a>
    <?php endif; ?>
    <br><br>
   
    <form action="task_reports2.php">
    <label><font size="5">Selecione para ocultar uma etapa:</label>
      <label class="btn btn-secondary active">
        <input type="checkbox" name="e1" value=1> Não iniciado
      </label>
      <label class="btn btn-secondary active">
        <input type="checkbox" name="e2" value=1> Em progresso
      </label>
      <label class="btn btn-secondary active">
        <input type="checkbox" name="e3" value=1> Completo
      </label>
      <input type="submit" value="Ocultar">
    </form>

    <div style = "clear:both; height: 5px;"></div>
    <a href ="../Controller/sair.php" class="button"><font size="5">Sair</a>
    