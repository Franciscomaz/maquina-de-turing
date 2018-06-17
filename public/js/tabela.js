let _linhas = new ArrayAssociativo();
let _colunas = new ArrayAssociativo();

function init(linhas, colunas) {
    initColunas(colunas);
    initLinhas(linhas);
}

function initLinhas(linhas) {
    linhas.forEach((value) => {
        addLinha(value);
    })
}

function initColunas(colunas) {
    colunas.forEach((value) => {
        addColuna(value);
    })
}

function addLinha(value) {
    let tr = criarLinha(value);
    for (let index = 0; index < quantidadeDeColunas(); index++) {
        tr.appendChild(criarCelula());
    }
    getTableBody().append(tr);
    _linhas.add(value, _linhas.size());
}

function addColuna(value) {
    let tBody = getTableBody();
    let tr = getTableHeader().children[0];

    tr.appendChild(criarHeader(value));
    for (let index = 0; index < quantidadeDeLinhas(); index++) {
        tBody.children[index].appendChild(criarCelula());
    }

    _colunas.add(value, _colunas.size());
}

function editarCelula(linhaKey, colunaKey, value) {
    getCell(linhaKey, colunaKey).innerHTML = criarDiv(value);
}

function getCell(linhaKey, columnKey) {
    let linhaIndex = _linhas.value(linhaKey);
    let colunaIndex = _colunas.value(columnKey);
    let linha = getTableBody().children[linhaIndex];
    return linha.children[colunaIndex];
}

function criarLinha(value) {
    let tr = document.createElement('tr');
    tr.appendChild(criarHeader(value));
    return tr;
}

function getTableHeader() {
    return document.getElementById('tabela').children[0];
}

function getTableBody() {
    return document.getElementById('tabela').children[1];
}

function criarHeader(value) {
    let th = document.createElement('th');
    th.innerHTML = criarDiv(value);
    return th;
}

function criarCelula() {
    let td = document.createElement('td');
    td.innerHTML = criarDiv('');
    return td;
}

function criarDiv(value) {
    return '<div contenteditable="true">' + value + '</div>'
}

function contemColuna(value) {
    return _colunas.contains(value);
}

function contemLinha(value) {
    return _linhas.contains(value);
}

function quantidadeDeColunas() {
    return getTableHeader().children[0].childElementCount - 1;
}

function quantidadeDeLinhas() {
    return getTableBody().childElementCount;
}
