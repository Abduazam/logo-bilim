<x-layouts.auth>
    <!-- Header -->
    <div class="py-4 text-center">
        <x-sections.fillers.logo />
        <h1 class="h3 fw-bold mt-4 mb-2">Create New Account</h1>
        <h2 class="h5 fw-medium text-muted mb-0">We’re excited to have you on board!</h2>
    </div>

    <!-- Sign Up Form -->
    <form class="js-validation-signup" action="{{ route('register') }}" method="POST">
        @csrf
        <div class="block block-themed block-rounded block-fx-shadow">
            <div class="block-header bg-gd-earth">
                <h3 class="block-title">Please add your details</h3>
            </div>
            <div class="block-content">
                <x-forms.inputs.floating.input type="text" model="name" text="Name" autocomplete="true" error="true" required="true" />
                <x-forms.inputs.floating.input type="email" model="email" text="Email" autocomplete="true" error="true" required="true" value="{{ old('email') }}" />
                <x-forms.inputs.floating.input type="password" model="password" text="Password" autocomplete="true" error="true" required="true" />
                <x-forms.inputs.floating.input type="password" model="password_confirmation" text="Confirm Password" autocomplete="true" required="true" />
                <div class="row">
                    <div class="col-sm-6 d-sm-flex align-items-center push">
                        <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block" href="{{ route('login') }}">
                            <i class="fa fa-arrow-left opacity-50 me-1"></i> Sign In
                        </a>
                    </div>
                    <div class="col-sm-6 text-sm-end push">
                        <button type="submit" class="btn btn-lg btn-alt-success fw-semibold">
                            Create Account
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-layouts.auth>
