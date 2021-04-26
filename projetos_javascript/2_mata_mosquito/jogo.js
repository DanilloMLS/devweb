var altura = 0
var largura = 0

//tamanho da tela do jogo, atualizado a cada mudança de tamanho do browser
function ajustarTamanho() {
    altura = window.innerHeight
    largura = window.innerWidth

    console.log(altura, largura)
}

ajustarTamanho()

//posição dos mosquitos
function posicaoRandomica() {

    //remoção do mosquito anterior (se ele existir)
    if (document.getElementById('mosquito')) {
        document.getElementById('mosquito').remove()        
    }

    //coordenadas da posição do mosquito
    var x = Math.floor(Math.random() * largura) - 90
    var y = Math.floor(Math.random() * altura) - 90

    x = x < 0 ? 0 : x
    y = y < 0 ? 0 : y

    console.log(y,x)

    //criação do mosquito (elemento <img>)
    var mosquito = document.createElement('img')
    mosquito.src = 'img/mosca.png'
    mosquito.className = tamanhoAleatorio() + ' ' + ladoAleatorio()
    mosquito.style.left = x + 'px'
    mosquito.style.top = y + 'px'
    mosquito.style.position = 'absolute'
    document.body.appendChild(mosquito)
    mosquito.id = 'mosquito'

}

//tamanho dos mosquitos
function tamanhoAleatorio() {
    var classe = Math.floor(Math.random() * 3)

    switch (classe) {
        case 0:
            return 'mosquito1'            
        case 1:
            return 'mosquito2'
        case 2:
            return 'mosquito3'
        default:
            return 'mosquito1'
    }
}

//gira o mosquito
function ladoAleatorio() {
    var classe = Math.floor(Math.random() * 2)

    switch (classe) {
        case 0:
            return 'ladoA'            
        case 1:
            return 'ladoB'
        default:
            return 'ladoA'
    }
}