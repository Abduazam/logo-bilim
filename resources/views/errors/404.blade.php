<x-layouts.auth>
    <div class="py-4 text-center">
        <div class="display-1 fw-bold text-danger">
            <i class="fa fa-exclamation-triangle opacity-50 me-1"></i> 404
        </div>
        <h1 class="fw-bold mt-5 mb-2">Oops.. Siz hozirgina xato sahifasini topdingiz.</h1>
        <h2 class="fs-4 fw-medium text-muted mb-5">Kechirasiz, lekin siz qidirayotgan sahifa topilmadi.</h2>
        <a class="btn btn-lg btn-white" href="/">
            <i class="fa fa-arrow-left opacity-50 me-1"></i> {{ trans('dashboard.actions.back') }}
        </a>
    </div>
</x-layouts.auth>
