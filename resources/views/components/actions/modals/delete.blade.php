<div>
    <x-forms.buttons.modal.open :data="$button" :target="$target" icon="fa fa-trash" :model="$model" />

    <x-forms.modals.modal :data="$modal" :target="$target" action="delete" :model="$model">
        {{ $slot }}
    </x-forms.modals.modal>
</div>
