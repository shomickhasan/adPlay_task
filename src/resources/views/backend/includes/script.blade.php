<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->

<script src="{{asset('/')}}app-assets/vendor/libs/jquery/jquery.js"></script>
<script src="{{asset('/')}}app-assets/vendor/libs/popper/popper.js"></script>
<script src="{{asset('/')}}app-assets/vendor/js/bootstrap.js"></script>
<script src="{{asset('/')}}app-assets/vendor/libs/node-waves/node-waves.js"></script>
<script src="{{asset('/')}}app-assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="{{asset('/')}}app-assets/vendor/libs/hammer/hammer.js"></script>
<script src="{{asset('/')}}app-assets/vendor/libs/i18n/i18n.js"></script>
<script src="{{asset('/')}}app-assets/vendor/libs/typeahead-js/typeahead.js"></script>
<script src="{{asset('/')}}app-assets/vendor/js/menu.js"></script>

<!-- endbuild -->

<!-- Vendors JS -->

<script src="{{asset('/')}}app-assets/vendor/libs/apex-charts/apexcharts.js"></script>
<script src="{{asset('/')}}app-assets/vendor/libs/swiper/swiper.js"></script>
<script src="{{asset('/')}}app-assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>

<script src="{{asset('/')}}app-assets/vendor/libs/cleavejs/cleave.js"></script>
<script src="{{asset('/')}}app-assets/vendor/libs/cleavejs/cleave-phone.js"></script>
<script src="{{asset('/')}}app-assets/vendor/libs/moment/moment.js"></script>
<script src="{{asset('/')}}app-assets/vendor/libs/flatpickr/flatpickr.js"></script>
<script src="{{asset('/')}}app-assets/vendor/libs/select2/select2.js"></script>
{{-- <script src="{{asset('/')}}app-assets/vendor/libs/select2/select2.js"></script> --}}

<script src="{{asset('/')}}app-assets/js/form-layouts.js"></script>
<!-- Toastr -->
<script src="{{asset('/')}}app-assets/vendor/libs/toastr/toastr.js"></script>
<script src="{{asset('/')}}app-assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
<script src="{{asset('/')}}app-assets/js/extended-ui-sweetalert2.js"></script>
<!-- Main JS -->
<script src="{{asset('/')}}app-assets/js/main.js"></script>

<!-- Page JS -->
<script src="{{asset('/')}}app-assets/js/dashboards-analytics.js"></script>

<!-- include summernote css/js -->

<script src="{{asset('/')}}summernote/summernote-lite.min.js"></script>



<!-- Custom Script Push-->
<script>
    $(document).ready(function() {
        $('#summernoteTwo').summernote();
    });
    $(document).ready(function() {
        $('#summernoteThree').summernote();
    });
    $(document).ready(function() {
        $('#summernotefour').summernote();
    });
    $(document).ready(function() {
        $('#summernotefive').summernote();
    });
    $(document).ready(function() {
        $('#summernotesix').summernote();
    });
    $(document).ready(function() {
        $('#summernoteseven').summernote();
    });
    $(document).ready(function() {
        $('#summernoteeight').summernote();
    });
    $(document).ready(function() {
        $('#summernotenine').summernote();
    });
    $(document).ready(function() {
        $('#summernoteten').summernote();
    });
    $(document).ready(function() {
        $('#summernote11').summernote();
    });
    $(document).ready(function() {
        $('#summernote12').summernote();
    });
    $(document).ready(function() {
        $('#summernote13').summernote();
    });
    $(document).ready(function() {
        $('#summernote14').summernote();
    });


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function deleteConfirmation(id, url) {
        confirmText = document.querySelector("#confirm-text_" + id);
        if (confirmText) {
            confirmText.onclick = function () {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to delete this!",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    customClass: {
                        confirmButton: "btn btn-primary me-3 waves-effect waves-light",
                        cancelButton: "btn btn-label-secondary waves-effect waves-light",
                    },
                    buttonsStyling: false,
                }).then(function (e) {
                    if (e.value === true) {
                        $.ajax({
                            type: "DELETE",
                            url: url,
                            data: { id: id }, // No need to manually send _token now
                            success: function (resp) {
                                $('.datatables-products').load(location.href + ' .datatables-products');
                                Swal.fire({
                                    icon: "success",
                                    title: "Deleted!",
                                    text: "Your file has been deleted.",
                                    customClass: {
                                        confirmButton: "btn btn-success waves-effect waves-light",
                                    },
                                });
                            },
                            error: function (resp) {
                                Swal.fire({
                                    icon: "error",
                                    title: "Failed!",
                                    text: "Something went wrong. Unable to delete.",
                                    customClass: {
                                        confirmButton: "btn btn-danger waves-effect waves-light",
                                    },
                                });
                            },
                        });
                    } else {
                        e.dismiss;
                    }
                });
            };
        }
    }

