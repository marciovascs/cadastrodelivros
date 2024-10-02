/**
 * Máscara para formatação do valor
 */
function mascaraMoeda(field) {
    // Remove caracteres que não são números
    let valor = field.value.replace(/\D/g, '');

    // Formata o valor em reais
    if (valor) {
        // Converte para centavos e formata como moeda
        valor = (valor / 100).toFixed(2).replace('.', ',');
        valor = valor.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');

        // Atualiza o campo de entrada com o valor formatado
        field.value = `R$ ${valor}`;
    } else {
        field.value = 'R$ 0,00'; // Caso o valor seja vazio
    }
}
