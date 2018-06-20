let id = 0;

function initFita(fita) {
    while (id < fita.length) {
        adicionarCelula(fita[id]);
    }
}

function adicionarCelula(conteudoDaDiv) {
    $(document.getElementById('lineBox')).append('<div contenteditable="true" id="box' + id++ + '" class="box">' + conteudoDaDiv + '</div>');
}

function getFita() {
    let fita = document.getElementById('lineBox');
    let celulas = [];
    for (let i = 0; i < fita.children.length; i++) {
        celulas.push(fita.children[i].textContent);
    }
    return celulas;
}