</script>

<script>
    function dynamicStatusChange(id,status,url) {
        confirmText = document.querySelector("#confirm-text_" + id + "_" + status);
        if (confirmText) {
            confirmText.onclick = function () {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to change  this status!",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Yes, change it!",
                    customClass: {
                        confirmButton: "btn btn-primary me-3 waves-effect waves-light",
                        cancelButton: "btn btn-label-secondary waves-effect waves-light",
                    },
                    buttonsStyling: false,
                }).then(function (e) {
                    if (e.value === true) {
                        $.ajax({
                            type: "GET",
                            url: url,
                            data: {
                                _token: "{{ csrf_token() }}",
                                id: id,
                                status:status
                            },
                            success: function (resp) {
                                $('.datatables-products').load(location.href + ' .datatables-products');
                                Swal.fire({
                                    icon: "success",
                                    title: "Status!",
                                    text: "Your status has been change.",
                                    customClass: {
                                        confirmButton: "btn btn-success waves-effect waves-light",
                                    },
                                });
                            },
                            error: function (resp) {
                                Swal.fire({
                                    icon: "warning",
                                    title: "Status!",
                                    text: "Your status has been change.",
                                    customClass: {
                                        confirmButton: "btn btn-success waves-effect waves-light",
                                    },
                                });
                            },
                        });
                    } else {
                        e.dismiss;
                    }
                });
            };
        }
    }
</script>
<script>


    //toster initilaxitions
    @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.success("{{ session('message') }}");
    @endif

    @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.error("{{ session('error') }}");
    @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.info("{{ session('info') }}");
    @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.warning("{{ session('warning') }}");
    @endif
</script>

<script>
    $(document).ready(function () {
        $("#image").on("change",function (event) {
            let image = $(this).closest(".image-div").find(".image-show");
            image.attr("src",URL.createObjectURL(event.target.files[0]));
        });
        $("#imagetwo").on("change", function (event) {
            let file = event.target.files[0];
            let pdfNameTag = $(this).closest(".imagetwo-div").find("#pdf-name");

            if (file && file.type === "application/pdf") {
                pdfNameTag.text(`Selected PDF: ${file.name}`);
            } else {
                pdfNameTag.text("");
            }
        });
        $("#imagetheree").on("change", function (event) {
            let file = event.target.files[0];
            let pdfNameTag = $(this).closest(".imagetheree-div").find("#pdftheree-name");

            if (file && file.type === "application/pdf") {
                pdfNameTag.text(`Selected PDF: ${file.name}`);
            } else {
                pdfNameTag.text("");
            }
        });
        $("#imagefour").on("change", function (event) {
            let file = event.target.files[0];
            let pdfNameTag = $(this).closest(".imagefour-div").find("#pdffour-name");

            if (file && file.type === "application/pdf") {
                pdfNameTag.text(`Selected PDF: ${file.name}`);
            } else {
                pdfNameTag.text("");
            }
        });
        $("#imagefive").on("change", function (event) {
            let file = event.target.files[0];
            let pdfNameTag = $(this).closest(".imagefive-div").find("#pdffive-name");

            if (file && file.type === "application/pdf") {
                pdfNameTag.text(`Selected PDF: ${file.name}`);
            } else {
                pdfNameTag.text("");
            }
        });
        $("#imagesix").on("change", function (event) {
            let file = event.target.files[0];
            let pdfNameTag = $(this).closest(".imagesix-div").find("#pdfsix-name");

            if (file && file.type === "application/pdf") {
                pdfNameTag.text(`Selected PDF: ${file.name}`);
            } else {
                pdfNameTag.text("");
            }
        });
        $("#imageseven").on("change", function (event) {
            let file = event.target.files[0];
            let pdfNameTag = $(this).closest(".imageseven-div").find("#pdfseven-name");

            if (file && file.type === "application/pdf") {
                pdfNameTag.text(`Selected PDF: ${file.name}`);
            } else {
                pdfNameTag.text("");
            }
        });
        $("#imageEight").on("change",function (event) {
            let image = $(this).closest(".imageEight-div").find(".imageEight-show");
            image.attr("src",URL.createObjectURL(event.target.files[0]));
        });
        $("#imageNine").on("change",function (event) {
            let image = $(this).closest(".imageNine-div").find(".imageNine-show");
            image.attr("src",URL.createObjectURL(event.target.files[0]));
        });
    });

    $(".filter-btn").click(function() {
        $(".filter").slideToggle(300);
    });
    function resetForm() {
        var form = document.getElementById('searchForm');
        form.reset();

        $('.select2').val(null).trigger('change');
    }
</script>
@stack('script')
