<x-sections.header />

    <div id="page-container" class="side-scroll page-header-fixed page-header-glass main-content-boxed">
        <x-sections.nav />

        <!-- Main Container -->
        <main id="main-container" style="padding-top: 68px;">
            <!-- Page Content -->
            <div>
                <x-sections.fillers.breadcrumb />

                <!-- Content -->
                <div class="content">
                    {{ $slot }}
                </div>
            </div>
        </main>

        <x-sections.foot />
    </div>

    <div id="toast" class="toast fade hide position-fixed overflow-hidden" data-delay="4000" role="alert" aria-live="assertive" aria-atomic="true" style="z-index: 9999; top: 2%; right: 1%;">
        <div class="toast-header">
            <i class=""></i>
            <strong class="me-auto ps-2"></strong>
            <button type="button" class="ms-2 btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body bg-white">
        </div>
    </div>

<x-sections.footer />
