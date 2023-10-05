<x-layouts.auth>
    <!-- Header -->
    <div class="py-4 text-center">
        <x-sections.fillers.logo />
        <h1 class="h3 fw-bold mt-4 mb-2">Welcome back, Admin</h1>
        <h2 class="h5 fw-medium text-muted mb-0">Please enter your password</h2>
    </div>

    <!-- Unlock Form -->
    <form class="js-validation-lock" action="{{ route('password.update') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $request->token }}">
        <div class="block block-themed block-rounded block-fx-shadow">
            <div class="block-header bg-gd-earth">
                <h3 class="block-title">Unlock Account</h3>
            </div>
            <div class="block-content">
                <x-forms.inputs.floating.input type="email" model="email" text="Email" error="true" required="true" value="{{ $request->email ?? old('email') }}" />
                <x-forms.inputs.floating.input type="password" model="password" text="New password" autocomplete="true" error="true" required="true" />
                <x-forms.inputs.floating.input type="password" model="password_confirmation" text="Confirm Password" autocomplete="true" required="true" />
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block" href="{{ route('login') }}">
                        <i class="fa fa-arrow-left opacity-50 me-1"></i> Not you? Sign In
                    </a>
                    <button type="submit" class="btn btn-lg btn-alt-success fw-semibold">
                        Reset password
                    </button>
                </div>
            </div>
        </div>
    </form>
</x-layouts.auth>
