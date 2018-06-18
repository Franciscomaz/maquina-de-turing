var posicaoGlobal = 0;
var velocidadeExecucao = 0;


function relogioVelocidade(valor) {
    velocidadeExecucao = valor;
    console.log(velocidadeExecucao);
}

function criaDiv(id, conteudoDaDiv) {
    if (id === 0) {
        $(document.getElementById('lineBox')).append('<div contenteditable="true" id="box' + id + '" class="box">' + conteudoDaDiv + '</div>');
    } else {
        $(document.getElementById('lineBox')).append('<div contenteditable="true" id="box' + id + '" class="box">' + conteudoDaDiv + '</div>');
    }
}

function chamaDiv() {
    var fitaTransicao = document.getElementById('fitaTransicao').value;
    console.log("teste");
    for (var i = 0; i < fitaTransicao.length; i++) {
        criaDiv(i, fitaTransicao[i]);
    }
}

function animacaoFita(i) {
    $(document.getElementById('box' + i)).addClass('animacao-jquery');
}

function moverDireita() {
    var posicaoAtualDireita = posicaoGlobal;
    var removerDireitaAnterior = posicaoGlobal - 1;
    console.log("movendo direita" + posicaoGlobal)
    $(document.getElementById('box' + removerDireitaAnterior)).removeClass('animacao-jquery');

    $(document.getElementById('box' + posicaoAtualDireita)).addClass('animacao-jquery');
}

function moverEsquerda() {
    var posicaoEsquerdaAtual = posicaoGlobal;
    var removerEsquerdaAnterior = posicaoGlobal + 1;
    $(document.getElementById('box' + removerEsquerdaAnterior)).removeClass('animacao-jquery');
    $(document.getElementById('box' + posicaoEsquerdaAtual)).addClass('animacao-jquery');
}

function alteraValor(alteracaoAtual) {
    var div = document.getElementById('box' + posicaoGlobal);
    div.innerHTML = alteracaoAtual;
}

function iniciaFita() {
    animacaoFita(0);
    var fitaMontada = "";
    var fita = ['J1', 'o1', 'n1', 'a1', 's1', '!0', '!0', '!0', '!0', '!0'];
    var tamanhoFita = fita.length;

    for (var i = 0; i < tamanhoFita; i++) {
        var acao = fita[i];
        var tamanhoAcao = acao.length;
        for (var j = 0; j < tamanhoAcao; j++) {
            fitaMontada = fitaMontada + acao[j];
        }
    }
    for (var i = 0; i < fitaMontada.length; i++) {
        if (fitaMontada[i] == '0') {
            (function (ind) {
                setTimeout(function () {
                    posicaoGlobal--;
                    moverEsquerda();
                }, 1000 + (velocidadeExecucao * ind));
            })(i);
        }
        else if (fitaMontada[i] == '1') {
            (function (ind) {
                setTimeout(function () {
                    posicaoGlobal++;
                    moverDireita();
                }, 1000 + (velocidadeExecucao * ind));
            })(i);
        } else {
            (function (ind) {
                setTimeout(function () {
                    alteraValor(fitaMontada[ind]);
                }, 1000 + (velocidadeExecucao * ind));
            })(i);
        }
    }

}

// // if()
// (function (ind) {
//     setTimeout(function () { moverDireita(ind); }, 1000 + (1000 * ind));
// })(i);