<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        // Ambil role user setelah login
        $role = auth()->user()->role ?? null;

        // Redirect sesuai role
        if ($role === 'admin') {
            $this->redirectIntended(default: route('admin.obat-input', absolute: false), navigate: true);
        } elseif ($role === 'dokter') {
            $this->redirectIntended(default: route('dokter.rekap-obat', absolute: false), navigate: true);
        } else {
            $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
        }
    }
};
?>

<div class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 px-4">
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form wire:submit="login" class="space-y-6">
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input
                    wire:model="form.email"
                    id="email"
                    class="block mt-1 w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                    type="email"
                    name="email"
                    required autofocus autocomplete="username"
                />
                <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input
                    wire:model="form.password"
                    id="password"
                    class="block mt-1 w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                    type="password"
                    name="password"
                    required autocomplete="current-password"
                />
                <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input wire:model="form.remember" id="remember" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                    name="remember">
                <label for="remember" class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</label>
            </div>

            <div class="flex items-center justify-between">
                @if (Route::has('password.request'))
                    <a class="text-sm text-indigo-600 hover:text-indigo-500 underline focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded transition"
                        href="{{ route('password.request') }}" wire:navigate>
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ml-3 px-6 py-2 text-sm font-semibold tracking-wide">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>