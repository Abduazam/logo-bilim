<label for="search" class="w-100">
    <input wire:model.live="search" type="text" class="form-control form-control-sm w-100" placeholder="{{ \App\Helpers\Services\TextsService\getTextTranslationService::getTextTranslation('search') }}">
</label>
