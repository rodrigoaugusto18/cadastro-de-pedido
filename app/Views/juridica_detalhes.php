<html>
    <head>
        <title><?php echo $titulo ?></title>
        <style>
            .tabela, .tabela td, .tabela tr {
                border: 1px solid;
                width: 800px;
            }
        </style>
    </head>
    <body>
    <div id="header">
        <h1><?php echo $titulo ?></h1>
            <hr>
            <p><?php echo $msg ?></p>
            <table class="tabela">
            <tr>
                <td>Código da pessoa</td>
                <td>Razão social</td>
                <td>CNPJ</td>
            </tr>
            <?php foreach ($pessoas as $pessoas) : ?>
            <tr>
                <td><?php echo $pessoas->id ?></td>
                <td><?php echo $pessoas->razaosocial ?></td>
                <td><?php echo $pessoas->cnpj ?></td>
                <td><a href="<?php echo base_url('juridica/editar/' . $pessoas->id ) ?>">Editar</a></td>
                <td><a href="<?php echo base_url('juridica/excluir/' . $pessoas->id) ?>">Excluir</a></td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>
    <div id="footer">
        <p style="text-align: center;">Feito em CodeIgniter 4.</p>
    </div>
</body>
</html>