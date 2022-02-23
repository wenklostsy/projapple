<tbody>
    <tr>
        <td class="center"><?php echo $prodAssoc['idprodutos'] ?></td>
        <td class="center">
            <b>
                <a href="../public/produto.php?id=<?php echo $id ?>"><?php echo $prodAssoc['nome'] ?></a>
            </b>
        </td>
        <td class="center"><?php echo $qtd ?></td>
        <td class="center"><?php echo $valorUnitario ?></td>
        <td class="right"><?php echo $totalIndividual ?></td>
        <td class="right">
            <!-- BOTÃO DE ADICIONAR PRODUTO -->
            <a type="button">
                <a href="../cadastros/carrinho.php?id=<?php echo $id ?>&addremove=1">
                    <i class="fa-solid fa-plus btn-primary p-2 rounded"></i>
                </a>
                <?php
                #BOTÃO DE DIMINUIR A QUANTIDADE DE PRODUTO
                if ($qtd >= 2) {
                    echo
                    "<a href='../cadastros/carrinho.php?id=$id&addremove=0'>
                    <i class='fa-solid fa-minus btn-warning p-2 rounded'></i>
                    </a>";
                }
                ?>
                <a href="../process/remove_carrinho.php?id=<?php echo $id ?>">
                    <i class="fa-solid fa-xmark btn-danger p-2 rounded"></i>
                </a>
            </a>
        </td>
    </tr>
</tbody>