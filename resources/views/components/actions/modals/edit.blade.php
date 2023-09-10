<div>
    <x-forms.buttons.modal.open :data="$button" :target="$target" icon="fa fa-pen" :model="$model" />

    <x-forms.modals.modal :data="$modal" :target="$target" action="edit" :model="$model">
        {{ $slot }}
    </x-forms.modals.modal>
</div>
