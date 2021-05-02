<div class="container">

    <h2>Criar Imposto</h2>
    <form method="post" action="/taxes">
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="mb-3">
            <label for="percent" class="form-label">Imposto</label>
            <div class="input-group mb-3">
                <input type="number" class="form-control" name="percent" id="percent" min="0" max="500" value="0"
                       required>
                <span class="input-group-text">%</span>
            </div>
            <div class="form-text">Preencha valores entre 0 e 500.</div>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>

</div>