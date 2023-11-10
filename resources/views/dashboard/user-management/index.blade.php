<x-layouts.app>
    <div class="row">
        <div class="col-6 col-md-4 col-xl-2">
            <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('dashboard.user-management.users.index') }}">
                <div class="ribbon-box">{{ $users }}</div>
                <div class="block-content">
                    <p class="mt-1 mb-2">
                        <i class="fa fa-user fa-2x text-muted"></i>
                    </p>
                    <p class="fw-semibold">Users</p>
                </div>
            </a>
        </div>

        <div class="col-6 col-md-4 col-xl-2">
            <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('dashboard.user-management.roles.index') }}">
                <div class="ribbon-box">{{ $roles }}</div>
                <div class="block-content">
                    <p class="mt-1 mb-2">
                        <i class="fa fa-gear fa-2x text-muted"></i>
                    </p>
                    <p class="fw-semibold">Roles</p>
                </div>
            </a>
        </div>

        <div class="col-6 col-md-4 col-xl-2">
            <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('dashboard.user-management.permissions.index') }}">
                <div class="ribbon-box">{{ $permissions }}</div>
                <div class="block-content">
                    <p class="mt-1 mb-2">
                        <i class="fa fa-gear fa-2x text-muted"></i>
                    </p>
                    <p class="fw-semibold">Permissions</p>
                </div>
            </a>
        </div>
    </div>
</x-layouts.app>
