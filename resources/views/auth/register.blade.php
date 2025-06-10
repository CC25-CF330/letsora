<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" style="max-width: 400px; margin: auto;">
        @csrf

        <!-- Title -->
        <h2 style="text-align: center; margin-bottom: 20px;">Register</h2>

        <!-- Name -->
        <div style="margin-bottom: 15px;">
            <label for="name" style="display: block; margin-bottom: 5px;">Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            @if ($errors->has('name'))
                <div style="color: red; font-size: 0.9em;">{{ $errors->first('name') }}</div>
            @endif
        </div>

        <!-- Email -->
        <div style="margin-bottom: 15px;">
            <label for="email" style="display: block; margin-bottom: 5px;">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            @if ($errors->has('email'))
                <div style="color: red; font-size: 0.9em;">{{ $errors->first('email') }}</div>
            @endif
        </div>

        <!-- Password -->
        <div style="margin-bottom: 15px;">
            <label for="password" style="display: block; margin-bottom: 5px;">Password</label>
            <input id="password" type="password" name="password" required autocomplete="new-password"
                style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            @if ($errors->has('password'))
                <div style="color: red; font-size: 0.9em;">{{ $errors->first('password') }}</div>
            @endif
        </div>

        <!-- Confirm Password -->
        <div style="margin-bottom: 15px;">
            <label for="password_confirmation" style="display: block; margin-bottom: 5px;">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            @if ($errors->has('password_confirmation'))
                <div style="color: red; font-size: 0.9em;">{{ $errors->first('password_confirmation') }}</div>
            @endif
        </div>

        <!-- Action Buttons -->
        <div style="display: flex; justify-content: flex-end; align-items: center;">
            <button type="submit" 
                style="padding: 8px 16px; background-color: #2d6cdf; color: white; border: none; border-radius: 4px; cursor: pointer;">
                Register
            </button>
        </div>

        <!-- Divider -->
        <hr style="margin: 20px 0;">

        <!-- Login Link -->
        <div style="text-align: center;">
            <span style="font-size: 0.9em;">Already have an account?</span>
            <a href="{{ route('login') }}" style="color: #2d6cdf; text-decoration: none; font-weight: bold;">Login</a>
        </div>
    </form>
</x-guest-layout>
