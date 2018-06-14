



function criaDiv(variavel) {
    if (variavel === 0) {
        $(document.getElementById('lineBox')).append('<div id="box'+variavel+'" class="box">></div>');
    }else{
        $(document.getElementById('lineBox')).append('<div id="box'+variavel+'" class="box">'+variavel+'</div>');
    }
}

function chamaDiv(){
    for(var i = 0; i < 20;i++){
        criaDiv(i);
    }
}


function animacaoFita(i){
    $(document.getElementById('box'+i)).addClass('animacao-jquery');
}
function moverDireita(posicaoAtual){

    var posicao = posicaoAtual;
    $(document.getElementById('box'+posicao)).removeClass('animacao-jquery');
    var teste = posicao +1;
    $(document.getElementById('box'+teste)).addClass('animacao-jquery');
}

function movarEsquerda(){

}

function alteraValor(){

}

function iniciaFita() {


    setTimeout(function(){
        for(var i = 0; i < 10;i++){
            console.log(i);
            moverDireita(i);
        }
    }, 1000);



}