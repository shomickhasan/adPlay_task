<div class="container">
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light  px-3">
            <div class="container-fluid">
                <!-- Brand Name -->
                <a class="navbar-brand fw-bold " href="#"><i>FashionHub</i></a>

                <!-- Cart Icon with badge -->
                <div class="ms-auto d-flex align-items-center">
                    <a href="#" class="light position-relative me-3">
                        <i class="fas fa-shopping-bag fa-lg"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">
                           {{ $cartCount ?? 0 }}
                        </span>
                    </a>
                </div>
            </div>
        </nav>
    </div>
</div>
<hr>

