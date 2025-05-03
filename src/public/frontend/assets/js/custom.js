function addToCart(productId) {
    $.ajax({
        url: '/add-to-cart',
        method: 'POST',
        data: {
            product_id: productId,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            showToast('success', 'Product added to cart!', '');
            cartCount(response.cart);
        },
        error: function(xhr) {
            showToast('error', 'Something Wrong', '');
        }
    });
}

function cartCount(cart) {
    let totalItems = Object.keys(cart).length;
    $("#cart-count").text(totalItems);
}

function showToast(type, message, title = '', position = 'toast-bottom-left', timeout = 3000) {
    toastr.options = {
        closeButton: true,
        progressBar: true,
        positionClass: position,
        timeOut: timeout,
        extendedTimeOut: 2000,
        showMethod: 'fadeIn',
        hideMethod: 'fadeOut',
        tapToDismiss: true,
        onShown: function() {
            let bgColor;
            switch (type) {
                case 'success': bgColor = '#141514'; break;
                case 'error': bgColor = '#b91c1c'; break;
                case 'info': bgColor = '#0d6efd'; break;
                case 'warning': bgColor = '#f59e0b'; break;
                default: bgColor = '#333';
            }
            $('.toast-' + type).css('background-color', bgColor);
        }
    };
    toastr[type](message, title);
}


// Function to Get Icons Based on Type
function getIcon(type) {
    switch (type) {
        case 'success': return 'fas fa-check-circle';
        case 'error': return 'fas fa-exclamation-triangle';
        case 'info': return 'fas fa-info-circle';
        case 'warning': return 'fas fa-exclamation-circle';
        default: return 'fas fa-bell';
    }
}





