<div class="container">

    <a href="/taxes/create" class="btn btn-primary mb-3">
        Criar Novo Imposto
    </a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Imposto</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($taxes as $tax) {
            echo '<tr>';
            echo '<td scope="row">';
            echo '<form method="POST" action="/taxes/' . $tax['id'] . '/delete">';
            echo '  <button class="btn btn-danger" type="submit">Deletar #' . $tax['id'] . '</button>';
            echo '</form>';
            echo '</td>';
            echo '<td>' . $tax['name'] . '</td>';
            echo '<td>' . $tax['percent'] * 100 . '%</td>';
            echo '</tr>';
        }
        ?>

        </tbody>
    </table>

</div>
