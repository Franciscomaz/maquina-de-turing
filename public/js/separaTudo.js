class Transicoes {
    constructor() {
        this.arrayTransicoes = [];
    }

    get transicoes() {
        return this.arrayTransicoes;
    }

    adicionarTransicao(transicao) {
        this.arrayTransicoes.push(transicao);
    }
}


let transicoes = new Transicoes();

function capturaTransicao() {
    //Caputura o valor do estado que vem do html
    let transicaoCapturada = document.getElementById('transicao').value;
    adicionarNaTabela(transicaoCapturada);
    //Verifica se nao é espaco vazil
    if (transicaoCapturada.trim() !== "") {
        transicoes.adicionarTransicao(transicaoCapturada.trim());
        console.log(transicoes.arrayTransicoes);
        document.getElementById('transicao').value = "";
    } else {
        alert("Errou!")
    }

}

function enviarJson(){
    let json = {
        'fita': getFita(),
        'transicoes': transicoes.transicoes
    };
    console.log(json);
    $.ajax({
        url: 'verificar', // PRecisamos colocar a pagina correta pro json, ele nao ta recebendo o json
        data: json,
        type: "POST"
    }).done((response) => {
        console.log(response.fita);
    }).fail((response) => {
        console.log("Deu errado o json!"+ "  "+ response);
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

    if(!contemColuna(column)){
        addColuna(column);
    }
    if(!contemLinha(row)){
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