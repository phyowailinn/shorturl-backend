<header class="c-header c-header-light c-header-fixed no-print">

    <button class="c-header-toggler c-class-toggler d-lg-none mr-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show"><span class="c-header-toggler-icon"></span></button>
    <a class="c-header-brand d-sm-none" href="#">
        <img class="c-header-brand" src="https://rdlcom.com/wp-content/uploads/qa-testing-as-a-service-test-io-creative-company-logo-terrific-1.png" width="97" height="46" alt="Logo">
    </a>
    <button class="c-header-toggler c-class-toggler ml-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true"><span class="c-header-toggler-icon"></span>
    </button>

    <ul class="c-header-nav ml-auto mr-4">
        <li class="c-header-nav-item dropdown">
            <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <div class="c-avatar">
                    <img class="c-avatar-img" src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y" alt="">
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right pt-0">
                <div class="dropdown-header bg-light py-2"><strong>Settings</strong></div>
                <form action="/logout" id="logout" class="hidden" method="POST">
                    @csrf
                   <button type="submit" class="dropdown-item"><i class="cil-account-logout"></i> Logout</button>                    
                </form>
            </div>
        </li>
    </ul>
    
</header>
<script>
    $('a#logout').on('click',function(){
        $('form#logout').submit();
    })
</script>