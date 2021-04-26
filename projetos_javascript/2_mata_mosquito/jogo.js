var altura = 0
var largura = 0
var vidas = 1
var tempo = 10
var criaMosquitoTempo = 1500

var nivel = window.location.search
nivel = nivel.replace('?','')

if (nivel === 'normal') {
    criaMosquitoTempo = 1500
} else if (nivel === 'dificil') {
    criaMosquitoTempo = 1000
} else if (nivel === 'expert') {
    criaMosquitoTempo = 750
}

//tamanho da tela do jogo, atualizado a cada mudança de tamanho do browser
function ajustarTamanho() {
    altura = window.innerHeight
    largura = window.innerWidth

    console.log(altura, largura)
}

ajustarTamanho()

//cronômetro
var cronometro = setInterval(function() {
    tempo -= 1
    //valor entre as tags
    if (tempo < 0) {
        clearInterval(cronometro)
        clearInterval(criaMosquito)
        window.location.href = "vitoria.html"
    } else {
        document.getElementById('cronometro').innerHTML = tempo
    }
}, 1000)

//posição dos mosquitos
function posicaoRandomica() {

    //remoção do mosquito anterior (se ele existir)
    if (document.getElementById('mosquito')) {
        document.getElementById('mosquito').remove()

        //checarem das vidas
        if (vidas > 3) {
            window.location.href = "fim_de_jogo.html"
        } else {
            document.getElementById('v'+vidas).src = "img/coracao_vazio.png"
            vidas++
        }
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
    mosquito.onclick = function () {
        this.remove()
    }

}

//tamanho dos mosquitos
function tamanhoAleatorio() {
    //valores: 0, 1 e 2
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
    //valores: 0 e 1
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