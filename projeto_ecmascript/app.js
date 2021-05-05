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
    
    gravar(despesa)
}

//para usar localStorage, devemos passar o objeto como JSON
function gravar(d) {
    localStorage.setItem('despesa', JSON.stringify(d))
}