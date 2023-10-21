<li class="nav-main-item">
    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="{{ route('dashboard.features.index') }}">
        <i class="nav-main-link-icon fa fa-layer-group text-dark opacity-50"></i>
        <span class="nav-main-link-name">Features</span>
    </a>
    <ul class="nav-main-submenu">
        <li class="nav-main-item">
            <a class="nav-main-link" href="{{ route('dashboard.features.languages.index') }}">
                <span class="nav-main-link-name">Languages</span>
            </a>
        </li>
        <li class="nav-main-item">
            <a class="nav-main-link" href="{{ route('dashboard.features.tables.index') }}">
                <span class="nav-main-link-name">Tables</span>
            </a>
        </li>
    </ul>
</li>
