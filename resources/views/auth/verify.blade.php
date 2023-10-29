<x-layouts.auth>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            <span>A fresh verification link has been sent to your email address.</span>
        </div>
    @endif

    <!-- Header -->
    <div class="py-4 text-center">
        <x-sections.fillers.logo />
        <h1 class="h3 fw-bold mt-4 mb-2">Don’t worry, we’ve got your back</h1>
        <h2 class="h5 fw-medium text-muted mb-0">Please verify your email</h2>
    </div>

    <!-- Reminder Form -->
    <form class="js-validation-reminder" action="{{ route('verification.send') }}" method="POST">
        @csrf
        <div class="block block-themed block-rounded block-fx-shadow">
            <div class="block-header bg-gd-earth">
                <h3 class="block-title">Verify email</h3>
            </div>
            <div class="block-content">
                <div class="pb-3 text-center">
                    <h1 class="h5 fw-bold mb-1">Before proceeding, please check your email for a verification link.</h1>
                    <h2 class="fs-sm fw-medium text-muted mb-0 mt-4">If you did not receive the email</h2>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <button type="submit" class="btn btn-lg btn-alt-success fw-semibold w-100">Resend verification email</button>
                </div>
            </div>
            <div class="block-content block-content-full bg-body-light text-center d-flex justify-content-between py-3">
                <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block" href="{{ route('register') }}">
                    <i class="fa fa-plus opacity-50 me-1"></i> Create Account
                </a>
                <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block" href="{{ route('login') }}">Sign in</a>
            </div>
        </div>
    </form>
</x-layouts.auth>

