$(document).ready(function(){
    $('#form1').submit(function(e){
        e.preventDefault();

        // CAPTURA DE DADOS ENVIADOS NO FORMULÁRIO
        let v_nome = $('#nome-solicitacao').val();
        let v_tipo = $('#tipo-solicitacao').val();
        let v_descricao = $('#descricao-solicitacao').val();

        console.log(v_nome, v_tipo, v_descricao);

        $.ajax({
            url: '../controller/solicitacao.php',
            method: 'POST',
            data: {name: v_nome, tipo: v_tipo, desc: v_descricao},
            dataType : 'json',

        }).done(function(result){
            console.log(result);
        }).fail(function(xhr, status, error){
            console.log('Resposta do servidor: ', xhr.responseText);
            console.log('Status: ',status);
            console.log('Error: ', error);
        });

    });


});

