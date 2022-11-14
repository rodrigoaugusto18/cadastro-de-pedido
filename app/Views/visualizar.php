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

    </body>
        <div id="header">
        <h1><?php echo $titulo ?></h1>
            <hr>
            <p><?php echo $msg ?></p>
            <table class="tabela">
            <tr>
                <td>Código da pessoa</td>
                <td>Nome da pessoa</td>
                <td>CPF</td>
            </tr>
            <?php foreach ($listapessoas as $pessoas) : ?>
            <tr>
                <td><?php echo $pessoas->id ?></td>
                <td><?php echo(isset($pessoas->nomepessoa) ? $pessoas->nomepessoa : $pessoas->razaosocial)?></td>
                <td><?php echo(isset($pessoas->cpf) ? $pessoas->cpf : $pessoas->cnpj)?></td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>

    <div id="header2">
        <h2><?php echo $titulo ?></h2>
            <hr>
            <p><?php echo $msg ?></p>
            
            <table class="tabela">
            <tr>
                <td>Código da produto</td>
                <td>Nome do produto</td>
                <td>Valor</td>
                <td>Código da pessoa</td>

            </tr>
            <?php foreach ($produtos as $produto) : ?>
            <tr>
                <td><?php echo $produto->id ?></td>
                <td><?php echo $produto->nomeproduto ?></td>
                <td><?php echo $produto->valor ?></td>
                <td><?php echo $produto->pessoa_id ?></td>
                <td><a href="<?php echo base_url('produtos/editar/' . $produto->id ) ?>">Editar</a></td>
                <td><a href="<?php echo base_url('produtos/excluir/' . $produto->id) ?>">Excluir</a></td>
            </tr>
                
                <p>Status do pedido:
                <br>    
                <?php echo $comboStatus ?></p>
            <?php endforeach ?>
        </table> 

    </div>
    </body>
</html>
