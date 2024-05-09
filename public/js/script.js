
// PROMPT PARA CAPTURAR O NOME DO FUNCIONARIO QUE VAI ABRIR E FECHAR CAIXA
function solicitarNome(acao) {
    var nome = prompt("Por favor, insira o nome do funcionário:", "");
    if (nome !== null && nome !== "") {
        enviarDados(acao, nome);
    }
}
// FUNÇÃO PARA CAPTURAR O NOME DENTRO DO PROMPT REALIZANDO UM "AJAX"
function enviarDados(acao, nome) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        // REDIRECIONA PARA A PAGINA DE SUCESSO
        if (this.readyState == 4 && this.status == 200) {
            window.location.href = '../pages/dashboard.php'; 
        }
    };
    xhttp.open("POST", "../server/processar_caixa.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var params = "acao=" + encodeURIComponent(acao) + "&nome=" + encodeURIComponent(nome);
    xhttp.send(params);
}
var itensAdicionados = {}; // Objeto para rastrear a quantidade e o preço de cada item adicionado

function adicionarItem(button) {
    var divProduto = button.parentNode;
    var nomeProduto = divProduto.querySelector(".name-produto").textContent;
    var precoProduto = parseFloat(divProduto.querySelector(".preco-produto").textContent);

    if (itensAdicionados[nomeProduto]) {
        itensAdicionados[nomeProduto].quantidade++;
    } else {
        itensAdicionados[nomeProduto] = {
            quantidade: 1,
            preco: precoProduto
        };
    }

    var quantidade = itensAdicionados[nomeProduto].quantidade;
    var tabelaItens = document.querySelector("#tabela-itens");
    var linhaExistente = tabelaItens.querySelector('tr[data-nome="' + nomeProduto + '"]');

    if (linhaExistente) {
        var quantidadeCelula = linhaExistente.querySelector("td:nth-child(2)");
        quantidadeCelula.textContent = quantidade + "x";
    } else {
        var novaLinha = tabelaItens.insertRow(-1); // Insere uma nova linha no final da tabela
        novaLinha.setAttribute("data-nome", nomeProduto);

        var celulaNome = novaLinha.insertCell(0);
        var celulaQuantidade = novaLinha.insertCell(1);
        var celulaPreco = novaLinha.insertCell(2);

        celulaNome.textContent = nomeProduto;
        celulaQuantidade.textContent = quantidade + "x";
        celulaPreco.textContent = precoProduto.toFixed(2);
    }

    // Após adicionar o item, recalcula o total automaticamente
    somarValores();
}

document.getElementById("myForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Evita que o formulário seja enviado normalmente

    console.log("Evento de envio do formulário capturado.");

    // Recupera os dados dos itens da tabela
    var itens = [];
    var quantidades = [];
    var precos = [];

    var linhas = document.querySelectorAll("#tabela-itens tr:not(:first-child)");

    linhas.forEach(function(linha) {
        var nomeItem = linha.cells[0].textContent;
        var quantidadeItem = parseInt(linha.cells[1].textContent);
        var precoItem = parseFloat(linha.cells[2].textContent);

        console.log("Item: " + nomeItem + ", Quantidade: " + quantidadeItem + ", Preço: " + precoItem);

        itens.push(nomeItem);
        quantidades.push(quantidadeItem);
        precos.push(precoItem);
    });

    console.log("Itens: ", itens);
    console.log("Quantidades: ", quantidades);
    console.log("Preços: ", precos);

    // Adiciona campos ocultos para os dados dos itens
    itens.forEach(function(item, index) {
        var inputNomeItem = document.createElement("input");
        inputNomeItem.type = "hidden";
        inputNomeItem.name = "itens[]";
        inputNomeItem.value = item;
        this.appendChild(inputNomeItem);

        var inputQuantidadeItem = document.createElement("input");
        inputQuantidadeItem.type = "hidden";
        inputQuantidadeItem.name = "quantidades[]";
        inputQuantidadeItem.value = quantidades[index];
        this.appendChild(inputQuantidadeItem);

        var inputPrecoItem = document.createElement("input");
        inputPrecoItem.type = "hidden";
        inputPrecoItem.name = "precos[]";
        inputPrecoItem.value = precos[index];
        this.appendChild(inputPrecoItem);
    }, this);

    // Submete o formulário
    this.submit();
});


function somarValores() {
    var sumPreco = 0;

    // Seleciona todas as linhas, exceto a primeira
    var linhas = document.querySelectorAll("#tabela-itens tr:not(:first-child)");

    linhas.forEach(function(linha) {
        var precoCelula = linha.querySelector("td:nth-child(3)");
        var quantidadeTexto = linha.querySelector("td:nth-child(2)").textContent;
        var quantidade = parseInt(quantidadeTexto);

        if (precoCelula) {
            var preco = parseFloat(precoCelula.textContent);

            sumPreco += preco * quantidade;
        }
    });

    // Atualiza o elemento com o id 'total' com o valor total
    var totalElemento = document.querySelector("#total");
    totalElemento.textContent = "Total: R$ " + sumPreco.toFixed(2);
}

function produto(){
    window.location.href = 'http://localhost/to%20na%20faculdade/public/pages/produtos.php';
}
function information(){
    window.location.href = 'http://localhost/to%20na%20faculdade/public/pages/dashboard.php';
}
function mesa(){
    window.location.href = 'http://localhost/to%20na%20faculdade/public/pages/mesa.php';
}