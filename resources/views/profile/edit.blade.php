@extends('layouts.sipa')

@section('content')
<div class="pt-24 pb-12 min-h-screen bg-background">
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop space-y-8">
        
        <div class="flex items-center gap-4 mb-8">
            <a href="{{ url('/profil') }}" class="w-10 h-10 rounded-xl bg-surface-container-high flex items-center justify-center text-on-surface hover:bg-outline-variant/20 transition-colors">
                <span class="material-symbols-outlined">arrow_back</span>
            </a>
            <div>
                <h2 class="font-headline-lg text-headline-lg text-on-surface">Ubah Profil</h2>
                <p class="text-on-surface-variant font-body-md">Kelola informasi pribadi dan pengaturan keamanan akun Anda.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-8">
            <div class="p-6 sm:p-8 bg-surface-container-lowest border border-outline-variant rounded-2xl premium-shadow">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-6 sm:p-8 bg-surface-container-lowest border border-outline-variant rounded-2xl premium-shadow">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-6 sm:p-8 bg-error-container/10 border border-error/20 rounded-2xl premium-shadow">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Override Breeze components styling to match SIPA theme */
    input[type="text"], input[type="email"], input[type="password"] {
        border-radius: 0.75rem !important;
        border-color: #ccc3d8 !important;
        padding: 0.75rem 1rem !important;
        box-shadow: none !important;
        background-color: #fcf8ff !important;
    }
    input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus {
        border-color: #630ed4 !important;
        --tw-ring-color: rgba(99, 14, 212, 0.2) !important;
    }
    .text-gray-900 { color: #181445 !important; }
    .text-gray-600 { color: #4a4455 !important; }
    
    /* Buttons */
    button[type="submit"], .inline-flex.items-center.px-4.py-2.bg-gray-800 {
        background-color: #630ed4 !important;
        color: white !important;
        border-radius: 0.75rem !important;
        font-weight: 700 !important;
        padding: 0.75rem 1.5rem !important;
        text-transform: none !important;
        letter-spacing: normal !important;
    }
    button[type="submit"]:hover, .inline-flex.items-center.px-4.py-2.bg-gray-800:hover {
        background-color: #7c3aed !important;
    }
    .bg-red-600 {
        background-color: #ba1a1a !important;
        border-radius: 0.75rem !important;
    }
    .bg-red-600:hover {
        background-color: #93000a !important;
    }
</style>
@endsection
