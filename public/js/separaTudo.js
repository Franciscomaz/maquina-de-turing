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
    // $.post({
    //     url: 'http://localhost/maquina-de-turing/teste',
    //     data: estados,
    //     // type: "POST"
    // }).done((response) => {
    //     alert("Deu certo o json!");
    // }).fail((response) => {
    //     alert("Deu errado o json!");
    // });
    $.ajax({
        type: "POS",
        data: { "teste": "teste" },
        url: "http://localhost/maquina-de-turing/teste",
        success: function(data) {
            console.log("teste");
        }
    });




    // var testee = { "testando" :"testando"}
    // console.log(testee);
    // $.post( "test.php", { name: "John", time: "2pm" } );





}

//
// var string  = "Casa com a palavra exemplo",
//     pattern = {},
//     regexp  = /q[0-9]+,[a-zA-Z]+=q[0-9]+,[a-zA-Z]+,[d|e]/;
//
// console.log(/q[0-9]+,[a-zA-Z]+=q[0-9]+,[a-zA-Z]+,[d|e]/).test("q1,a=q1,a,daa"));