<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="foto_profil" :value="__('Foto Profil (Opsional, JPG/PNG)')" />
            <div class="mt-2 flex items-center gap-4">
                @if(file_exists(public_path('profiles/user_' . $user->id . '.jpg')))
                    <img src="{{ asset('profiles/user_' . $user->id . '.jpg') }}?v={{ time() }}" alt="Profile Photo" class="w-16 h-16 rounded-full object-cover border-2 border-outline-variant">
                @else
                    <div class="w-16 h-16 rounded-full bg-surface-container-high flex items-center justify-center text-on-surface-variant border-2 border-outline-variant">
                        <span class="material-symbols-outlined text-[32px]">person</span>
                    </div>
                @endif
                <input id="foto_profil" name="foto_profil" type="file" accept="image/jpeg, image/png" class="block w-full text-sm text-on-surface-variant file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary-container file:text-on-primary-container hover:file:bg-primary-container/80" />
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('foto_profil')" />
        </div>

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="no_telp" :value="__('No. Telepon')" />
            <x-text-input id="no_telp" name="no_telp" type="text" class="mt-1 block w-full" :value="old('no_telp', \App\Models\Pelanggan::where('email', $user->email)->first()->no_telp ?? '')" autocomplete="tel" />
            <x-input-error class="mt-2" :messages="$errors->get('no_telp')" />
        </div>

        <div>
            <x-input-label for="alamat" :value="__('Alamat Rumah')" />
            <textarea id="alamat" name="alamat" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="3">{{ old('alamat', \App\Models\Pelanggan::where('email', $user->email)->first()->alamat ?? '') }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
