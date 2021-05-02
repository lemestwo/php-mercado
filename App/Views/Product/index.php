<div class="container">

    <a href="/products/create" class="btn btn-primary mb-3">
        Criar Novo Produto
    </a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Preço</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Imposto</th>
            <th scope="col">Total</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($products as $product) {
            echo '<input type="hidden" name="value[' . $product['id'] . ']" value="' . $product['price'] . '" />';
            echo '<input type="hidden" name="tax[' . $product['id'] . ']" value="' . $product['t_percent'] . '" />';
            echo '<tr>';
            echo '<td scope="row"><a href="/products/' . $product['id'] . '/edit">Editar</a></td>';
            echo '<td>' . $product['name'] . '</td>';
            echo '<td>R$ ' . number_format($product['price'], 2, ",", ".") . '</td>';
            echo '<td>';
            echo '<input type="number" min="0" max="100" value="0" name="quantity[' . $product['id'] . ']" data-id="' . $product['id'] . '" onchange="calcTotal()" />';
            echo '</td>';
            echo '<td>' . $product['t_name'] . ' - ' . ($product['t_percent'] * 100) . '%</td>';
            echo '<td>';
            echo '<input type="text" value="0,00" name="total[' . $product['id'] . ']" disabled />';
            echo '</td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>

    <div class="alert alert-info" role="alert">
        <h4 class="alert-heading">Mercado Checkout</h4>
        <hr>
        <p>
            <button class="btn btn-success" onclick="calcTotal()">Calcular</button>
        </p>
        <p id="totalProducts">Total Produtos: R$ 0,00</p>
        <p id="totalTax">Apenas Imposto: R$ 0,00</p>
    </div>

</div>
