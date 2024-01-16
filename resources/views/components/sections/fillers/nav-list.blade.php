@can('dashboard.management.index')
<li class="nav-main-item">
    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="{{ route('dashboard.management.index') }}">
        <span class="nav-main-link-name">Management</span>
    </a>
    <ul class="nav-main-submenu">
        @can('dashboard.management.appointments.index')
        <li class="nav-main-item">
            <a class="nav-main-link" href="{{ route('dashboard.management.appointments.index') }}">
                <span class="nav-main-link-name">Appointments</span>
            </a>
        </li>
        @endcan

        @can('dashboard.management.consultations.index')
            <li class="nav-main-item">
                <a class="nav-main-link" href="{{ route('dashboard.management.consultations.index') }}">
                    <span class="nav-main-link-name">Consultations</span>
                </a>
            </li>
        @endcan

        @can('dashboard.management.consumptions.index')
            <li class="nav-main-item">
                <a class="nav-main-link" href="{{ route('dashboard.management.consumptions.index') }}">
                    <span class="nav-main-link-name">Consumptions</span>
                </a>
            </li>
        @endcan
    </ul>
</li>
@endcan

@can('dashboard.reports.index')
    <li class="nav-main-item">
        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="{{ route('dashboard.reports.index') }}">
            <span class="nav-main-link-name">Reports</span>
        </a>
        <ul class="nav-main-submenu">
            @can('dashboard.reports.daily-reports.index')
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ route('dashboard.reports.daily-reports.index') }}">
                        <span class="nav-main-link-name">Daily reports</span>
                    </a>
                </li>
            @endcan
            @can('dashboard.reports.debts.index')
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ route('dashboard.reports.debts.index') }}">
                        <span class="nav-main-link-name">Debts</span>
                    </a>
                </li>
            @endcan
        </ul>
    </li>
@endcan

@can('dashboard.information.index')
<li class="nav-main-item">
    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="{{ route('dashboard.information.index') }}">
        <span class="nav-main-link-name">Information</span>
    </a>
    <ul class="nav-main-submenu">
        @can('dashboard.information.services.index')
        <li class="nav-main-item">
            <a class="nav-main-link" href="{{ route('dashboard.information.services.index') }}">
                <span class="nav-main-link-name">Services</span>
            </a>
        </li>
        @endcan

        @can('dashboard.information.branches.index')
        <li class="nav-main-item">
            <a class="nav-main-link" href="{{ route('dashboard.information.branches.index') }}">
                <span class="nav-main-link-name">Branches</span>
            </a>
        </li>
        @endcan

        @can('dashboard.information.teachers.index')
        <li class="nav-main-item">
            <a class="nav-main-link" href="{{ route('dashboard.information.teachers.index') }}">
                <span class="nav-main-link-name">Teachers</span>
            </a>
        </li>
        @endcan

        @can('dashboard.information.clients.index')
        <li class="nav-main-item">
            <a class="nav-main-link" href="{{ route('dashboard.information.clients.index') }}">
                <span class="nav-main-link-name">Clients</span>
            </a>
        </li>
        @endcan

        @can('dashboard.information.types.index')
        <li class="nav-main-item">
            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="{{ route('dashboard.information.types.index') }}">
                <span class="nav-main-link-name">Types</span>
            </a>
            <ul class="nav-main-submenu">
                @can('dashboard.information.types.payments.index')
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ route('dashboard.information.types.payments.index') }}">
                        <span class="nav-main-link-name">Payments</span>
                    </a>
                </li>
                @endcan
            </ul>
        </li>
        @endcan

        @can('dashboard.information.statuses.index')
        <li class="nav-main-item">
            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="{{ route('dashboard.information.statuses.index') }}">
                <span class="nav-main-link-name">Statuses</span>
            </a>
            <ul class="nav-main-submenu">
                @can('dashboard.information.statuses.relatives.index')
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ route('dashboard.information.statuses.relatives.index') }}">
                        <span class="nav-main-link-name">Relatives</span>
                    </a>
                </li>
                @endcan

                @can('dashboard.information.statuses.appointments.index')
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ route('dashboard.information.statuses.appointments.index') }}">
                        <span class="nav-main-link-name">Appointments</span>
                    </a>
                </li>
                @endcan
            </ul>
        </li>
        @endcan
    </ul>
</li>
@endcan

@can('dashboard.user-management.index')
<li class="nav-main-item">
    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="{{ route('dashboard.user-management.index') }}">
        <span class="nav-main-link-name">User Management</span>
    </a>
    <ul class="nav-main-submenu">
        @can('dashboard.user-management.users.index')
        <li class="nav-main-item">
            <a class="nav-main-link" href="{{ route('dashboard.user-management.users.index') }}">
                <span class="nav-main-link-name">Users</span>
            </a>
        </li>
        @endcan

        @can('dashboard.user-management.roles.index')
        <li class="nav-main-item">
            <a class="nav-main-link" href="{{ route('dashboard.user-management.roles.index') }}">
                <span class="nav-main-link-name">Roles</span>
            </a>
        </li>
        @endcan

        @can('dashboard.user-management.permissions.index')
        <li class="nav-main-item">
            <a class="nav-main-link" href="{{ route('dashboard.user-management.permissions.index') }}">
                <span class="nav-main-link-name">Permissions</span>
            </a>
        </li>
        @endcan
    </ul>
</li>
@endcan
