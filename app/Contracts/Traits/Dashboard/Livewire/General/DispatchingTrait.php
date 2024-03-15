<?php

namespace App\Contracts\Traits\Dashboard\Livewire\General;

trait DispatchingTrait
{
    public bool $dispatching = false;

    public function dispatchSuccess($icon, $action, $description): void
    {
        $this->dispatch('dispatch-toast', [
            'icon' => $icon,
            'title' => $action,
            'description' => $description
        ]);
    }

    public function dispatchMany(array $dispatches): void
    {
        foreach ($dispatches as $dispatch) {
            $this->dispatch($dispatch);
        }
    }

    public function dispatchTrue(): void
    {
        $this->dispatching = true;
    }

    public function dispatchFalse(): void
    {
        $this->dispatching = false;
    }

    public function dispatchForCreate(string $model, string $value): void
    {
        $icon = 'fa fa-check text-success';
        $action = 'created';

        $title = $this->dispatchTitle($action);
        $description = $this->dispatchDescription($model, $value, $action);

        $this->dispatchSuccess($icon, $title, $description);
    }

    public function dispatchForUpdate(string $model, string $value): void
    {
        $icon = 'fa fa-pen text-info';
        $action = 'updated';

        $title = $this->dispatchTitle($action);
        $description = $this->dispatchDescription($model, $value, $action);

        $this->dispatchSuccess($icon, $title, $description);
    }

    public function dispatchForRestore(string $model, string $value): void
    {
        $icon = 'fa fa-rotate-left text-primary';
        $action = 'restored';

        $title = $this->dispatchTitle($action);
        $description = $this->dispatchDescription($model, $value, $action);

        $this->dispatchSuccess($icon, $title, $description);
    }

    public function dispatchForDelete(string $model, string $value): void
    {
        $icon = 'fa fa-trash text-danger';
        $action = 'deleted';

        $title = $this->dispatchTitle($action);
        $description = $this->dispatchDescription($model, $value, $action);

        $this->dispatchSuccess($icon, $title, $description);
    }

    public function dispatchForForceDelete(string $model, string $value): void
    {
        $icon = 'fa fa-trash text-danger';
        $action = 'force-deleted';

        $title = $this->dispatchTitle($action);
        $description = $this->dispatchDescription($model, $value, $action);

        $this->dispatchSuccess($icon, $title, $description);
    }

    public function dispatchForCancel(string $model, string $value): void
    {
        $icon = 'fa fa-trash text-danger';
        $action = 'canceled';

        $title = $this->dispatchTitle($action);
        $description = $this->dispatchDescription($model, $value, $action);

        $this->dispatchSuccess($icon, $title, $description);
    }

    public function dispatchForReschedule(string $model, string $value): void
    {
        $icon = 'fa fa-clock-rotate-left text-info';
        $action = 'rescheduled';

        $title = $this->dispatchTitle($action);
        $description = $this->dispatchDescription($model, $value, $action);

        $this->dispatchSuccess($icon, $title, $description);
    }

    private function dispatchTitle(string $action): string
    {
        return trans('dashboard.dispatches.successfully') . ' ' . trans('dashboard.dispatches.' . $action);
    }

    private function dispatchDescription(string $model, string $value, string $action): string
    {
        $modelTranslation = trans('dashboard.sections.' . $model);
        $actionTranslation = trans('dashboard.dispatches.' . $action);

        return "<b>$modelTranslation $actionTranslation:</b> $value";
    }
}
