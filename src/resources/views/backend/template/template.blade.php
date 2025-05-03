<!DOCTYPE html>
<html class="loading light-style" lang="en" data-textdirection="ltr">
<!---------------------BEGIN: Head------------------->
@include('backend.includes.header')

<!---------------------END: Head---------------------->


<body>
    <div class="spinner-container" id="loading" style="display: none;">
        <!-- Spinner -->
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <!-------------------BEGIN: Main Menu------------------------>
            @include('backend.includes.menu')
            <!-- ----------------END: Main Menu-------------------------->

            <!-- Layout container -->
            <div class="layout-page">

                <!-------------------BEGIN: Navbar------------------------>
                @include('backend.includes.navbar')
                <!-- ----------------END: Navbar-------------------------->
                


                <!-- Content wrapper -->
                <div class="content-wrapper">

                    
                    <div class="flex-grow-1 container-p-y container-fluid">
                        @yield('main')
                    </div>
                    <!-- / Content -->


                    <!--------------------BEGIN: Footer---------------------------->
                    @include('backend.includes.footer')
                    <!--------------------END: Footer----------------====---------->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!--------------------BEGIN: JS---------------------------->
    @include('backend.includes.script')
    <!--------------------END: JS----------------====---------->

   
</body>


</html>