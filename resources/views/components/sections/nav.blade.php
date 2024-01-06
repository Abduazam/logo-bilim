<!-- Sidebar -->
<nav id="sidebar">
    <!-- Sidebar Content -->
    <div class="sidebar-content">
        <!-- Side Header -->
        <div class="content-header justify-content-lg-center">
            <x-sections.fillers.logo />

            <!-- Options -->
            <div>
                <!-- Close Sidebar, Visible only on mobile screens -->
                <button type="button" class="btn btn-sm btn-alt-success d-lg-none" data-toggle="layout" data-action="sidebar_close">
                    <i class="fa fa-fw fa-times"></i>
                </button>
            </div>
        </div>

        <!-- Sidebar Scrolling -->
        <div class="js-sidebar-scroll bg-light">
            <!-- Side Main Navigation -->
            <div class="content-side content-side-full">
                <ul class="nav-main">
                    <x-sections.fillers.nav-list />
                </ul>
            </div>
        </div>
    </div>
    <!-- Sidebar Content -->
</nav>

<!-- Header -->
<header id="page-header" class="bg-white">
    <!-- Header Content -->
    <div class="content-header">
        <!-- Left Section -->
        <div class="d-flex align-items-center space-x-3">
            <x-sections.fillers.logo />

            <!-- Header Navigation -->
            <ul class="nav-main nav-main-horizontal nav-main-hover d-none d-lg-block">
                <x-sections.fillers.nav-list />
            </ul>
        </div>

        <!-- Right Section -->
        <div class="space-x-1">
            <x-sections.fillers.user-dropdown />

            <!-- Toggle Sidebar -->
            <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                <i class="fa fa-fw fa-stream"></i>
            </button>
        </div>
    </div>
</header>
