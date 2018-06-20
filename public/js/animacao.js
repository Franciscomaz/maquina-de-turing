let posicaoNaFita = 0;
let fitaAnterior = [];
let velocidadeDaAnimacao = 500;

function iniciarAnimacao() {
    fitaAnterior = document.getElementById('lineBox').innerHTML;
    setVelocidadeDaAnimacao();
    enviarJson(executarAnimacao);

    function executarAnimacao(json) {
        var fita = json['fita'];
        for (let i = 0; i < fita.length; i++) {
            setTimeout(() => {
                escrever(fita[i].escrever);
                if (fita[i].direcao === 1) {
                    posicaoNaFita++;
                    moverDireita();
                } else if (fita[i].direcao === -1) {
                    posicaoNaFita--;
                    moverEsquerda();
                }
            }, 1000 + (velocidadeDaAnimacao * i));
        }
        verificarSeFitaEValida(json['isValido']);
    }

    function moverDireita() {
        let posicaoAtualDireita = posicaoNaFita;
        let removerDireitaAnterior = posicaoNaFita - 1;
        if ($(document.getElementById('box' + posicaoAtualDireita)) === undefined) {
            adicionarCelula('_');
        }
        $(document.getElementById('box' + removerDireitaAnterior)).removeClass('animacao-jquery');
        $(document.getElementById('box' + posicaoAtualDireita)).addClass('animacao-jquery');
    }

    function moverEsquerda() {
        let posicaoEsquerdaAtual = posicaoNaFita;
        let removerEsquerdaAnterior = posicaoNaFita + 1;
        if ($(document.getElementById('box' + posicaoEsquerdaAtual)) === undefined) {
            adicionarCelula('_');
        }
        $(document.getElementById('box' + removerEsquerdaAnterior)).removeClass('animacao-jquery');
        $(document.getElementById('box' + posicaoEsquerdaAtual)).addClass('animacao-jquery');
    }

    function escrever(simbolo) {
        let div = document.getElementById('box' + posicaoNaFita);
        div.innerHTML = simbolo;
    }

    function verificarSeFitaEValida(isValido) {
        let valido = $('#valido');
        if (isValido) {
            valido.html('Fita válida.');
            valido.addClass('alert alert-success')
        } else {
            valido.html('Fita inválida.');
            valido.addClass('alert alert-danger')
        }
    }
}

function resetarAnimacao() {
    posicaoNaFita = 0;
    document.getElementById('lineBox').innerHTML = fitaAnterior
}

function setVelocidadeDaAnimacao() {
    if (document.getElementById('lento').checked) {
        velocidadeDaAnimacao = 1000;
    } else if (document.getElementById('medio').checked) {
        velocidadeDaAnimacao = 500;
    } else if (document.getElementById('rapido').checked) {
        velocidadeDaAnimacao = 100;
    }
}
