<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" style="max-width: 400px; margin: 0 auto; padding: 20px; border: 1px solid #960a0a; border-radius: 10px; background-color: #b6e3f0;">
        @csrf

        <!-- Name -->
        <div style="margin-bottom: 15px;">
            <label for="name" style="display: block; font-weight: bold; margin-bottom: 5px;">Name</label>
            <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" style="width: 100%; padding: 8px; border: 1px solid #000000; border-radius: 5px;" />
            @if ($errors->has('name'))
                <span style="color: red; font-size: 0.875em;">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <!-- Email Address -->
        <div style="margin-bottom: 15px;">
            <label for="email" style="display: block; font-weight: bold; margin-bottom: 5px;">Email</label>
            <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" style="width: 100%; padding: 8px; border: 1px solid #000000; border-radius: 5px;" />
            @if ($errors->has('email'))
                <span style="color: red; font-size: 0.875em;">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <!-- Password -->
        <div style="margin-bottom: 15px;">
            <label for="password" style="display: block; font-weight: bold; margin-bottom: 5px;">Password</label>
            <input id="password" type="password" name="password" required autocomplete="new-password" style="width: 100%; padding: 8px; border: 1px solid #000000; border-radius: 5px;" />
            @if ($errors->has('password'))
                <span style="color: red; font-size: 0.875em;">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <!-- Confirm Password -->
        <div style="margin-bottom: 15px;">
            <label for="password_confirmation" style="display: block; font-weight: bold; margin-bottom: 5px;">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" style="width: 100%; padding: 8px; border: 1px solid #000000; border-radius: 5px;" />
            @if ($errors->has('password_confirmation'))
                <span style="color: red; font-size: 0.875em;">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center;">
            <a href="{{ route('login') }}" style="color: #007bff; text-decoration: none;">Already registered?</a>
            <button type="submit" style="padding: 10px 20px; background-color: #007bff; color: rgb(255, 255, 255); border: none; border-radius: 5px; cursor: pointer;">Register</button>
        </div>
    </form>
</x-guest-layout>
