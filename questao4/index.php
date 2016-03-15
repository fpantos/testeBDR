<?php
header('Cache-Control: no-store, no-cache, must-revalidate' ); 
header('Cache-Control: post-check=0, pre-check=0', false ); 
header('Pragma: no-cache' ); 
?>
<?php include_once ("includes/functions.php"); ?>
<?php 
    if (filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_STRING)) {
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
        $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
        $prioridade = filter_input(INPUT_POST, 'prioridade', FILTER_SANITIZE_STRING);
        $submit = filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_STRING);
        if ($submit == "Delete") {
            deleteTarefa($id);
        } elseif ($submit == "Criar Tarefa")  {
            insertTarefa($titulo, $descricao, $prioridade);
        } elseif ($submit == "Update Tarefa")  {
            updateTarefa($id, $titulo, $descricao, $prioridade);
        }
    }
?>
<html>
<head>
    <meta charset="UTF-8">
    <link href="stylesheets/style.css" 
          media="all" 
          rel="stylesheet" 
          type="text/css" />
    <title>Questão 4</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" 
          method="post">
        <p>Título:</p>
        <input size="20"
               maxlength="255"
               type="text" 
               name="titulo" />
        <br />
        <p>Descrição:</p>
        <input size="20"
               maxlength="255"
               type="text" 
               name="descricao" />
        <br />
        <p>Prioridade:&nbsp;</p>
        <select name="prioridade" required>
            <option value=""></option>
            <option value="1">Alta</option>
            <option value="2">Média</option>
            <option value="3">Baixa</option>
        </select>
        <input type="submit" name="submit" value="Criar Tarefa">
    </form>
    <table>
        <tr>
            <th>Título</th>
            <th>Descrição</th>
            <th>Prioridade</th>
        </tr>
        <?php 
            $rs = queryTarefas();
            while($row = $rs->fetch_assoc()) {
                $prioridade='';
                switch ($row['prioridade']) {
                    case "1":
                        $prioridade='Alta';
                        break;
                    case "2":
                        $prioridade='Média';
                        break;
                    case "3":
                        $prioridade='Baixa';
                        break;
                } ?>
            <tr>
            <td> <?php echo $row['titulo'] ?> </td>
            <td> <?php echo $row['descricao'] ?> </td>
            <td> <?php echo $prioridade ?> </td>
            <td> 
                <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>' method='post'>
                    <input type='hidden' name='id' value='<?php echo $row['id'] ?>'>
                    <input type='submit' name='submit' value='Delete'>
                </form>
            </td>
            <td>    
                <form action="update.php" method="post">
                    <input type='hidden' name='id' value="<?php echo $row['id'] ?>"> 
                    <input type='submit' name='submit' value='Update'>
                </form>
            </td>
            <?php 
            }
            $rs->free_result();
        ?>
    </table>
</body>
</html>