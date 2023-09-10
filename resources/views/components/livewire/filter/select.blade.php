<label for="{{ $model }}" class="w-100">
    <select wire:model.live="{{ $model }}" class="form-select form-select-sm w-100" id="{{ $model }}" name="{{ $model }}">
        @foreach($data as $key => $option)
            <option value="{{ $key }}">{{ $option }}</option>
        @endforeach
    </select>
</label>
