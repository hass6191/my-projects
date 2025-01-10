<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">
            {{ __('Welcome to QuizApp! 🎉') }}
        </h1>
        <p class="mt-2 text-gray-600 dark:text-gray-400">
            {{ __('We are thrilled to have you on board! Before getting started, please verify your email address.') }}
        </p>
    </div>

    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Click the verification link we sent to your email. Didn\'t receive it? Don’t worry—you can request a new one below.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('We’ve sent a new verification link to your email address. Please check your inbox! 📬') }}
        </div>
    @endif

    <div class="mt-6 flex flex-col md:flex-row items-center justify-center space-y-4 md:space-y-0 md:space-x-6">
        <!-- Resend Verification Email -->
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <x-primary-button>
                {{ __('Resend Verification Email') }}
            </x-primary-button>
        </form>

        <!-- Log Out -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>

    <div class="mt-8 text-center">
        <p class="text-xs text-gray-500 dark:text-gray-300">
            {{ __('Need help? Contact us at ') }}
            <a href="mailto:support@quizapp.com" class="text-indigo-600 dark:text-indigo-400 underline">
                support@quizapp.com
            </a>.
        </p>
    </div>

    <div class="mt-8 text-xs text-gray-500 dark:text-gray-300">
        {{ __('Your email verification helps us ensure a secure and reliable experience for all users.') }}
    </div>
</x-guest-layout>