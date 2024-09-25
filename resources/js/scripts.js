$(function() {

    alert('okok');
    // Seu código aqui
    Inputmask("decimal", {
        radixPoint: ",",
        groupSeparator: ".",
        autoGroup: true,
        removeMaskOnSubmit: true
    }).mask("#preco");
});
