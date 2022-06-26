<!DOCTYPE html>
<html lang="en">
    @include('/admin/components/head')
    <body>
        <div class='loader'>
            <div class='spinner-grow text-primary' role='status'>
                <span class='sr-only'>Loading...</span>
            </div>
        </div>
        <div class="connect-container align-content-stretch d-flex flex-wrap">
            {{-- sidebar --}}
            @include('/admin/components/sidebar')
            {{-- end sidebar --}}
            <div class="page-container">
                <div class="page-header">
                    {{-- navbar --}}
                    @include('/admin/components/navbar')
                    {{-- end navbar --}}
                </div>

                <div class="page-content">

                    {{-- breadchumb --}}
                    <div class="page-info">

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>                                
                                @yield('breadchumb')
                            </ol>
                        </nav>                       
                        

                    </div>
                    {{-- end breadcumb --}}

                    <div class="main-wrapper">
                        @yield('content')
                    </div>
                </div>
                <div class="page-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <span class="footer-text">2019 © stacks</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Javascripts -->
       @include('/admin/components/footer')
    </body>
</html>