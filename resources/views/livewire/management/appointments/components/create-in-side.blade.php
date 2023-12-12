<div>
    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAppointmentCreate" aria-controls="offcanvasAppointmentCreate">New appointment</button>

    <form wire:submit.prevent="create" class="w-100 position-relative">
        <div wire:ignore.self class="offcanvas offcanvas-end bg-body-extra-light w-40 shadow h-100" tabindex="-1" id="offcanvasAppointmentCreate" aria-labelledby="offcanvasAppointmentCreateLabel" data-bs-backdrop="false">
            <div class="offcanvas-header bg-body-light">
                <h6 class="offcanvas-title" id="offcanvasAppointmentCreateLabel">New appointment</h6>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body fs-sm text-start overflow-auto">
                <div class="block">
                    <nav class="px-3 pt-3 d-flex flex-column flex-lg-row items-center justify-content-between gap-2">
                        <a wire:click="changeActiveSection('appointment')" class="btn btn-lg btn-alt-secondary bg-transparent w-100 text-start fs-sm d-flex align-items-center justify-content-between gap-3">
                            @if($this->form->appointmentSection)
                                <div class="flex-grow-0 rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                    <i class="fa fa-fw fa-check"></i>
                                </div>
                            @else
                                <div class="flex-grow-0 rounded-circle @if($this->form->activeSection === 'appointment') border border-3 border-primary @else bg-body-dark @endif d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                    1
                                </div>
                            @endif
                            <div class="flex-grow-1">
                                <div @if($this->form->activeSection === 'appointment') class="text-primary" @endif>Registration</div>
                                <div class="fw-normal">Appointment info</div>
                            </div>
                        </a>
                        <a wire:click="changeActiveSection('client')" class="btn btn-lg btn-alt-secondary bg-transparent w-100 text-start fs-sm d-flex align-items-center justify-content-between gap-3">
                            @if($this->form->clientSection)
                                <div class="flex-grow-0 rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                    <i class="fa fa-fw fa-check"></i>
                                </div>
                            @else
                                <div class="flex-grow-0 rounded-circle @if($this->form->activeSection === 'client') border border-3 border-primary @else bg-body-dark @endif d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                    2
                                </div>
                            @endif
                            <div class="flex-grow-1">
                                <div @if($this->form->activeSection === 'client') class="text-primary" @endif>Patient</div>
                                <div class="fw-normal">Name and relatives</div>
                            </div>
                        </a>
                    </nav>
                    <div wire:ignore.self class="block-content overflow-hidden px-3">
                        <div class="fade @if($this->form->activeSection === 'appointment') show @else d-none @endif">
                            <div class="row w-100 p-0 m-0">
                                <div class="col-md-6 mb-3 ps-0">
                                    <label for="branch_id" class="form-label">Branch</label>
                                    <select wire:model.live="form.branch_id" class="form-select form-select-sm w-100" name="branch_id" id="branch_id">
                                        <option value="null" disabled>Choose</option>
                                        @foreach($branches as $branch)
                                            <option value="{{ $branch->id }}">{{ $branch->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('form.branch_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3 pe-0">
                                    <label for="service_id" class="form-label">Service</label>
                                    <select wire:model.live="form.service_id" class="form-select form-select-sm w-100" name="service_id" id="service_id" @if(is_null($this->form->branch_id)) disabled @endif>
                                        <option value="null" disabled>Choose</option>
                                        @if(!empty($this->form->services))
                                            @foreach($this->form->services as $service)
                                                <option value="{{ $service->id }}">{{ $service->title }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('form.service_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3 ps-0">
                                    <label for="teacher_id" class="form-label">Teacher</label>
                                    <select wire:model.live="form.teacher_id" class="form-select form-select-sm w-100" name="teacher_id" id="teacher_id" @if(is_null($this->form->service_id)) disabled @endif>
                                        <option value="null">Choose</option>
                                        @if(!empty($this->form->teachers))
                                            @foreach($this->form->teachers as $teacher)
                                                <option value="{{ $teacher->id }}">{{ $teacher->fullname }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('form.teacher_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3 pe-0">
                                    <label for="start_time" class="form-label">Start time</label>
                                    <select wire:model.live="form.start_time" class="form-select form-select-sm w-100" name="start_time" id="start_time" @if(is_null($this->form->service_id)) disabled @endif>
                                        <option value="null" disabled>Choose</option>
                                        @if(!empty($this->form->startTimes))
                                            @foreach($this->form->startTimes as $start_time)
                                                <option value="{{ $start_time }}">{{ $start_time }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('form.start_time')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <hr>
                                <div class="table-responsive text-nowrap px-0">
                                    <table class="own-table w-100">
                                        <thead>
                                            <tr>
                                                <th class="text-center w-50">Title</th>
                                                <th class="text-center w-50">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">
                                                    <label for="service_price" class="form-label mb-0">Service price:</label>
                                                </td>
                                                <td class="text-center">
                                                    <input wire:model.live="form.service_price" type="number" class="form-control form-control-sm w-100" id="service_price" name="service_price" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <label for="teacher_salary" class="form-label mb-0">Teacher salary:</label>
                                                </td>
                                                <td class="text-center">
                                                    <input wire:model.live="form.teacher_salary" type="number" class="form-control form-control-sm w-100" id="teacher_salary" name="teacher_salary">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <label for="payment_amount" class="form-label mb-0">Payment amount:</label>
                                                </td>
                                                <td class="text-center">
                                                    <input wire:model.live="form.payment_amount" type="number" class="form-control form-control-sm w-100" id="payment_amount" name="payment_amount">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <label for="payment_type" class="form-label mb-0">Payment type:</label>
                                                </td>
                                                <td class="text-center">
                                                    <select wire:model.live="form.payment_type_id" class="form-select form-select-sm w-100" name="payment_type" id="payment_type">
                                                        <option value="null" disabled>Choose</option>
                                                        @foreach($paymentTypes as $paymentType)
                                                            <option value="{{ $paymentType->id }}">{{ $paymentType->translation->translation }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <label for="benefit" class="form-label mb-0">Benefit:</label>
                                                </td>
                                                <td class="text-center">
                                                    <input wire:model.live="form.benefit" type="number" class="form-control form-control-sm w-100" id="benefit" name="benefit" disabled>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="fade @if($this->form->activeSection === 'client') show @else d-none @endif">
                            <div class="row w-100 h-100 p-0 m-0">
                                <div class="col-12 px-0 mb-3 position-relative">
                                    <label for="search_client" class="form-label">Search client</label>
                                    <div class="d-flex w-100 h-auto">
                                        <input wire:model.live="form.search" type="text" class="form-control form-control-sm w-100 me-2" id="search_client" name="search_client" placeholder="Search client">
                                        @if(!empty($this->form->clients))
                                            <div class="search-result-block w-100 bg-white h-auto position-absolute top-100">
                                                <ul class="list-group">
                                                    @foreach($this->form->clients as $client)
                                                        <li wire:click="setClient({{ $client->id }})" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center cursor-pointer py-1 fs-sm">{{ $client->first_name }} {{ $client->last_name }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        @if(!is_null($this->form->client_id))
                                            <button wire:click="unsetClient" class="btn btn-sm btn-alt-danger"><i class="fa fa-times"></i></button>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3 ps-0">
                                    <label for="first_name" class="form-label">First name</label>
                                    <input wire:model.live="form.first_name" type="text" class="form-control form-control-sm w-100 @error('form.first_name') is-invalid @elseif(!is_null($this->form->first_name)) is-valid @enderror" id="first_name" name="first_name" placeholder="Client first name" @if(!is_null($this->form->client_id)) readonly @endif>
                                    @error('form.first_name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3 pe-0">
                                    <label for="last_name" class="form-label">Last name</label>
                                    <input wire:model.live="form.last_name" type="text" class="form-control form-control-sm w-100 @error('form.last_name') is-invalid @elseif(!is_null($this->form->last_name)) is-valid @enderror" id="last_name" name="last_name" placeholder="Client last name" @if(!is_null($this->form->client_id)) readonly @endif>
                                    @error('form.last_name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3 ps-0">
                                    <label for="dob" class="form-label">Date of birth</label>
                                    <input wire:model.live="form.dob" type="date" class="form-control form-control-sm w-100 @error('form.dob') is-invalid @elseif(!is_null($this->form->dob)) is-valid @enderror" id="dob" name="dob" placeholder="Client first name" @if(!is_null($this->form->client_id)) readonly @endif>
                                    @error('form.dob')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3 pe-0">
                                    <label class="form-label opacity-0 d-block">Add relative</label>
                                    <button wire:click="addRelative" wire:loading.attr="disabled" type="button" class="btn btn-sm btn-primary w-100" @if(!is_null($this->form->client_id) or (is_null($this->form->first_name) and is_null($this->form->last_name))) disabled @endif @click="$dispatch('check-relatives')">Add relative</button>
                                </div>
                                <hr>
                                @if(!empty($this->form->relatives))
                                    @foreach($this->form->relatives as $id => $relative)
                                        <div class="row w-100 h-100 p-3 mx-0 mb-4 bg-light rounded-2 position-relative">
                                            <div class="col-md-4 ps-0">
                                                <label class="form-label" for="fullname">Fullname: <span class="text-danger">*</span></label>
                                                <input wire:model.live="form.relatives.{{ $id }}.fullname" type="text" class="form-control form-control-sm w-100 @error('form.relatives.' . $id . '.fullname') is-invalid @elseif(strlen($this->form->relatives[$id]['fullname']) > 3) is-valid @enderror" id="fullname" name="fullname" placeholder="Fullname">
                                                @error('form.relatives.' . $id . '.fullname')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 px-md-2 px-0">
                                                <label class="form-label" for="phone_number">Phone number: <span class="text-danger">*</span></label>
                                                <input wire:model.live="form.relatives.{{ $id }}.phone_number" type="number" class="form-control form-control-sm w-100 @error('form.relatives.' . $id . '.phone_number') is-invalid @elseif(strlen($this->form->relatives[$id]['phone_number']) > 3) is-valid @enderror" id="phone_number" name="phone_number" placeholder="Phone number">
                                                @error('form.relatives.' . $id . '.phone_number')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 pe-0">
                                                <label class="form-label" for="relative_status_id">Relative status: <span class="text-danger">*</span></label>
                                                <select wire:model.live="form.relatives.{{ $id }}.relative_status_id" class="form-select form-select-sm w-100 @error('form.relatives.' . $id . '.relative_status_id') is-invalid @elseif(!is_null($this->form->relatives[$id]['relative_status_id'])) is-valid @enderror" id="relative_status_id" name="relative_status_id">
                                                    <option value="null" disabled>Choose</option>
                                                    @foreach($relativeStatuses as $relativeStatus)
                                                        <option value="{{ $relativeStatus->id }}">{{ $relativeStatus->translation->translation }}</option>
                                                    @endforeach
                                                </select>
                                                @error('form.relatives.' . $id . '.relative_status_id')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <button wire:click="removeRelative({{ $id }})" wire:loading.attr="disabled" type="button" class="btn btn-alt-danger w-auto px-1 d-flex align-items-center justify-content-center position-absolute" style="height: 25px; top: 7px; right: 7px;" @click="$dispatch('check-relatives')">
                                                <i class="fa fa-times" style="font-size: 14px"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-footer bg-body-light p-3 w-100 text-start">
                <button data-bs-dismiss="offcanvas" type="submit" class="btn btn-white border-0">
                    <small>Close</small>
                </button>
                <button wire:loading.attr="disabled" data-bs-dismiss="offcanvas" type="submit" class="btn btn-success border-0" @if($this->form->appointmentSection and $this->form->clientSection) wire:target="create" @else disabled @endif>
                    <small>Create</small>
                </button>
            </div>
        </div>
    </form>
</div>
