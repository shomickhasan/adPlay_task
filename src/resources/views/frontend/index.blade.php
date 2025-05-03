@extends('frontend.main')
@section('ftitle', 'Home')
@section('frontend')

    <!-- product area start -->
    <section class="product__area pt-60 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        @if($products->isNotEmpty())
                            <div class="shop__content-area">
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-grid" role="tabpanel" aria-labelledby="pills-grid-tab">
                                        <div class="row custom-row-10">
                                            @foreach ($products as $trending)
                                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 custom-col-10">
                                                    <div class="product__wrapper mb-60">
                                                        <div class="product__thumb">
                                                            <a href="{{route('fproductDetails',$trending->slug)}}" class="w-img">
                                                                <img src="{{ Storage::url($trending->image) }}" alt="product-img">
                                                                <img class="product__thumb-2" src="{{ Storage::url($trending->image) }}" alt="product-img">
                                                            </a>
                                                        </div>
                                                        <div class="product__content p-relative">
                                                            <div class="product__content-inner">
                                                                <h4><a href="{{route('fproductDetails',$trending->slug)}}">{{$trending->product_name ?? ''}}</a></h4>
                                                                <div class="product__price-2">
                                                                    <span class="old-price">{{isset($trending->discount_price) ? $trending->price : '' }}</span>
                                                                </div>
                                                                <a href="{{route('fproductDetails',$trending->slug)}}" class="btn btn-dark  mb-2"
                                                                   data-product-id="{{ $trending->id }}">
                                                                    View Details
                                                                </a><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-40">
                                    <div class="col-xl-12">
                                        <div class="shop-pagination-wrapper d-md-flex justify-content-between align-items-center">
                                            {{ $products->links('frontend.pagination.custom') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <p>No products found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            // Add to Cart handler
            $(document).on("click", ".add_to_cart", function (e) {
                e.preventDefault();
                let productId = $(this).data("product-id");
                addToCart(productId);
            });

            // Buy Now handler
           /* $(document).on("click", ".buy_now_btn", function (e) {
                e.preventDefault();

                let productId = $(this).data('product-id');
                let quantityId = $(this).data('quantity-id');
                let quantity = $(this).data('quantity') || 1;

                $.ajax({
                    url: "",
                    method: "POST",
                    data: {
                        _token: "",
                        product_id: productId,
                        quantity_id: quantityId,
                        quantity: quantity
                    },
                    success: function (response) {
                        if (response.redirect_url) {
                            window.location.href = response.redirect_url;
                        }
                    },
                    error: function (xhr) {
                        let errorMsg = xhr.responseJSON?.error || 'Something went wrong.';
                        alert(errorMsg);
                    }
                });
            });*/
        });
    </script>
@endpush
