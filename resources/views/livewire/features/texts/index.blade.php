<div class="block block-rounded">
    <div class="block-content">
        <div class="filter-table pb-4">
            <div class="row w-100 h-100 m-0 p-0">
                <div class="col-md-3 col-4 ps-0">
                    <x-sections.fillers.search />
                </div>
                <div class="col-md-7 col-4 px-0">
                    <!-- Filters -->
                    <div class="row w-100 h-100 p-0 m-0">
                        <div class="col-md-3 col-6 ps-0">
                            <x-sections.fillers.per-page />
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-4 text-end pe-0">

                </div>
            </div>
        </div>
        <livewire:features.texts.lists.texts-list lazy="on-load" />
    </div>
</div>
