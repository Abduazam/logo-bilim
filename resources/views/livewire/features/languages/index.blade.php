<div class="block block-rounded">
    <div class="block-content">
        <div class="filter-table pb-4">
            <div class="row w-100 h-100 m-0 p-0">
                <div class="col-lg-3 ps-0">
                    <x-livewire.general.search />
                </div>
                <div class="col-lg-7 px-0">
                    <!-- Filters -->
                </div>
                <div class="col-lg-2 text-end pe-0">
                    <livewire:features.languages.create :data="$this->getActionsData('filter')" key="create-language" />
                </div>
            </div>
        </div>
        <x-forms.tables.table :data="$languages" :columns="$columns" model="language" />
    </div>
</div>
