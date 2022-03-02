<?php
#INSERE O ARQUIVO HEADER
include "../process/conexao.php";
#DETERMINA O COMANDO DE BUSCA
$busca = $comandoPaginacao;

$total_reg = $totalDePaginas; // número de registros por página
@$pagina = $_GET['pagina'];

if (!$pagina) {
    $pc = 1;
} else {
    $pc = $pagina;
}

$inicio = $pc - 1;
$inicio = $inicio * $total_reg;

$limite = mysqli_query($conexao, "$busca LIMIT $inicio,$total_reg");
$todos = mysqli_query($conexao, $busca);

$tr = mysqli_num_rows($todos); // verifica o número total de registros
$tp = $tr / $total_reg; // verifica o número total de páginas

// vamos criar a visualização

// agora vamos criar os botões "Anterior e próximo"
$anterior = $pc - 1;
$proximo = $pc + 1;

function paginacao($anterior,$proximo,$pc,$tp)
#PS A VARIAVEL DE ASSOCIAÇÃO NO LAÇO DE REPETIÇÃO (WHILE) DEVE SER USADA COMO $limite
{
?>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php
            if ($pc > 1) {
                echo
                "<li class='page-item'>
                    <a class='page-link' href='?pagina=$anterior'>Anterior</a>
                </li>";
            }
            if ($pc < $tp) {
                echo
                " 
                 <li class='page-item'>
                    <a class='page-link' href='?pagina=$proximo'>Proximo</a>
                </li>";
            }
            ?>
        </ul>
    </nav>
<?php
}

?>