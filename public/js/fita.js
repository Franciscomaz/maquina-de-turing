let posicaoGlobal = 0;
let fitaAnterior = [];

function iniciarAnimacao(fita) {
    fitaAnterior = fita;
    console.log(fita);
    executarAnimacao(fita)
}

function executarAnimacao(fita) {
    console.log('ok');
    console.log(fita[0].direcao);
    for (let i = 0; i < fita.length; i++) {
        (function (index, fita) {
            setTimeout(function () {
                alteraValor(fita[i].escrever);
                if (fita[i].direcao == '1') {
                    console.log('mover direita');
                    posicaoGlobal++;
                    moverDireita();
                } else if (fita[i].direcao == '-1') {
                    console.log('mover esquerda');
                    posicaoGlobal--;
                    moverEsquerda();
                }
            }, 1000 + (velocidadeExecucao * index));
        })(i, fita);
    }
}

function continuarAnimacao() {

}

function pausarAnimacao() {

}

function resetarAnimacao() {

}

function animacaoFita(i) {
    $(document.getElementById('box' + i)).addClass('animacao-jquery');
}

function moverDireita() {
    let posicaoAtualDireita = posicaoGlobal;
    let removerDireitaAnterior = posicaoGlobal - 1;
    console.log("movendo direita" + posicaoGlobal)
    $(document.getElementById('box' + removerDireitaAnterior)).removeClass('animacao-jquery');
    $(document.getElementById('box' + posicaoAtualDireita)).addClass('animacao-jquery');
}

function moverEsquerda() {
    let posicaoEsquerdaAtual = posicaoGlobal;
    let removerEsquerdaAnterior = posicaoGlobal + 1;
    $(document.getElementById('box' + removerEsquerdaAnterior)).removeClass('animacao-jquery');
    $(document.getElementById('box' + posicaoEsquerdaAtual)).addClass('animacao-jquery');
}

function alteraValor(alteracaoAtual) {
    let div = document.getElementById('box' + posicaoGlobal);
    div.innerHTML = alteracaoAtual;
}

function getFita() {
    let fita = document.getElementById('lineBox');
    let celulas = [];
    for (let i = 0; i < fita.children.length; i++) {
        celulas.push(fita.children[i].textContent);
    }
    return celulas;
}
