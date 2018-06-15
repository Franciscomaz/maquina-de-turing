var json = {
    "tabela": {
        "estadoInicial": {
            "nome": "->",
            "deveParar": 0,
            "aceitar": 0
        },
        "estados": {
            "->": 0,
            "q0": 1,
            "q1": 2,
            "q2": 3
        },
        "simbolos": {
            "->": 0,
            "*": 1,
            "_": 2
        },
        "acoes": [
            {
                "proximoEstado": {
                    "nome": "->",
                    "deveParar": 0,
                    "aceitar": 0
                },
                "escrever": "->",
                "direcao": 1,
                "estado": "->",
                "simbolo": "->"
            },
            {
                "proximoEstado": {
                    "nome": "q0",
                    "deveParar": 0,
                    "aceitar": 0
                },
                "escrever": "*",
                "direcao": 1,
                "estado": "->",
                "simbolo": "_"
            },
            {
                "proximoEstado": {
                    "nome": "->",
                    "deveParar": 0,
                    "aceitar": 0
                },
                "escrever": "*",
                "direcao": 1,
                "estado": "->",
                "simbolo": "*"
            },
            {
                "proximoEstado": {
                    "nome": "q0",
                    "deveParar": 0,
                    "aceitar": 0
                },
                "escrever": "*",
                "direcao": 1,
                "estado": "q0",
                "simbolo": "*"
            },
            {
                "proximoEstado": {
                    "nome": "q1",
                    "deveParar": 0,
                    "aceitar": 0
                },
                "escrever": "_",
                "direcao": -1,
                "estado": "q0",
                "simbolo": "_"
            },
            {
                "proximoEstado": {
                    "nome": "q2",
                    "deveParar": 1,
                    "aceitar": 1
                },
                "escrever": "_",
                "direcao": 1,
                "estado": "q1",
                "simbolo": "*"
            }
        ]
    },
    "fita": [
        "->",
        "*",
        "*",
        "_",
        "*",
        "*"
    ]
};

post();

function post(){
    $.ajax({
        url: 'https://localhost/maquina-de-turing/verificar',
        data: json,
        type: "POST"
    }).done((response) => {
       console.log(response)
    }).fail((response) => {
        console.log(response)
    });
}