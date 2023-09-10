<div class="mb-4">
    @if(isset($form->{$model}) and $form->{$model} instanceof Illuminate\Http\UploadedFile)
        @php
            $extension = $form->{$model}->guessExtension();
        @endphp
        @if(in_array($extension, ['jpg', 'jpeg', 'png', 'svg']))
            <img src="{{ $form->{$model}->temporaryUrl() }}" alt="Temporary image" class="{{ $class }}">
        @endif
    @endif

    @if(!is_null($item?->{$model}) and !isset($form->{$model}))
        <div class="overflow-hidden d-flex flex-column">
            {!! $item->{$method}('w-100') !!}
            <button type="button" wire:click="removeImage" class="btn btn-sm">X</button>
        </div>
    @endif
</div>
