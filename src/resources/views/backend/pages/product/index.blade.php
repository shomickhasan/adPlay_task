@extends('backend.template.template')
@section('title','Product')
@section('main')
    <h4 class="py-3 mb-4 fs-5 ">
        <span class="text-muted fw-light">Administration /</span>
        <span class="heading-color">All Products</span>
    </h4>
    <div class="card">
        <div class="card-header">
            <a href="{{ route('product.create') }}" style="color: white;">
                <button class="btn btn-secondary add-new btn-primary waves-effect waves-light" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddProduct">
                <span>
                    <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                    <span class="d-none d-sm-inline-block">Add New Product</span>
                </span>
                </button>
            </a>
            <div class="btn-group">
                <button class="btn filter-btn btn-secondary add-new btn-primary waves-effect waves-light">
                    <span><i class="ti ti-filter me-0 me-sm-1 ti-xs"></i>&nbsp; Filter</span>
                </button>
            </div>
        </div>
        <div class="card-body">
            <form class="dt_adv_search filter" method="get" action="{{ route('product.index') }}" id="searchForm" style="display: none">
                <div class="row">
                    <div class="col-12">
                        <div class="row g-3">
                            <div class="col-12 col-sm-6 col-lg-3">
                                <label class="form-label">Product Name:</label>
                                <input type="text" name="product_name" class="form-control dt-input" data-column="3" placeholder="Product Name" data-column-index="2">
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-end" style="justify-content: start;">
                                <div class="input-group-append me-2" id="button-addon2">
                                    <button id="search" class="btn btn-md btn-primary waves-effect waves-light index-search" type="button">
                                        <span><i class="ti ti-filter me-0 me-sm-1 ti-xs"></i>&nbsp; Filter</span>
                                    </button>
                                </div>
                                <div class="input-group-append" id="button-addon2">
                                    <button class="btn btn-md btn-danger waves-effect waves-light" onclick="resetForm()" type="reset">
                                        <span><i class="ti ti-square-x me-0 me-sm-1 ti-xs"></i>&nbsp; Clear</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div id="filterTable">
            <div class="card-datatable table-responsive">
                <table class="datatables-products table item_table table-hover">
                    <thead class="border-top">
                    <tr>
                        <th>#</th>
                        <th>Created At</th>
                        <th>Product Name</th>
                        <th> Price</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        <tr id="deleteitem_remove_{{ $product->id }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->created_at->format('d M Y') }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->price }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mb-2">
                {{ $products->links('backend.pagination.custome') }}
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $('#search').on('click', function() {
            var formData = $('#searchForm').serialize();
            $.ajax({
                type: 'GET',
                url: '{{ route('product.index') }}',
                data: formData,
                success: function(response) {
                    $('#filterTable').html(response);
                },
                error: function(error) {
                    // Handle the error
                }
            });
        });

       /* function deleteConfirmation(productId, deleteUrl) {
            // Add your delete confirmation logic here
        }*/
    </script>
@endpush
