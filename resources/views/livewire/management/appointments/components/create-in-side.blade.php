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
                        <a wire:click="changeActiveSection('registration')" class="btn btn-lg btn-alt-secondary bg-transparent w-100 text-start fs-sm d-flex align-items-center justify-content-between gap-3">
                            @if($this->form->registrationForm)
                                <div class="flex-grow-0 rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                    <i class="fa fa-fw fa-check"></i>
                                </div>
                            @else
                                <div class="flex-grow-0 rounded-circle @if($this->form->activeSection === 'registration') border border-3 border-primary @else bg-body-dark @endif d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                    1
                                </div>
                            @endif
                            <div class="flex-grow-1">
                                <div @if($this->form->activeSection === 'registration') class="text-primary" @endif>Registration</div>
                                <div class="fw-normal">Register all info</div>
                            </div>
                        </a>
                        <a wire:click="changeActiveSection('payments')" class="btn btn-lg btn-alt-secondary bg-transparent w-100 text-start fs-sm d-flex align-items-center justify-content-between gap-3">
                            @if($this->form->paymentsForm)
                                <div class="flex-grow-0 rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                    <i class="fa fa-fw fa-check"></i>
                                </div>
                            @else
                                <div class="flex-grow-0 rounded-circle @if($this->form->activeSection === 'payments') border border-3 border-primary @else bg-body-dark @endif d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                    2
                                </div>
                            @endif
                            <div class="flex-grow-1">
                                <div @if($this->form->activeSection === 'payments') class="text-primary" @endif>Payments</div>
                                <div class="fw-normal">Client payments</div>
                            </div>
                        </a>
                    </nav>
                    <div wire:ignore.self class="block-content overflow-hidden px-3">
                        <div class="fade @if($this->form->activeSection === 'registration') show @else d-none @endif">
                            <div class="row w-100 p-0 m-0">
                                <div class="col-md-6 mb-3 ps-0">
                                    <label for="branch_id" class="form-label">Branch</label>
                                    <select wire:model.blur="form.branch_id" class="form-select form-select-sm w-100" name="branch_id" id="branch_id">
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
                                    <select wire:model.blur="form.service_id" class="form-select form-select-sm w-100" name="service_id" id="service_id" @if(is_null($this->form->branch_id)) disabled @endif>
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
                                    <select wire:model.blur="form.teacher_id" class="form-select form-select-sm w-100" name="teacher_id" id="teacher_id" @if(is_null($this->form->service_id)) disabled @endif>
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
                                    <select wire:model.blur="form.start_time" class="form-select form-select-sm w-100" name="start_time" id="start_time" @if(is_null($this->form->service_id)) disabled @endif>
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
                                <div class="col-12 px-0 mb-3 position-relative">
                                    <label for="search_client" class="form-label">Search client</label>
                                    <div class="d-flex w-100 h-auto">
                                        <input wire:model.blur="form.search" type="text" class="form-control form-control-sm w-100 me-2" id="search_client" name="search_client" placeholder="Search client">
                                        <button wire:click="addClient" type="button" class="btn btn-sm btn-alt-info"><i class="fa fa-plus"></i></button>
                                        @if(!empty($this->form->searchedClients))
                                            <div class="search-result-block w-100 bg-white h-auto position-absolute top-100 z-3">
                                                <ul class="list-group">
                                                    @foreach($this->form->searchedClients as $client)
                                                        <li wire:click="setClientInfo({{ $client->id }})" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center cursor-pointer py-1 fs-sm">{{ $client->first_name }} {{ $client->last_name }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                @foreach($this->form->clients as $id => $client)
                                    <div class="col-12 border rounded-3 p-3 mb-3 position-relative">
                                        <div class="row w-100 p-0 m-0">
                                            <div class="col-md-6 mb-3 ps-0">
                                                <label for="first_name{{ $id }}" class="form-label">First name</label>
                                                <input wire:model.blur="form.clients.{{ $id }}.info.first_name" type="text" class="form-control form-control-sm w-100 @error('form.clients.' . $id . '.info.first_name') is-invalid @elseif(isNotNullAndNotEmptyString($this->form->clients[$id]['info']['first_name'])) is-valid @enderror" id="first_name{{ $id }}" name="first_name{{ $id }}" placeholder="Client first name" @if(!is_null($this->form->clients[$id]['client_id'])) readonly @endif>
                                                @error('form.clients.' . $id . '.info.first_name')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3 pe-0">
                                                <label for="last_name{{ $id }}" class="form-label">Last name</label>
                                                <input wire:model.blur="form.clients.{{ $id }}.info.last_name" type="text" class="form-control form-control-sm w-100 @error('form.clients.' . $id . '.info.last_name') is-invalid @elseif(isNotNullAndNotEmptyString($this->form->clients[$id]['info']['last_name'])) is-valid @enderror" id="last_name{{ $id }}" name="last_name{{ $id }}" placeholder="Client last name" @if(!is_null($this->form->clients[$id]['client_id'])) readonly @endif>
                                                @error('form.clients.' . $id . '.info.last_name')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3 ps-0">
                                                <label for="dob{{ $id }}" class="form-label">Date of birth</label>
                                                <input wire:model.blur="form.clients.{{ $id }}.info.dob" type="date" class="form-control form-control-sm w-100 @error('form.clients.' . $id . '.info.dob') is-invalid @elseif(isNotNullAndNotEmptyString($this->form->clients[$id]['info']['dob'])) is-valid @enderror" id="dob{{ $id }}" name="dob{{ $id }}" placeholder="Client first name" @if(!is_null($this->form->clients[$id]['client_id'])) readonly @endif>
                                                @error('form.clients.' . $id . '.info.dob')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3 pe-0">
                                                <label class="form-label opacity-0 d-block">Add relative</label>
                                                <button wire:click="addRelative({{ $id }})" wire:loading.attr="disabled" type="button" class="btn btn-sm btn-primary w-100" @if(!is_null($this->form->clients[$id]['client_id'])) disabled @endif>Add relative</button>
                                            </div>
                                        </div>
                                        <button wire:click="clearClientInfo({{ $id }})" type="button" class="btn btn-alt-info position-absolute py-0 px-1" style="top: 5px; @if($id === 0) right: 5px; @else right: 27px; @endif font-size: 12px;">
                                            <i class="fa fa-eraser"></i>
                                        </button>
                                        @if($id != 0)
                                            <button wire:click="removeClient({{ $id }})" type="button" class="btn btn-alt-danger position-absolute py-0 px-1" style="top: 5px; right: 5px; font-size: 12px;">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        @endif
                                        @if(!empty($this->form->clients[$id]['info']['relatives']))
                                            <hr class="mt-0">
                                            @foreach($this->form->clients[$id]['info']['relatives'] as $relativeId => $relative)
                                                <div class="row w-100 p-3 mx-0 mb-4 bg-light rounded-2 position-relative">
                                                    <div class="col-md-4 ps-0">
                                                        <label class="form-label" for="fullname{{ $relativeId }}">Fullname: <span class="text-danger">*</span></label>
                                                        <input wire:model.blur="form.clients.{{ $id }}.info.relatives.{{ $relativeId }}.fullname" type="text" class="form-control form-control-sm w-100 @error('form.clients.' . $id . '.info.relatives.' . $relativeId . '.fullname') is-invalid @elseif(isNotNullAndNotEmptyString($this->form->clients[$id]['info']['relatives'][$relativeId]['fullname'])) is-valid @enderror" id="fullname{{ $relativeId }}" name="fullname{{ $relativeId }}" placeholder="Fullname">
                                                        @error('form.clients.' . $id . '.info.relatives.' . $relativeId . '.fullname')
                                                        <span class="invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4 px-md-2 px-0">
                                                        <label class="form-label" for="phone_number{{ $relativeId }}">Phone number: <span class="text-danger">*</span></label>
                                                        <input wire:model.blur="form.clients.{{ $id }}.info.relatives.{{ $relativeId }}.phone_number" type="number" class="form-control form-control-sm w-100 @error('form.clients.' . $id . '.info.relatives.' . $relativeId . '.phone_number') is-invalid @elseif(isNotNullAndNotEmptyString($this->form->clients[$id]['info']['relatives'][$relativeId]['phone_number'])) is-valid @enderror" id="phone_number{{ $relativeId }}" name="phone_number{{ $relativeId }}" placeholder="Phone number">
                                                        @error('form.clients.' . $id . '.info.relatives.' . $relativeId . '.phone_number')
                                                        <span class="invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4 pe-0">
                                                        <label class="form-label" for="relative_status_id{{ $relativeId }}">Relative status: <span class="text-danger">*</span></label>
                                                        <select wire:model.blur="form.clients.{{ $id }}.info.relatives.{{ $relativeId }}.relative_status_id" class="form-select form-select-sm w-100 @error('form.clients.' . $id . '.info.relatives.' . $relativeId . '.relative_status_id') is-invalid @elseif(!is_null($this->form->clients[$id]['info']['relatives'][$relativeId]['relative_status_id'])) is-valid @enderror" id="relative_status_id{{ $relativeId }}" name="relative_status_id{{ $relativeId }}">
                                                            <option value="null" disabled>Choose</option>
                                                            @foreach($relativeStatuses as $relativeStatus)
                                                                <option value="{{ $relativeStatus->id }}">{{ $relativeStatus->translation->translation }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('form.clients.' . $id . '.info.relatives.' . $relativeId . '.relative_status_id')
                                                        <span class="invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <button wire:click="removeRelative({{ $id }}, {{ $relativeId }})" wire:loading.attr="disabled" type="button" class="btn btn-alt-danger position-absolute py-0 px-1 w-auto" style="top: 5px; right: 5px; font-size: 12px;">
                                                        <i class="fa fa-times" style="font-size: 14px"></i>
                                                    </button>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="fade @if($this->form->activeSection === 'payments') show @else d-none @endif">
                            <div class="row w-100 p-0 m-0">
                                @foreach($this->form->payments as $id => $payment)
                                    <div class="col-12 border rounded-3 p-3 mb-3 position-relative">
                                        <div class="row w-100 p-0 m-0">
                                            <div class="col-md-6 mb-3 ps-0">
                                                <label for="client_name{{ $id }}" class="form-label">Client name</label>
                                                <input wire:model.blur="form.payments.{{ $id }}.client_name" type="text" class="form-control form-control-sm w-100 @error('form.clients.' . $id . '.info.first_name') is-invalid @elseif(isNotNullAndNotEmptyString($this->form->payments[$id]['client_name'])) is-valid @enderror" id="client_name{{ $id }}" name="client_name{{ $id }}" placeholder="Client name" disabled>
                                                @error('form.payments.' . $id . '.client_name')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3 pe-0">
                                                <label for="service_price{{ $id }}" class="form-label">Service price</label>
                                                <input wire:model.blur="form.service_price" type="number" class="form-control form-control-sm w-100 @error('form.service_price') is-invalid @elseif(isNotNullAndNotEmptyString($this->form->service_price)) is-valid @enderror" id="service_price{{ $id }}" name="service_price{{ $id }}" placeholder="Service price" disabled>
                                                @error('form.service_price')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3 ps-0">
                                                <label for="payment_amount{{ $id }}" class="form-label">Payment amount</label>
                                                <input wire:model.blur="form.payments.{{ $id }}.payment_amount" type="number" class="form-control form-control-sm w-100 @error('form.clients.' . $id . '.info.first_name') is-invalid @elseif(isNotNullAndNotEmptyString($this->form->payments[$id]['payment_amount'])) is-valid @enderror" id="payment_amount{{ $id }}" name="payment_amount{{ $id }}" placeholder="Payment amount" min="1">
                                                @error('form.payments.' . $id . '.payment_amount')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3 pe-0">
                                                <label for="teacher_salary{{ $id }}" class="form-label">Teacher salary</label>
                                                <input wire:model.blur="form.payments.{{ $id }}.teacher_salary" type="number" class="form-control form-control-sm w-100 @error('form.payments.' . $id . '.teacher_salary') is-invalid @elseif(isNotNullAndNotEmptyString($this->form->payments[$id]['teacher_salary']))) is-valid @enderror" id="teacher_salary{{ $id }}" name="teacher_salary{{ $id }}" placeholder="Teacher salary" min="1">
                                                @error('form.payments.' . $id . '.teacher_salary')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-2 ps-0">
                                                <label for="payment_type_id{{ $id }}" class="form-label">Payment type</label>
                                                <select wire:model.blur="form.payments.{{ $id }}.payment_type_id" class="form-select form-select-sm w-100 @error('form.clients.' . $id . '.info.first_name') is-invalid @elseif(isNotNullAndNotEmptyString($this->form->payments[$id]['payment_type_id'])) is-valid @enderror" id="payment_type_id{{ $id }}" name="payment_type_id{{ $id }}">
                                                    <option value="null" disabled>Choose</option>
                                                    @foreach($paymentTypes as $paymentType)
                                                    <option value="{{ $paymentType->id }}">{{ $paymentType->title }}</option>
                                                    @endforeach
                                                </select>
                                                @error('form.payments.' . $id . '.payment_type_id')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-2 pe-0">
                                                <label for="benefit{{ $id }}" class="form-label">Benefit</label>
                                                <input wire:model.blur="form.payments.{{ $id }}.benefit" type="number" class="form-control form-control-sm w-100 @error('form.payments.' . $id . '.benefit') is-invalid @elseif(isNotNullAndNotEmptyString($this->form->payments[$id]['benefit']))) is-valid @enderror" id="benefit{{ $id }}" name="benefit{{ $id }}" placeholder="Benefit" disabled>
                                                @error('form.payments.' . $id . '.benefit')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-footer bg-body-light p-3 w-100 text-start">
                <button data-bs-dismiss="offcanvas" type="button" class="btn btn-white border-0">
                    <small>Close</small>
                </button>
                <button wire:loading.attr="disabled" data-bs-dismiss="offcanvas" type="submit" class="btn btn-success border-0" @if($this->form->registrationForm && $this->form->paymentsForm) wire:target="create" @else disabled @endif>
                    <small>Create</small>
                </button>
            </div>
        </div>
    </form>
</div>
