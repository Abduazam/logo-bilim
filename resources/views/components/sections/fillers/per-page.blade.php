<label for="perPage" class="w-100">
    <select wire:model.live="perPage" class="form-select form-select-sm" name="perPage" id="perPage">
        <option value="10">10</option>
        <option value="20">20</option>
        <option value="50">50</option>
        <option value="0">{{ trans('dashboard.filters.all') }}</option>
    </select>
</label>
