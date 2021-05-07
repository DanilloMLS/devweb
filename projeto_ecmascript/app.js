class Despesa {
    constructor (ano,mes,dia,tipo,descricao,valor){
        this.ano = ano
        this.mes = mes
        this.dia = dia
        this.tipo = tipo
        this.descricao = descricao
        this.valor = valor
    }

    validarDados() {
        for (let i in this) {
            if (this[i] == undefined || this[i] =='' || this[i] == null) {
                return false
            }
        }
        return true
    }
}

class Bd {

    constructor() {
        let id = localStorage.getItem('id')
        if (id === null) {
            localStorage.setItem('id', 0)
        }
    }

    //define um novo id para uma nova despesa
    getProximoId() {
        let proximoId = localStorage.getItem('id')
        return parseInt(proximoId) + 1
    }

    //para usar localStorage, devemos passar o objeto como JSON
    gravar(d) {
        //localStorage.setItem('despesa', JSON.stringify(d))
        let id = this.getProximoId()
        localStorage.setItem(id, JSON.stringify(d))
        localStorage.setItem('id',id)
    }

    recuperarTodosRegistros() {
        //console.log('Ok')
        let despesas = Array()
        let id = localStorage.getItem('id')
        for (let i = 1; i <= id; i++) {
            let despesa = JSON.parse(localStorage.getItem(i))
            if (despesa != null) {
                despesas.push(despesa)
            }
        }
        return despesas
    }
}

let bd = new Bd()

function cadastrarDespesa() {
    //é possível usar .value na variável (ano.value)
    let ano = document.getElementById('ano').value
    let mes = document.getElementById('mes').value
    let dia = document.getElementById('dia').value
    let tipo = document.getElementById('tipo').value
    let descricao = document.getElementById('descricao').value
    let valor = document.getElementById('valor').value

    let despesa = new Despesa(
        ano,mes,dia,tipo,descricao,valor
    )
    
    if (despesa.validarDados()) {
        bd.gravar(despesa)
        sucessoGravacao()
        $('#registraDespesa').modal('show')
    } else {
        erroGravacao()
        $('#registraDespesa').modal('show')
    }
}

function carregaListaDespesas() {
    let despesas = Array()
    despesas = bd.recuperarTodosRegistros()
    

    //selecionando o tbody da tabela
    let listaDespesas = document.getElementById('listaDespesas')
    despesas.forEach(function (d) {
        //console.log(d)
        let linha = listaDespesas.insertRow()

        //inserir valores na linha
        linha.insertCell(0).innerHTML = `${d.dia}/${d.mes}/${d.ano}`
        switch (d.tipo) {
            case '1': d.tipo = 'Alimentação'
                break;
            case '2': d.tipo = 'Educação'
                break;
            case '3': d.tipo = 'Lazer'
                break;
            case '4': d.tipo = 'Saúde'
                break;
            case '5': d.tipo = 'Transporte'
                break;
            default:
                break;
        }
        linha.insertCell(1).innerHTML = d.tipo
        linha.insertCell(2).innerHTML = d.descricao
        linha.insertCell(3).innerHTML = d.valor
    })
}

//modifica o modal em caso de sucesso na gravação
function sucessoGravacao() {
    document.getElementById('cabecalho').className = 'modal-header text-success'
    document.getElementById('textoCabecalho').innerHTML = 'Registro salvo'
    document.getElementById('mensagem').innerHTML = 'Dados gravados com sucesso'
    document.getElementById('botao').className = 'btn btn-success'
    document.getElementById('botao').innerText = 'Ok'
}

//modifica o modal em caso de falha na gravação
function erroGravacao() {
    document.getElementById('cabecalho').className = 'modal-header text-danger'
    document.getElementById('textoCabecalho').innerHTML = 'Erro na gravação'
    document.getElementById('mensagem').innerHTML = 'Todos os dados são obrigatórios'
    document.getElementById('botao').className = 'btn btn-danger'
    document.getElementById('botao').innerText = 'Voltar e corrigir'
}