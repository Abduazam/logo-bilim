<div class="block block-rounded">
    <div class="block-content">
        <div class="filter-table pb-4">
            <div class="row w-100 h-100 m-0 p-0">
                <div class="col-lg-3 ps-0">
                    <x-livewire.general.search />
                </div>
                <div class="col-lg-7 px-0">
                    <!-- Filters -->
                    <div class="row w-100 h-100 p-0 m-0">
                        <div class="col-lg-3 ps-0">
                            <x-livewire.filter.select model="with_trashed" :data="$trashed_data" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 text-end pe-0">
                    <livewire:features.languages.create :data="$this->getActionsData('filter')" key="create-language" />
                </div>
            </div>
        </div>
        <livewire:components.forms.tables.table lazy="on-load" :data="$languages" :columns="$columns" :buttons="$this->getActionsData('table')" model="language" />
    </div>
</div>
