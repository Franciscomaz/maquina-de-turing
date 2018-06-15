class Estados {

    constructor() {
        this.arrayEstados = [];
    }

    get estados() {
        return this.arrayEstados;
    }

    adicionarEstado(estado) {
        this.arrayEstados.push(estado);
    }
}


var estados = new Estados();

function capturaEstado() {
    //Caputura o valor do estado que vem do html
    var estadoCapturado = document.getElementById('estado').value;
    //Verifica se nao é espaco vazil
    if (estadoCapturado.trim() !== "") {

        estados.adicionarEstado(estadoCapturado.trim());
        console.log(estados.arrayEstados);
        document.getElementById('estado').value = "";


    } else {
        alert("Errou!")
    }

}

//
// var string  = "Casa com a palavra exemplo",
//     pattern = {},
//     regexp  = /q[0-9]+,[a-zA-Z]+=q[0-9]+,[a-zA-Z]+,[d|e]/;
//
// console.log(/q[0-9]+,[a-zA-Z]+=q[0-9]+,[a-zA-Z]+,[d|e]/).test("q1,a=q1,a,daa"));