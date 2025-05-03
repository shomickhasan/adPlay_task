@extends('frontend.main')
@section('ftitle', 'Product Details')
@section('frontend')
@push('css')
    <style>
        .main-img {
            width: 100%;
            border-radius: 10px;
        }
        .carousel img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border: 2px solid transparent;
            border-radius: 8px;
            cursor: pointer;
        }
        .carousel img.active {
            border-color: blue;
        }
        .price {
            font-size: 20px;
            font-weight: 700;
            color: #28292A !important;
        }
        .color-circle {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            border: 2px solid #ccc;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
        }
        .color-circle.selected {
            border-color: #1e3a8a;
        }
        .color-circle .checkmark {
            display: none;
            color: white;
            font-size: 16px;
        }
        .color-circle.selected .checkmark {
            display: block;
        }
        .sizes input {
            display: none;
        }
        .sizes label {
            border: 1px solid #ccc;
            padding: 6px 16px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            margin-right: 10px;
        }
        .sizes input:checked + label {
            background-color: #1e3a8a;
            color: white;
            border-color: #1e3a8a;
        }

        .qty button {
            width: 40px;
            height: 40px;
        }
        button.btn.d-flex.align-items-center.add-to-cart {
            width: 200px;
            background-color: #1e3a8a;
            border-radius: 20px ;
            color: #FFFFFF;
            font-size: 12px;
            text-align: center;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }
        button.btn.d-flex.align-items-center.add-to-cart span{
            text-align: center;
        }

        span.me-3.rating {
            padding: 3px 6px;
            background: #eee6c1;
            font-size: 11px;
            border-radius: 7px;
        }

        span.me-3.review {
            padding: 3px 6px;
            background: #d0cece;
            font-size: 11px;
            border-radius: 7px;
            color: #2f2d2d
        }
        h6.common_level {
            color: #d3d3d3;

        }
        button#decrease {
            border: none;
            outline: none;
            background-color: #eae7e7;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
        }

        button#increase {
            border: none;
            outline: none;
            background-color: #eae7e7;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
        }

        #quantity {
            border: none;
            outline: none;
            background-color: #eae7e7;
        }
    </style>
@endpush
<div class="container">
    <div class="row g-4">
        <!-- Gallery -->
        <div class="col-md-6">
            @php
                $mainImage = $product->image ?? 'default.jpg';
                $galleryImages = $product->productGalleries ?? collect();
            @endphp

            <img id="mainImage" src="{{Storage::url($mainImage) }}" class="main-img img-fluid" />

            <div class="d-flex gap-2 mt-3 carousel flex-wrap">
                @if($galleryImages->count())
                    @foreach($galleryImages as $index => $gallery)
                        <img
                            src="{{ Storage::url($gallery->gallery_image ?? 'default.jpg') }}"
                            class="thumb {{ $index == 0 ? 'active' : '' }}"
                        />
                    @endforeach
                @else
                    <img src="{{ Storage::url($mainImage) }}" class="thumb active" />
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="custom-breadcrumb mb-2">
                <span class="separator"><a href="#">Home</a></span>
                <span class="separator"><a href="#">Product</a></span>
                <span class="separator text-bg-gray"><span>Details</span></span>
            </div>
            <h2 class="large_p_text">{{ $product->product_name }}</h2>
            <span>Teixira Design Studio</span>
            <Br>
            <HR>
            <div class="row align-items-start price_area d-flex flex-row flex-wrap">
                <!-- Price Section -->
                <div class="col-12 col-md-3 price mb-2">
                    <p class="price h5 text-danger mb-0">
                        $<span id="unitPrice">{{ number_format($product->price, 2) }}</span>
                    </p>
                </div>
                <div class="col-12 col-md-9 info">
            <span class="me-3 rating">
                <i class="fas fa-star text-warning"></i> 4.8
            </span>
                    <span class="me-3 review" >
                <i class="fas fa-comment-dots"></i> 67 Reviews
            </span>
                    <p class="one_liner text-muted mt-2">
                        <span class="fw-semibold">93%</span> of buyers recommended this
                    </p>
                </div>
            </div>
            <Br>
            <Br>

            {{-- Colors --}}
            @php
                $colors = $product->productColors ?? collect();
            @endphp
            @if($colors->count())
                <h6 class="common_level">Choose a Color</h6>
                <div class="colors d-flex flex-wrap mb-3">
                    @foreach($colors as $color)
                        <div class="color-circle" style="background:{{ $color->color_code ?? '#ccc' }};" data-color="{{ $color->color_name }}">
                            <span class="checkmark">✔</span>
                        </div>
                    @endforeach
                </div>
                <HR>
            @endif


            {{-- Sizes --}}
            @php
                $sizes = $product->productQuantitys ?? collect();
            @endphp
            @if($sizes->count())
                <h6 class="common_level">Choose a Size</h6>
                <div class="sizes mb-3">
                    @foreach($sizes as $index => $size)
                        <input type="radio" id="size_{{ $index }}" name="size" value="{{ $size->quantity }}" {{ $index === 0 ? 'checked' : '' }}>
                        <label for="size_{{ $index }}">{{ $size->quantity }}</label>
                    @endforeach
                </div>
                <HR>
            @endif
            <div class="d-flex align-items-center flex-wrap gap-3 mt-3 qty">
                <div class="input-group" style="width: auto; max-width: 200px;">
                    <button class="btn btn-outline-secondary" type="button" id="decrease">-</button>
                    <input type="text" id="quantity" class="form-control text-center" value="1" readonly style="max-width: 70px;" />
                    <button class="btn btn-outline-secondary" type="button" id="increase">+</button>
                </div>
                <button class="btn d-flex align-items-center add-to-cart add_to_cart_details" data-product-id="{{ $product->id }}">
                    $<span id="totalPrice" class="mx-1">{{ number_format($product->price, 2) }}</span> Add To Cart
                </button>

            </div>

        </div>

        </div>
        {{-- Description Section --}}
        <div class="mt-5">
            <h6 class="fw-bold">Product Description</h6>
            <p>{!! $product->description ?? 'No description available.' !!}   }}</p>

            {{-- You can optionally include Benefits, Product Details, etc., here based on your DB structure --}}
        </div>
    </div>
