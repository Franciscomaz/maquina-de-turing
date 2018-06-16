var posicaoGlobal = 0;
var relogioVelocidade = 1000;





function criaDiv(variavel,teste1) {
    if (variavel === 0) {
        $(document.getElementById('lineBox')).append('<div id="box' + variavel + '" class="box">'+ teste1 +'</div>');
    } else {
        $(document.getElementById('lineBox')).append('<div id="box' + variavel + '" class="box">' + teste1 + '</div>');
    }
}

function chamaDiv() {
    var teste = 'XXXXXX_XXXXXX'
    for (var i = 0; i < teste.length; i++) {
        criaDiv(i,teste[i]);
    }
}


function animacaoFita(i) {
    $(document.getElementById('box' + i)).addClass('animacao-jquery');
}
function moverDireita() {
    var posicaoAtualDireita = posicaoGlobal;
    var removerDireitaAnterior = posicaoGlobal-1;
    console.log("movendo direita"+posicaoGlobal)
    $(document.getElementById('box' + removerDireitaAnterior)).removeClass('animacao-jquery');

    $(document.getElementById('box' + posicaoAtualDireita)).addClass('animacao-jquery');
}

function moverEsquerda() {
    var posicaoEsquerdaAtual = posicaoGlobal;
    var removerEsquerdaAnterior = posicaoGlobal+1;
    $(document.getElementById('box' + removerEsquerdaAnterior)).removeClass('animacao-jquery');
    $(document.getElementById('box' + posicaoEsquerdaAtual)).addClass('animacao-jquery');
}

function alteraValor(alteracaoAtual) {
    var div = document.getElementById('box'+posicaoGlobal);
    div.innerHTML = alteracaoAtual;
}

function iniciaFita() {
    animacaoFita(0);
    var fitaMontada = "";
    var fita = ['J1','o1','n1','a1','s1','!0','!0','!0','!0','!0'];
    var tamanhoFita = fita.length;

    for (var i = 0; i < tamanhoFita; i++) {
        var acao = fita[i];
        var tamanhoAcao = acao.length;
        for (var j = 0; j < tamanhoAcao; j++) {
            var aux = fitaMontada+acao[j];
            fitaMontada = aux;
        }
    }
    for (var i = 0; i < fitaMontada.length; i ++){
        if(fitaMontada[i] == '0'){
            (function (ind) {
                setTimeout(function () {posicaoGlobal--; moverEsquerda(); }, 1000 + (50 * ind));
            })(i);
        }
        else if(fitaMontada[i] == '1'){
            (function (ind) {
                setTimeout(function () {posicaoGlobal++; moverDireita(); }, 1000 + (50 * ind));
            })(i);
        }else{
            (function (ind) {
                setTimeout(function () { alteraValor(fitaMontada[ind]); }, 1000 + (50 * ind));
            })(i);
        }
    }

}

// // if()
// (function (ind) {
//     setTimeout(function () { moverDireita(ind); }, 1000 + (1000 * ind));
// })(i);