let transicoes = [];

function capturaTransicao() {
    let transicao = document.getElementById('transicao').value;
    transicao = transicao.trim();
    if (transicao !== "" && /[^,|=]+,[^,|=]+=[^,|=]+,[^,|=]+,[D|E]/i.test(transicao)) {
        adicionarNaTabela(transicao);
        document.getElementById('transicao').value = "";
    } else {
        alert("Informe uma transição válida!")
    }
}

function enviarJson(callback) {
    let json = {
        'fita': getFita(),
        'transicoes': [
            "->,->=q0,->,D",
            "q0,*=q0,*,D",
            "q0,_=q1,*,D",
            "q1,*=q1,*,D",
            "q1,_=q2,_,E",
            "q2,*=$,_,D"
        ]
    };
    $.ajax({
        url: 'verificar',
        data: json,
        type: "POST"
    }).done((response) => {
        callback(JSON.parse(response));
    }).fail((response) => {
        alert('Erro.');
    });
}

function adicionarNaTabela(transicao) {
    let pedacos = transicao.split('=');
    let rowAndColumn = pedacos[0];
    let acao = pedacos[1];

    rowAndColumn = rowAndColumn.split(',');

    let row = rowAndColumn[0];
    let column = rowAndColumn[1];

    if (!contemColuna(column)) {
        addColuna(column);
    }
    if (!contemLinha(row)) {
        addLinha(row);
    }

    editarCelula(row, column, acao)
}

function getTransicoes() {
    for (var i = 1; i <= quantidadeDeColunas(); i++){
        for(var j = 0; j < quantidadeDeLinhas(); j++){
            var acao = getCell(getBodyValue(j), getHeaderValue(i)).textContent;
            if (acao !== ''){
                var transicao = estado + ',' + simbolo + '=' + acao;
                transicoes.push(transicao);
            }
        }
    }
    console.log(transicoes);
}
