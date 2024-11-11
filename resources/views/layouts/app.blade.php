@include("sections.header")
@include("sections.sidebar")
<main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
    @include("sections.top-navigation")
    @if(\Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <i class="fa fa-check mx-2"></i>
        <strong>Success!</strong> {{\Session::get('success')}}
    </div>
    @endif 
    @if(\Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <i class="fa fa-times mx-2"></i>
        <strong>Error!</strong> {{\Session::get('error')}}
    </div>
    @endif 

    @yield('content')
    <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
        <ul class="nav">
            <li>
                <div style="display: flex;justify-content: center;">
                    <div style="display: flex;flex-direction: column;">
                        <div><img src="https://www.alvadesh.com/wp-content/uploads/2017/08/Website-Development-Process.jpg" width="329" /></div>
                        <div style="text-align: center;margin-top: 10px;color:#4D4D4D">
                            <strong>This is a demo task</strong>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <span class="copyright ml-auto my-auto mr-2">Copyright © {{date('Y')}}
            <a href="https://morniksa.com" rel="nofollow">Morni KSA</a>
        </span>

    </footer>
</main>
@include("sections.footer")