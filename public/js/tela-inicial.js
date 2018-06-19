var velocidadeExecucao = 0;


function initFita(fita) {
    for (var i = 0; i < fita.length; i++) {
        criaDiv(i, fita[i]);
    }
}

function relogioVelocidade(valor) {
    velocidadeExecucao = valor;
    console.log(velocidadeExecucao);
}

function criaDiv(id, conteudoDaDiv) {
    $(document.getElementById('lineBox')).append('<div contenteditable="true" id="box' + id + '" class="box">' + conteudoDaDiv + '</div>');
}

function chamaDiv() {
    var fitaTransicao = document.getElementById('fitaTransicao').value;
    console.log("teste");
    for (var i = 0; i < fitaTransicao.length; i++) {
        criaDiv(i, fitaTransicao[i]);
    }
}

function criarBox() {
    var fita = document.getElementById('lineBox');
    let tamanhoDaFita = fita.children.length;
    criaDiv(tamanhoDaFita, '_');
}

// // if()
// (function (ind) {
//     setTimeout(function () { moverDireita(ind); }, 1000 + (1000 * ind));
// })(i);