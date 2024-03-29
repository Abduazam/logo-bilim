<x-layouts.app>
    <div class="pb-4">
        <div class="row w-100 h-100 p-0 m-0">
            <div class="col-lg-9 col-md-8 ps-0">
                <div class="block block-rounded">
                    <div class="block-header bg-primary-dark text-white">
                        <p class="small mb-0 fw-bold">{{ trans('dashboard.sections.user') }} {{ strtolower(trans('dashboard.fields.info')) }}</p>
                    </div>
                    <div class="block-content fs-sm">
                        <div class="row w-100 h-100 p-0 mx-0 mb-4 align-items-center">
                            <div class="col-4 text-end">
                                <label class="form-label mb-0" for="name">{{ trans('dashboard.fields.name') }}:</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control form-control-sm w-75" id="name" name="name" value="{{ $user->name }}" readonly>
                            </div>
                        </div>
                        <div class="row w-100 h-100 p-0 mx-0 mb-4 align-items-center">
                            <div class="col-4 text-end">
                                <label class="form-label mb-0" for="email">{{ trans('dashboard.fields.email') }}:</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control form-control-sm w-75" id="email" name="email" value="{{ $user->email }}" readonly>
                            </div>
                        </div>
                        <div class="row w-100 h-100 p-0 mx-0 mb-4 align-items-center">
                            <div class="col-4 text-end">
                                <label class="form-label mb-0" for="role">{{ trans('dashboard.fields.role') }}:</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control form-control-sm w-75" id="role" name="role" value="{{ $user->getRolesName() }}" readonly>
                            </div>
                        </div>
                        @if(!$user->admin())
                        <div class="row w-100 h-100 p-0 mx-0 mb-4 align-items-center">
                            <div class="col-4 text-end">
                                <label class="form-label mb-0" for="role">{{ trans('dashboard.fields.branches') }}:</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control form-control-sm w-75" id="role" name="role" value="{{ $user->getBranchName() }}" readonly>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="block block-bordered block-rounded">
                        <div class="block-header bg-primary-dark" role="tab" id="accordion_h5">
                            <a class="small fw-bold text-white collapsed" data-bs-toggle="collapse" data-bs-parent="#accordion" href="#accordion_q5" aria-expanded="false" aria-controls="accordion_q5">{{ trans('dashboard.sections.user') }} {{ strtolower(trans('dashboard.sections.permissions')) }}</a>
                        </div>
                        <div id="accordion_q5" class="collapse" role="tabpanel" aria-labelledby="accordion_h5" data-bs-parent="#accordion">
                            <div class="block-content fs-sm">
                                <div class="table-responsive text-nowrap mb-4">
                                    <table class="own-table w-100">
                                        <thead>
                                        <tr>
                                            <th class="text-center">{{ trans('dashboard.fields.key') }}</th>
                                            <th class="text-center">{{ trans('dashboard.fields.translation') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($user->getPermissions() as $permission)
                                            <tr>
                                                <td class="text-center">{{ $permission->name }}</td>
                                                <td class="text-center">{{ $permission->translation }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <x-forms.buttons.default.back route="{{ route('dashboard.user-management.users.index') }}" />
            </div>

            <div class="col-lg-3 col-md-4 pe-0">
                <div class="block block-rounded">
                    <div class="block-header bg-primary-dark text-white">
                        <p class="small mb-0 fw-bold">{{ trans('dashboard.sections.user') }} {{ strtolower(trans('dashboard.fields.photo')) }}</p>
                    </div>
                    <div class="block-content fs-sm">
                        <div class="mb-4">
                            @if(!is_null($user->photo))
                                <div class="options-container">
                                    {!! $user->getPhoto('name', 'w-100') !!}
                                </div>
                            @else
                                <div class="border rounded-3 p-3 text-center">
                                    <span class="text-secondary">{{ trans('dashboard.sections.user') }} {{ trans('dashboard.warnings.have-not-photo') }}</span>
                                    <a href="{{ $user->admin() ? route('dashboard.settings') : route('dashboard.user-management.users.edit', $user) }}" class="btn btn-sm btn-primary w-100 mt-2">{{ trans('dashboard.fields.photo') }} {{ strtolower(trans('dashboard.actions.upload')) }}</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
