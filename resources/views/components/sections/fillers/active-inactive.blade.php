<label for="with_trashed" class="w-100">
    <select wire:model.live="with_trashed" class="form-select form-select-sm" name="with_trashed" id="with_trashed">
        <option value="0">{{ trans('dashboard.filters.active') }}</option>
        <option value="1">{{ trans('dashboard.filters.inactive') }}</option>
    </select>
</label>
