<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" style="max-width: 400px; margin: 0 auto; padding: 20px; border: 1px solid #960a0a; border-radius: 10px; background-color: #b6e3f0;">
        @csrf

        <!-- Email Address -->
        <div style="margin-bottom: 15px;">
            <label for="email" style="display: block; font-weight: bold; margin-bottom: 5px;">Email</label>
            <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" style="width: 100%; padding: 8px; border: 1px solid #000000; border-radius: 5px;" />
            @if ($errors->has('email'))
                <span style="color: red; font-size: 0.875em;">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <!-- Password -->
        <div style="margin-bottom: 15px;">
            <label for="password" style="display: block; font-weight: bold; margin-bottom: 5px;">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password" style="width: 100%; padding: 8px; border: 1px solid #000000; border-radius: 5px;" />
            @if ($errors->has('password'))
                <span style="color: red; font-size: 0.875em;">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <!-- Remember Me -->
        <div style="margin-bottom: 15px;">
            <label for="remember_me" style="display: inline-flex; align-items: center;">
                <input id="remember_me" type="checkbox" name="remember" style="margin-right: 8px;"/>
                <span style="font-size: 0.875em; color: #000;">Remember me</span>
            </label>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center;">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" style="color: #007bff; text-decoration: none;">Forgot your password?</a>
            @endif

            <button type="submit" style="padding: 10px 20px; background-color: #007bff; color: rgb(255, 255, 255); border: none; border-radius: 5px; cursor: pointer;">Log in</button>
        </div>
    </form>
</x-guest-layout>
