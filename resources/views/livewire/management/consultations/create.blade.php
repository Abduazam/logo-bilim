<div>
    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasConsultationCreate" aria-controls="offcanvasConsultationCreate">New consultation</button>

    <form wire:submit.prevent="create" class="w-100 position-relative">
        <div wire:ignore.self class="offcanvas offcanvas-end bg-body-extra-light w-40 shadow h-100" tabindex="-1" id="offcanvasConsultationCreate" aria-labelledby="offcanvasConsultationCreateLabel" data-bs-backdrop="false">
            <div class="offcanvas-header bg-body-light">
                <h6 class="offcanvas-title" id="offcanvasConsultationCreateLabel">New consultation</h6>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body fs-sm text-start overflow-auto">
                <div class="block">

                </div>
            </div>
            <div class="offcanvas-footer bg-body-light p-3 w-100 text-start">
                <button data-bs-dismiss="offcanvas" type="button" class="btn btn-white border-0">
                    <small>Close</small>
                </button>
                <button wire:loading.attr="disabled" data-bs-dismiss="offcanvas" type="submit" class="btn btn-success border-0" wire:target="create">
                    <small>Create</small>
                </button>
            </div>
        </div>
    </form>
</div>
