<html>
    <head>
        <title><?php echo $titulo ?></title>
    </head>

    <body>
        <h2><?php echo $titulo ?></h2>
        <strong><?php echo $msg ?></strong>
        <form method="post">
            <input type="hidden" name="cpf" value="<?php echo (isset($pessoas) ? $pessoas->cpf : '') ?>">
            <p>Nome da pessoa:
                 <input type="text" name="nomepessoa" 
                    value="<?php echo (isset($pessoas) ? $pessoas->nomepessoa : '')
                ?>">
            </p>

            <input type="hidden" name="cpf" value="<?php echo (isset($pessoas) ? $pessoas->cpf : '') ?>">
            <p>Cpf da pessoa:
                 <input type="text" name="cpf" 
                    value="<?php echo (isset($pessoas) ? $pessoas->cpf : '') 
                ?>">
            </p>

            <p><input type="submit" value="<?php echo $acao ?>"></p>

            <p><button type="submit"><a href="<?php echo base_url('fisica') ?>">Visualizar dados</a></button></p>

            <p><button type="submit"><a href="<?php echo base_url('produtos/inserir') ?>">Escolher produtos</a></button></p>
        </form>
    </body>
</html>