</div>


@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $(document).on("click", ".add_to_cart_details", function (e) {
                e.preventDefault();

                let productId = $(this).data("product-id");

                // Select the radio button that is checked
                let sizeInput = $("input[name='size']:checked");
                let sizeId = sizeInput.length ? sizeInput.val() : null;

                // Handle selected color and quantity
                let selectedColor = $(".color-circle.active").data("color") || null;
                let quantity = parseInt($("#quantity").val()) || 1;
                let unitPrice = parseFloat($("#unitPrice").text()) || 0;
                let totalPrice = parseFloat((unitPrice * quantity).toFixed(2));

                if ($("input[name='size']").length > 0 && !sizeId) {
                    showToast('error', 'Please select a size before adding to cart', '');
                    return;
                }

                // Send data via AJAX
                addToCartDetails(productId, sizeId, selectedColor, quantity, totalPrice);
            });


            function addToCartDetails(productId, sizeId, color, quantity, totalPrice) {
                $.ajax({
                    url: '/add-to-cart',
                    method: 'POST',
                    data: {
                        product_id: productId,
                        size: sizeId,
                        color: color,
                        quantity: quantity,
                        total_price: totalPrice,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        showToast('success', 'Product added to cart!', '');
                        cartCount(response.cart); // Update cart counter
                    },
                    error: function (xhr) {
                        showToast('error', xhr.responseJSON?.error || 'Something went wrong', '');
                    }
                });
            }

            //slider management
            let unitPriceText = $('#unitPrice').text().trim();
            let unitPrice = parseFloat(unitPriceText);

            function updateTotal() {
                const qty = parseInt($('#quantity').val());
                $('#totalPrice').text((qty * unitPrice).toFixed(2));
            }

            $('#increase').click(function () {
                let val = parseInt($('#quantity').val());
                $('#quantity').val(++val);
                updateTotal();
            });

            $('#decrease').click(function () {
                let val = parseInt($('#quantity').val());
                if (val > 1) {
                    $('#quantity').val(--val);
                    updateTotal();
                }
            });

            $('.color-circle').click(function () {
                $('.color-circle').removeClass('selected');
                $(this).addClass('selected');
            });

            $('.thumb').click(function () {
                $('.thumb').removeClass('active');
                $(this).addClass('active');
                $('#mainImage').attr('src', $(this).attr('src'));
            });

        });
    </script>
@endpush
