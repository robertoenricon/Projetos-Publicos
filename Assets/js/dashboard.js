$(document).ready(function() {
    // Fetch and list customers
    $.getJSON('/list-customers')
        .done(function(customers) {
            $.each(customers, function(index, customer) {
                addRow(customer);
            });
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            console.error("Error loading customers", textStatus, errorThrown);
        });

    // Event Listeners
    $('#btnNew').on('click', function() {
        addRow();
    });

    $('#btnSave').on('click', function() {
        saveJSON();
    });

    $('#customerTable').on('change', '.status-checkbox', function() {
        updateStatus($(this));
    });

    $('#customerTable').on('click', '.btn-remove', function() {
        removeRow($(this));
    });
    
    $('#customerTable').on('click', '.btn-whatsapp-circle', function() {
        const $btn = $(this);
        const $row = $btn.closest('tr');
        
        const name = $btn.attr('data-name');
        const phone = $row.find('.customer-phone').text().trim().replace(/\D/g, '');
        
        $('#modalCustomerName').text(name);
        $('#modalCustomerPhone').val(phone);
        
        const defaultMsg = `Hello ${name}, we noticed your renewal is due soon. Shall we renew?`;
        $('#messageText').val(defaultMsg);
        
        const myModal = new bootstrap.Modal(document.getElementById('modalWhatsApp'));
        myModal.show();
    });

    $('#btnConfirmSend').on('click', function() {
        const phone = $('#modalCustomerPhone').val();
        const message = $('#messageText').val();
        
        if (!phone) {
            alert("Phone number not found.");
            return;
        }

        const url = `https://wa.me/55${phone}?text=${encodeURIComponent(message)}`;
        window.open(url, '_blank');
        
        bootstrap.Modal.getInstance(document.getElementById('modalWhatsApp')).hide();
    });
});

// Adds a new row to the table
function addRow(customer = {name: '', phone: '', date: '', status: 'Active'}) {
    const isActive = customer.status === 'Active';
    
    const row = `
        <tr>
            <td class="ps-4 align-middle" contenteditable="true">${customer.name}</td>
            <td class="align-middle">
                <div class="d-flex align-items-center gap-3">
                    <div class="customer-phone text-white" contenteditable="true" style="outline: none;">
                        ${customer.phone}
                    </div>
                    
                    <button class="btn-whatsapp-circle btn-trigger-whatsapp" title="Send Message" data-name="${customer.name}">
                        <i class="bi bi-whatsapp"></i>
                    </button>
                </div>
            </td>
            <td class="align-middle" contenteditable="true">${customer.date}</td>
            <td class="align-middle">
                <div class="form-check form-switch mt-1">
                    <input class="form-check-input status-checkbox" type="checkbox" role="switch" ${isActive ? 'checked' : ''}>
                    <label class="form-check-label status-label ${isActive ? 'text-success' : 'text-danger'} fw-bold ms-1">
                        ${isActive ? 'Ativo' : 'Inativo'}
                    </label>
                </div>
            </td>
            <td class="text-center align-middle">
                <button class="btn btn-sm text-danger btn-remove" title="Remove">
                    <i class="bi bi-trash-fill"></i>
                </button>
            </td>
        </tr>
    `;
    
    $('#customerTable tbody').append(row);
}

// Removes a row
function removeRow($btn) {
    $btn.closest('tr').remove();
}

// Updates the status label
function updateStatus($checkbox) {
    const $label = $checkbox.next('label');
    
    if ($checkbox.is(':checked')) {
        $label.text('Ativo').removeClass('text-danger').addClass('text-success');
    } else {
        $label.text('Inativo').removeClass('text-success').addClass('text-danger');
    }
}

// Scans table and saves JSON via AJAX
function saveJSON() {
    const $btn = $('#btnSave');
    $btn.html('<span class="spinner-border spinner-border-sm"></span> Saving...');
    
    const data = [];

    $('#customerTable tbody tr').each(function() {
        const $cols = $(this).find('td');
        
        if ($cols.length >= 4) {
            const $statusCheckbox = $cols.eq(3).find('.status-checkbox');
            data.push({
                name: $cols.eq(0).text().trim(),
                phone: $cols.eq(1).text().trim(),
                date: $cols.eq(2).text().trim(),
                status: $statusCheckbox.is(':checked') ? 'Active' : 'Inactive'
            });
        }
    });

    $.ajax({
        url: '/save-customers',
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify(data)
    })
    .done(function() {
        $btn.html('<i class="bi bi-check-circle-fill"></i> Saved Successfully!');
        setTimeout(() => {
            $btn.html('<i class="bi bi-cloud-arrow-up-fill"></i> Save Changes');
        }, 2000);
    })
    .fail(function(jqXHR, textStatus, errorThrown) {
        console.error("Error", textStatus, errorThrown);
        alert("Connection error while saving.");
        $btn.html('<i class="bi bi-cloud-arrow-up-fill"></i> Save Changes');
    });
}