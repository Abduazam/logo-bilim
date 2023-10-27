<?php

namespace Database\Seeders\Dashboard\Features\Texts;

use App\Models\Dashboard\Features\Texts\Text;
use App\Models\Dashboard\Features\Texts\TextTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $texts = [
            'app-name' => "Template",
            'settings' => "Settings",
            // AUTH
            'login-title' => "Welcome to Your Dashboard",
            'login-text' => "It’s a great day today!",
            'login' => "Login",
            'sign-out' => "Sign out",
            'sign-in' => "Sign in",
            'sign-up' => "Sign up",
            'forgot-password' => "Forgot Password",
            'forgot-password-title' => "Don’t worry, we’ve got your back",
            'forgot-password-text' => "Please enter your email",
            'forgot-password-email-send' => "We have emailed your password reset link.",
            'create-account' => "Create Account",
            'create-account-title' => "Create New Account",
            'create-account-text' => "We’re excited to have you on board!",
            'reset-password' => "Reset Password",
            'reset-password-title' => "Welcome back, User",
            'reset-password-text' => "Please enter your password",
            'verify-email-title' => "Don’t worry, we’ve got your back",
            'verify-email-text' => "Please verify your email",
            'verify-email' => "Verify email",
            'resend-verification-email' => "Resend verification email",
            'verify-email-warning-1' => "Before proceeding, please check your email for a verification link.",
            'verify-email-warning-2' => "If you did not receive the email",
            'verification-email-send' => "A fresh verification link has been sent to your email address.",
            // TABLE
            'actions' => "Actions",
            // FILTER
            'all' => "All",
            'search' => "Search",
            'active' => "Active",
            'inactive' => "Inactive",
            // MODELS
            'dashboard' => "Dashboard",
            'features' => "Features",
            'feature' => "Feature",
            'languages' => "Languages",
            'language' => "Language",
            'tables' => "Tables",
            'table' => "Table",
            'columns' => "Columns",
            'column' => "Column",
            'texts' => "Texts",
            'text' => "Text",
            'icons' => "Icons",
            'icon' => "Icon",
        ];

        foreach ($texts as $key => $value) {
            $text = Text::create([
                'key' => $key
            ]);

            TextTranslation::create([
                'text_id' => $text->id,
                'slug' => app()->getLocale(),
                'translation' => $value,
            ]);
        }
    }
}
