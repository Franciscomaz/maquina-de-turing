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
    get returnArrayEstados(){
        var obj = {"array": this.arrayEstados};
        return obj;
    }



}


var estados = new Estados();

function capturaEstado() {
    //Feito para conseguir add mais linha no textarea
    var objTextArea = document.getElementById('txtArea');
    while (objTextArea.scrollHeight > objTextArea.offsetHeight){objTextArea.rows += 1;}

    //Caputura o valor do estado que vem do html
    var estadoCapturado = document.getElementById('estado').value;
    var txtAreaCapturado = document.getElementById('txtArea').value;

    document.getElementById('txtArea').value = txtAreaCapturado+estadoCapturado+"\n";

    //Verifica se nao é espaco vazil
    if (estadoCapturado.trim() !== "") {

        estados.adicionarEstado(estadoCapturado.trim());
        console.log(estados.arrayEstados);
        document.getElementById('estado').value = "";
    } else {
        alert("Errou!")
    }

}

function enviarJson(){

    console.log("teste"+estados.estados);

    $.ajax({
        url: 'teste', // PRecisamos colocar a pagina correta pro json, ele nao ta recebendo o json
        data: estados.estados,
        type: "GET"
    }).done((response) => {
        alert(response);
    }).fail((response) => {
        alert("Deu errado o json!");
    });




}

//
// var string  = "Casa com a palavra exemplo",
//     pattern = {},
//     regexp  = /q[0-9]+,[a-zA-Z]+=q[0-9]+,[a-zA-Z]+,[d|e]/;
//
// console.log(/q[0-9]+,[a-zA-Z]+=q[0-9]+,[a-zA-Z]+,[d|e]/).test("q1,a=q1,a,daa"));