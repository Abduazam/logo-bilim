<?php

namespace App\Livewire\Information\Teachers\Lists;

use Livewire\Component;
use Illuminate\View\View;
use App\Contracts\Traits\Dashboard\Livewire\General\SortingTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\SearchingTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\PaginatingTrait;
use App\Contracts\Traits\Dashboard\Livewire\General\WithTrashedTrait;
use App\Repositories\Dashboard\Information\Teachers\TeacherRepository;

class TeachersList extends Component
{
    use SearchingTrait, PaginatingTrait, WithTrashedTrait, SortingTrait;

    protected $listeners = ['refresh' => '$refresh'];

    public function render(TeacherRepository $teacherRepository): View
    {
        return view('livewire.information.teachers.lists.teachers-list', [
            'teachers' => $teacherRepository->getFiltered($this->search, $this->perPage, $this->with_trashed, $this->orderBy, $this->orderDirection),
        ]);
    }
}
