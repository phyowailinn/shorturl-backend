<div class="c-sidebar-brand">
	<img class="c-sidebar-brand-full" src="https://rdlcom.com/wp-content/uploads/qa-testing-as-a-service-test-io-creative-company-logo-terrific-1.png" width="118" height="auto" alt="CoreUI Logo">
	<img class="c-sidebar-brand-minimized" src="https://rdlcom.com/wp-content/uploads/qa-testing-as-a-service-test-io-creative-company-logo-terrific-1.png" width="auto" height="45px" alt="CoreUI Logo"></div>
    <ul class="c-sidebar-nav ps">
        <li class="c-sidebar-nav-title">General</li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link c-" href="{{ route('admin.url.index') }}">
                <i class="cil-cursor c-sidebar-nav-icon"></i>
                URL
            </a>
        </li>
        <li class="c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-dropdown-toggle" href="#">
            <i class="cil-user c-sidebar-nav-icon"></i>
               User
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link c-" href="{{ route('admin.user.index') }}">All</a>
                </li>
            </ul>
        </li>
    </ul>

	<button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>

