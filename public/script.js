function formatReal(value) {
    return value.toLocaleString('pt-BR', {
        style: 'currency',
        currency: 'BRL'
    })
}

function calcTotal() {
    let totalProducts = 0;
    let totalTaxes = 0;
    $('input[name^="quantity"]').each(function () {
        let input = $(this);
        let id = input.data('id');
        let quantity = input.val();
        let sum = $('input[name="value[' + id + ']"]').val() * quantity;
        let tax = sum * $('input[name="tax[' + id + ']"]').val();
        let total = sum + tax;
        $('input[name="total[' + id + ']"]').val(formatReal(total));
        totalProducts += total;
        totalTaxes += tax;
    })

    $('#totalProducts').text('Total Produtos: ' + formatReal(totalProducts));
    $('#totalTax').text('Apenas Imposto: ' + formatReal(totalTaxes));
}