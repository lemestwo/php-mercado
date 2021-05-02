<div class="container">

    <h2>Editar Produto - #<?php echo $product['id'] ?></h2>
    <form method="post" action="/products/<?php echo $product['id'] ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" name="name" id="name" required
                   value="<?php echo $product['name'] ?>">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Preço</label>
            <input type="text" class="form-control" name="price" id="price" required
                   value="<?php echo $product['price'] ?>">
            <div class="form-text">Utilize vírgula como separador decimal.</div>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Imposto</label>
            <select class="form-select" name="type" id="type">
                <?php
                foreach ($taxes as $key => $tax) {
                    echo '<option value="' . $tax['id'] . '" ' . ($tax['id'] === $product['type'] ? 'selected' : '') . '>' . $tax['name'] . ' - ' . ($tax['percent'] * 100) . '%</option>';
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
    <form method="POST" action="/products/<?php echo $product['id'] ?>/delete" class="mt-3">
        <button type="submit" class="btn btn-danger">Deletar</button>
    </form>

</div>