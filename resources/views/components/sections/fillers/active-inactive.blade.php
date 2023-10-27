<label for="with_trashed" class="w-100">
    <select wire:model.live="with_trashed" class="form-select form-select-sm" name="with_trashed" id="with_trashed">
        <option value="0">{{ \App\Helpers\Services\TextsService\getTextTranslationService::getTextTranslation('active') }}</option>
        <option value="1">{{ \App\Helpers\Services\TextsService\getTextTranslationService::getTextTranslation('inactive') }}</option>
    </select>
</label>
