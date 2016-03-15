<?php include_once ("includes/functions.php"); ?>
<?php 
    $titulo = '';
    $descricao = '';
    $prioridade='';
    $id = '';
    $submit = filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_STRING);
    if (isset($submit)) {
        if ($submit == "Update") {
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
            $rs = getTarefa($id);
            $row = $rs->fetch_assoc();
            $titulo = $row['titulo'];
            $descricao = $row['descricao'];
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
    <title>Update Tarefa</title>
</head>

<body>
    <form action="index.php" method="post">
        <input type='hidden' name='id' value='<?php echo $id ?>'>
        <p>Título:</p>
        <input size="20"
               maxlength="255"
               type="text" 
               name="titulo" 
               value="<?php echo $titulo ?>"/>
        <br />
        <p>Descrição:</p>
        <input size="20"
               maxlength="255"
               type="text" 
               name="descricao" 
               value="<?php echo $descricao ?>"/>
        <br />
        <p>Prioridade:&nbsp;</p>
        <select name="prioridade" required>
            <option value=""></option>
            <option value="1">Alta</option>
            <option value="2">Média</option>
            <option value="3">Baixa</option>
        </select>
        <input type="submit" name="submit" value="Update Tarefa">
    </form>
</body>
</html>