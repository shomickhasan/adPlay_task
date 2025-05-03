<!doctype html>
<html class="no-js" lang="zxx">
@include('frontend.includes.head')
    <body>
        {{--  <div id="loading">
            <div id="loading-center">
                <div id="loading-center-absolute">
                <div class="object" id="first_object"></div>
                <div class="object" id="second_object"></div>
                <div class="object" id="third_object"></div>
                </div>
            </div>
        </div>  --}}

        @include('frontend.includes.header')
        <main>
           @yield('frontend')
        </main>


        @include('frontend.includes.footer')


		<!-- JS here -->
       @include('frontend.includes.script')
    </body>

</html>
