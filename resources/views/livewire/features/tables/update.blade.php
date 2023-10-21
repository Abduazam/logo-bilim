<div class="pb-4">
    <div class="block block-rounded">
        <div class="block-content">
            <div class="col-12 d-flex align-items-center mb-4">
                <label for="table_name">
                    <i class="fa fa-database opacity-75"></i>
                </label>
                <input type="text" class="form-control form-control-sm bg-light w-auto ms-3" value="{{ $table->name }}" name="table_name" id="table_name" readonly disabled>
            </div>
            <livewire:features.tables.columns.index :table_columns="$table->columns" />
        </div>
    </div>

    <x-forms.buttons.default.back route="{{ route('dashboard.features.tables.index') }}" />
</div>
