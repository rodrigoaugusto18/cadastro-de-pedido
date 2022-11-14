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
            <h2><?php echo $titulo ?></h2>
            <p><?php echo $msg ?></p>
            
            <table class="tabela">
            <tr>
                <td>Código da pessoas</td>
                <td>Nome da pessoas</td>
                <td>CPF</td>
                <td>CNPJ</td>
                <td>Razão Social</td>
            </tr>
            <?php foreach ($pessoas as $pessoas) : ?>
            <tr>
                <td><?php echo $pessoas->id ?></td>
                <td><?php echo $pessoas->nomepessoa ?></td>
                <td><?php echo $pessoas->cpf ?></td>
                <td><?php echo $pessoas->cnpj ?></td>
                <td><?php echo $pessoas->razaosocial ?></td>
                <td><a href="<?php echo base_url('pessoas/editar/' . $pessoas->id ) ?>">Editar</a></td>
                <td><a href="<?php echo base_url('pessoas/excluir/' . $pessoas->id) ?>">Excluir</a></td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>
    <div id="footer">
        <p style="text-align: center;">Feito em CodeIgniter 4.</p>
    </div>
</body>
</html>