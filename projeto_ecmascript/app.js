class Despesa {
    constructor (ano,mes,dia,tipo,descricao,valor){
        this.ano = ano
        this.mes = mes
        this.dia = dia
        this.tipo = tipo
        this.descricao = descricao
        this.valor = valor
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
    
    bd.gravar(despesa)
}