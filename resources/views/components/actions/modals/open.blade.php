<div>
    <x-forms.buttons.modal.open :data="$button" :target="$target" text="{{ $text }}" icon="{{ $icon }}" :model="$model" />

    <x-forms.modals.modal :data="$modal" :target="$target" action="{{ $action }}" :model="$model">
        {{ $slot }}
    </x-forms.modals.modal>
</div>
