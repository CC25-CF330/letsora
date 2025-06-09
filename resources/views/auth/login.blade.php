<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" style="max-width: 400px; margin: auto;">
        @csrf

        <!-- Title -->
        <h2 style="text-align: center; margin-bottom: 20px;">Login</h2>

        <!-- Email -->
        <div style="margin-bottom: 15px;">
            <label for="email" style="display: block; margin-bottom: 5px;">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            @if ($errors->has('email'))
                <div style="color: red; font-size: 0.9em;">{{ $errors->first('email') }}</div>
            @endif
        </div>

        <!-- Password -->
        <div style="margin-bottom: 15px;">
            <label for="password" style="display: block; margin-bottom: 5px;">Password</label>
            <input id="password" type="password" name="password" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            @if ($errors->has('password'))
                <div style="color: red; font-size: 0.9em;">{{ $errors->first('password') }}</div>
            @endif
        </div>

        <!-- Remember Me -->
        <div style="margin-bottom: 15px;">
            <label style="font-size: 0.9em;">
                <input type="checkbox" name="remember" style="margin-right: 5px;"> Remember me
            </label>
        </div>

        <!-- Action Buttons -->
        <div style="display: flex; justify-content: space-between; align-items: center;">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" style="font-size: 0.9em; color: #555;">Forgot password?</a>
            @endif
            <button type="submit" style="padding: 8px 16px; background-color: #2d6cdf; color: white; border: none; border-radius: 4px; cursor: pointer;">
                Login
            </button>
        </div>

        <!-- Divider -->
        <hr style="margin: 20px 0;">

        <!-- Register Link -->
        <div style="text-align: center;">
            <span style="font-size: 0.9em;">Don't have an account?</span>
            <a href="{{ route('register') }}" style="color: #2d6cdf; text-decoration: none; font-weight: bold;">Register</a>
        </div>
    </form>
</x-guest-layout>
