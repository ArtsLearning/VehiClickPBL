<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    {{-- Form kirim ulang verifikasi email --}}
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    {{-- Form utama untuk update profil --}}
    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        {{-- FOTO PROFIL --}}
        <div class="flex items-center gap-6">
            <div class="shrink-0">
                <img id="preview-foto" class="h-36 w-36 rounded-full object-cover shadow-lg ring-2 ring-orange-400"
                    src="{{ $user->foto_customer ? asset('storage/foto_user/' . $user->foto_customer) : 'https://img.icons8.com/ios-filled/100/000000/user.png' }}"
                    alt="Foto Profil Pengguna" />
            </div>

            <div class="grow space-y-2">
                <label class="block text-sm font-medium text-gray-700" for="foto_customer">
                    {{ __('Update Profile Photo') }}
                </label>
                <input id="foto_customer" name="foto_customer" type="file" accept="image/*"
                    class="mt-1 block w-full text-sm text-gray-500
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-md file:border-0
                        file:text-sm file:font-semibold
                        file:bg-orange-50 file:text-orange-700
                        hover:file:bg-orange-100" />

                @error('foto_customer')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- DATA PROFIL --}}
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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

        <div>
            <x-input-label for="telepon" :value="__('Telepon')" />
            <x-text-input id="telepon" name="telepon" type="text" class="mt-1 block w-full"
                :value="old('telepon', $user->telepon)" required autocomplete="tel" />
            <x-input-error class="mt-2" :messages="$errors->get('telepon')" />
        </div>

        <div>
            <x-input-label for="alamat" :value="__('Alamat')" />
            <x-text-input id="alamat" name="alamat" type="text" class="mt-1 block w-full"
                :value="old('alamat', $user->alamat)" required autocomplete="street-address" />
            <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
        </div>

        {{-- Tombol SIMPAN --}}
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition
                    x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>

    @if ($user->foto_customer)
        <div class="mt-4">
            <form method="POST" action="{{ route('profile.delete-photo') }}" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"
                    onclick="return confirm('Hapus foto profil?')">
                    {{ __('Delete Photo') }}
                </button>
            </form>
        </div>
    @endif

    @if (session('status') === 'photo-deleted')
        <p class="mt-2 text-sm text-green-600">
            {{ __('Foto profil berhasil dihapus.') }}
        </p>
    @endif

    {{-- ✅ Script Preview Foto --}}
    <script>
        document.getElementById('foto_customer').addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('preview-foto').src = e.target.result;
            };
            reader.readAsDataURL(file);
        });
    </script>
</section>
