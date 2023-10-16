<!-- User Dropdown -->
<div class="dropdown d-inline-block">
    <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-user d-sm-none"></i>
        <span class="d-none d-sm-inline-block fw-semibold">{{ $user->name }}</span>
        <i class="fa fa-angle-down opacity-75 ms-1"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0" aria-labelledby="page-header-user-dropdown">
        <div class="px-2 py-3 bg-body-light rounded-top">
            <h5 class="h6 text-center mb-0">
                {{ $user->name }}
            </h5>
        </div>
        <div class="p-2">
            <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1" href="" data-toggle="layout" data-action="side_overlay_toggle">
                <span>Settings</span>
                <i class="fa fa-fw fa-wrench opacity-25"></i>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <span>Sign out</span>
                <i class="fa fa-fw fa-sign-out-alt opacity-25"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</div>
