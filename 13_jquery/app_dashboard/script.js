$(document).ready(() => {
	$('#documentacao').on('click', () => {
        /* $('#pagina').load('documentacao.html') */
        
        /* $.get('documentacao.html', data => {
            $('#pagina').html(data)
        }) */

        $.post('documentacao.html', data => {
            $('#pagina').html(data)
        })
    })

    $('#suporte').on('click', () => {
        $('#pagina').load('suporte.html')
    })

    //ajax
    $('#competencia').on('change', e => {

        //obtem o valor selecionado do elemento #competencia, em index.html, tipo: string
        let competencia = $(e.target).val()
        
        $.ajax({
            type: 'GET',
            url: 'app.php',
            data: `competencia=${competencia}`, //formato: x-www-form-urlencoded (chave=valor&param2=l)
            dataType: 'json', //objeto literal
            success: dados => { 
                $('#numeroVendas').html(dados.numero_vendas)
                $('#totalVendas').html(dados.total_vendas)
                $('#clientesAtivos').html(dados.clientes_ativos)
                $('#clientesInativos').html(dados.clientes_inativos)
                $('#totalReclamacoes').html(dados.total_reclamacoes)
                $('#totalElogios').html(dados.total_elogios)
                $('#totalSugestoes').html(dados.total_sugestoes)
                $('#totalDespesas').html(dados.total_despesas)
                //total_reclamacoes 1
                //total_elogios     2
                //total_sugestoes   3
                //total_despesas
                console.log(dados) },
            error: erro => { console.log(erro) }
        })
    })
})