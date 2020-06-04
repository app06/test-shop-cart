require('./bootstrap');

function sendRequest(method, id) {
    return $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: method,
        dataType: 'JSON',
        url: '/cart',
        data: {
            id: id
        }
    }).fail(function (error) {
        console.log(error);
    });
}

function updateCart(data) {
    var text = `${data.totalItems}шт. - $${data.totalCost}`;
    $('#cart-total').text(text);
}

$('.add-to-cart').on('click', function () {
    sendRequest('put', $(this).data('id'))
        .done(function (response) {
            updateCart(response.data);
        });
});

$('.remove-from-cart').on('click', function () {
    sendRequest('delete', $(this).data('id'))
        .done(function (response) {
            updateCart(response.data);
        });
});
