let transicoes = [];

function capturaTransicao() {
    let transicao = document.getElementById('transicao').value;
    transicao = transicao.trim();
    if (transicao !== "") {
        adicionarNaTabela(transicao);
        transicoes.push(transicao);
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
            "q2,*=q1,_,D"
        ]
    };
    console.log(json);
    $.ajax({
        url: 'verificar',
        data: json,
        type: "POST"
    }).done((response) => {
        callback(JSON.parse(response)['fita']);
    }).fail((response) => {
        console.log(response);
    });
}

function adicionarNaTabela(transicao) {
    let pedacos = transicao.split('=');
    console.log(pedacos);
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

//
// var string  = "Casa com a palavra exemplo",
//     pattern = {},
//     regexp  = /q[0-9]+,[a-zA-Z]+=q[0-9]+,[a-zA-Z]+,[d|e]/;
//
// console.log(/q[0-9]+,[a-zA-Z]+=q[0-9]+,[a-zA-Z]+,[d|e]/).test("q1,a=q1,a,daa"));