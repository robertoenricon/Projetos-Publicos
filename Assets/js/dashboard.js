$(document).ready(function() {
    $.getJSON('/listar-clientes')
        .done(function(clientes) {
            $.each(clientes, function(index, cliente) {
                adicionarLinha(cliente);
            });
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            console.error("Erro ao carregar clientes", textStatus, errorThrown);
        });

    
    $('#btnNovo').on('click', function() {
        adicionarLinha();
    });

    $('#btnSalvar').on('click', function() {
        saveJSON();
    });

    $('#tabelaClientes').on('change', '.status-checkbox', function() {
        atualizarStatus($(this));
    });

    $('#tabelaClientes').on('click', '.btn-remover', function() {
        removerLinha($(this));
    });
});

// Adiciona linha para cadastro
function adicionarLinha(cliente = {nome: '', celular: '', data_renovacao: '', status: 'Ativo'}) {
    const isAtivo = cliente.status === 'Ativo';
    
    const linha = `
        <tr>
            <td class="ps-4 align-middle" contenteditable="true">${cliente.nome}</td>
            <td class="align-middle" contenteditable="true">${cliente.celular}</td>
            <td class="align-middle" contenteditable="true">${cliente.data_renovacao}</td>
            <td class="align-middle">
                <div class="form-check form-switch mt-1">
                    <input class="form-check-input status-checkbox" type="checkbox" role="switch" ${isAtivo ? 'checked' : ''}>
                    <label class="form-check-label status-label ${isAtivo ? 'text-success' : 'text-danger'} fw-bold ms-1">${isAtivo ? 'Ativo' : 'Inativo'}</label>
                </div>
            </td>
            <td class="text-center align-middle">
                <button class="btn btn-sm text-danger btn-remover" title="Remover">
                    <i class="bi bi-trash-fill"></i>
                </button>
            </td>
        </tr>
    `;
    
    $('#tabelaClientes tbody').append(linha);
}

// Remove linha
function removerLinha($botao) {
    $botao.closest('tr').remove();
}

// Atualiza Status
function atualizarStatus($checkbox) {
    const $label = $checkbox.next('label');
    
    if ($checkbox.is(':checked')) {
        $label.text('Ativo').removeClass('text-danger').addClass('text-success');
    } else {
        $label.text('Inativo').removeClass('text-success').addClass('text-danger');
    }
}

// Lê a tabela e envia o JSON para o PHP salvar
function saveJSON() {
    const $btn = $('#btnSalvar');
    $btn.html('<span class="spinner-border spinner-border-sm"></span> Salvando...');
    
    const dados = [];

    $('#tabelaClientes tbody tr').each(function() {
        const $colunas = $(this).find('td');
        
        if ($colunas.length >= 4) {
            const $checkboxStatus = $colunas.eq(3).find('.status-checkbox');
            dados.push({
                nome: $colunas.eq(0).text().trim(),
                celular: $colunas.eq(1).text().trim(),
                data_renovacao: $colunas.eq(2).text().trim(),
                status: $checkboxStatus.is(':checked') ? 'Ativo' : 'Inativo'
            });
        }
    });

    // Envia os dados via AJAX
    $.ajax({
        url: '/salvar-clientes',
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify(dados)
    })
    .done(function() {
        $btn.html('<i class="bi bi-check-circle-fill"></i> Salvo com Sucesso!');
        setTimeout(() => {
            $btn.html('<i class="bi bi-cloud-arrow-up-fill"></i> Salvar Alterações');
        }, 2000);
    })
    .fail(function(jqXHR, textStatus, errorThrown) {
        console.error("Erro", textStatus, errorThrown);
        alert("Erro de conexão ao salvar.");
        $btn.html('<i class="bi bi-cloud-arrow-up-fill"></i> Salvar Alterações');
    });
}