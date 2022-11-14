<html>
    <head>
        <title><?php echo $titulo ?></title>
    </head>

    <body>
        <h1>
            <?php echo $titulo ?>
        </h1>
        <p><a href="<?php echo base_url('produtos') ?>">Ir para lista de produtos</a></p>
        <strong><?php echo $msg ?></strong>
        <?php if($erros != '') : ?>
            <ul style="color: red;">
                <?php foreach($erros as $erro) : ?>
                    <li><?php echo $erro ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <form method="post">
            <p>Nome do produto:
                 <input type="text" name="nomeproduto" 
                    value="<?php echo (isset($produto) ? $produto->nomeproduto : '') ?>">
            </p>
            <p>Valor:
                 <input type="text" name="valor" 
                    value="<?php echo (isset($produto) ? $produto->valor : '') ?>">
            </p>

            <p>Seu ID:
                <input type="text" name="pessoa_id" 
                    value="<?php echo (isset($produto) ? $produto->pessoa_id : '') ?>">
            </p>
            
            <p><button type="submit"><a href="<?php echo base_url('visualizar') ?>">Finalizar</a></button></p>

            <p><input type="submit" value="<?php echo $acao ?>"></p>
        </form>
    </body>
</html>