@extends('backend.template.template')
@section('title',"Add New Product")
@push('css')
@endpush
@section('main')

    <div class="row mb-2">
        <div class="col">
            <h4 class="py-3 mb-4 fs-5 d-inline">
                <span class="text-muted fw-light">Adminstration /</span>
                <span class="heading-color">Add New Product</span>
            </h4>
        </div>
        <div class="col text-end">
            <a href="{{ route('product.index') }}" style="color: white;" type="submit"
               class="btn btn-primary me-sm-3 me-1 waves-effect waves-light"><i class="ti ti-arrow-left me-sm-1 ti-xs"></i> All Category</a>
        </div>
    </div>

    <div class="row">
        <!-- Basic Layout -->
        <div class="col-md-10 m-auto">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Add New Product</h5>
                </div>
                <div class="card-body">
                    <form id="product-form" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label text-sm-end" for="product-name">Product Name</label>
                                    <div class="col-sm-9">
                                        <input name="product_name" type="text" class="form-control @error('product_name') is-invalid @enderror"
                                               id="product-name" placeholder="Product Name" value="{{old('product_name')}}"  />
                                        @error('product_name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label text-sm-end" for="min-price"> Price</label>
                                    <div class="col-sm-9">
                                        <input name="price" type="number" class="form-control @error('price') is-invalid @enderror"
                                               id="min-price" placeholder=" Price" value="{{old('price')}}"  />
                                        @error('price')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div id="quantity-wrapper">
                                <div class="row mb-3 quantity-group">
                                    <label class="col-sm-3 col-form-label text-sm-end">Size</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="quantities[]" class="form-control quantity-input @error('quantities.*') is-invalid @enderror" placeholder="Enter Size">
                                        @error('quantities.0')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-sm-1">
                                        <button type="button" class="btn btn-success add-more">+</button>
                                    </div>
                                </div>
                            </div>
                            <div id="color-wrapper">
                                <div class="row mb-3 color-group">
                                    <label class="col-sm-3 col-form-label text-sm-end">Color</label>
                                    <div class="col-sm-4">
                                        <input type="color" name="colors[]" class="form-control form-control-color" title="Choose a color">
                                        @error('colors.0')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-sm-1">
                                        <button type="button" class="btn btn-success add-color">+</button>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label text-sm-end" for="short-description">Description</label>
                                    <div class="col-sm-9">
                                        <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                                  id="summernoteTwo" placeholder="Short Description">{{ old('description') }}</textarea>
                                        @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row mb-3 image-div">
                                    <label class="col-sm-3 col-form-label text-sm-end" for="image">Thumbnail</label>
                                    <div class="col-sm-9">
                                        <input name="image" type="file" class="form-control @error('image') is-invalid @enderror"
                                               id="image" />
                                        @error('image')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-3"></div>
                                    <div class="col-sm-8 mt-5" style="height: 70px;width: 100px;">
                                        <img class="img-responsive image-show" src="{{asset('image/no-image-uploded-2.png')}}"  alt="" style="height:100%;width: 100%;"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row mb-3 image-div">
                                    <label class="col-sm-3 col-form-label text-sm-end" for="gallery_images">Gallery Images</label>
                                    <div class="col-sm-9">
                                        <input name="gallery_images[]" type="file" class="form-control @error('gallery_images') is-invalid @enderror"
                                               id="gallery_images" multiple />
                                        @error('gallery_images')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror

                                        <!-- Image preview section -->
                                        <div class="col-md-12">
                                            <div class="row mt-3" id="gallery-preview"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="row justify-content-end">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary me-sm-3 me-1 waves-effect waves-light">Submit</button>
                                        <button type="reset" class="btn btn-label-secondary waves-effect">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('script')
<script>
    $(document).ready(function() {
        // Add more quantity & price fields
        $(document).on('click', '.add-more', function() {
            let html = `<div class="row mb-3 quantity-group">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-4">
                                <input type="text" name="quantities[]" class="form-control quantity-input" placeholder="Enter Quantity">
                                <p class="text-danger quantity-error"></p> <!-- Placeholder for error message -->
                            </div>
                            <div class="col-sm-1">
                                <button type="button" class="btn btn-danger remove">-</button>
                            </div>
                        </div>`;
            $('#quantity-wrapper').append(html);
        });

        $(document).on('click', '.add-color', function () {
            let html = `<div class="row mb-3 color-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-4">
                        <input type="color" name="colors[]" class="form-control form-control-color" title="Choose a color">
                        <p class="text-danger color-error"></p>
                    </div>
                    <div class="col-sm-1">
                        <button type="button" class="btn btn-danger color_remove">-</button>
                    </div>
                </div>`;
            $('#color-wrapper').append(html);
        });


        // Remove quantity & price fields
        $(document).on('click', '.remove', function() {
            $(this).closest('.quantity-group').remove();
        });

        $(document).on('click', '.color_remove', function () {
            $(this).closest('.row').remove();
        });




        $("#product-form").submit(function (event) {
            event.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url: "{{ route('product.store') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    $(".text-danger").remove(); // Remove previous error messages
                    $(".is-invalid").removeClass("is-invalid"); // Remove invalid class
                },
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.message, "Success!");
                        $("#product-form")[0].reset(); // Reset form
                        setTimeout(() => {
                            window.location.href = "{{ route('product.index') }}";
                        }, 2000);
                    } else {
                        toastr.error(response.message, "Error!");
                    }
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function (field, messages) {
                            let input = $('[name="' + field + '"]');
                            if (field.startsWith('quantities') || field.startsWith('prices')) {

                                // Extract the index from the field name (quantities.0, prices.0, etc.)
                                let index = field.split('.').pop(); // Get index from quantities.0 or prices.0

                                // Dynamically find the correct input for quantities and prices
                                input = $('[name="' + field + '"]');
                                input.addClass("is-invalid");

                                // Find the parent div to append the error message
                                let parentDiv = input.closest('.quantity-group').find('.col-sm-4');
                                parentDiv.append('<p class="text-danger">' + messages[0] + "</p>");
                                console.log(messages[0]);
                            }
                            // Check if it's a radio button group
                            if (input.attr("type") === "radio") {
                                let parentDiv = input.closest(".col-sm-9"); // Find the nearest wrapper div
                                if (parentDiv.find(".text-danger").length === 0) {
                                    parentDiv.append('<p class="text-danger">' + messages[0] + "</p>");
                                }
                            } else {
                                input.addClass("is-invalid");
                                input.after('<p class="text-danger">' + messages[0] + "</p>");
                            }
                        });
                    } else {
                        toastr.error("Something went wrong. Please try again.", "Error!");
                    }
                },
            });
        });


    });


    $(document).on('change', '#gallery_images', function () {
        let preview = $('#gallery-preview');
        preview.html(''); // clear previous previews
        let files = this.files;

        if (files) {
            Array.from(files).forEach(file => {
                let reader = new FileReader();
                reader.onload = function (e) {
                    let img = `<div class="col-md-2 mb-2">
                              <img src="${e.target.result}" class="img-thumbnail" style="height: 100px; width: 100%;">
                           </div>`;
                    preview.append(img);
                };
                reader.readAsDataURL(file);
            });
        }
    });

</script>

@endpush

