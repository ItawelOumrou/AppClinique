<x-guest-layout>
    <div class="col-md-8 col-md-offset-2" style="margin:100px auto 0;width:500px;height:700px;background-color:white">
     
                <div style="background-color:silver;padding:20px;margin-bottom:18px">
                    <h1>Se connecter </h1>
                </div>

                <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
               <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <div>
                        <form method="POST" action="{{ route('admin.adminlogin') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="from-group @if($errors->get('email')) has-error @endif" style="margin:20px 0">
                                <x-label for="email" :value="__('Adress email')" />

                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                               
                            </div>
                            

                            <!-- Password -->
                            <div class="from-group @if($errors->get('password')) has-error @endif" style="margin:20px 0">
                                <x-label for="password" :value="__('Mot de passe')" />

                                <x-input id="password" class="block mt-1 w-full"
                                                type="password"
                                                name="password"
                                                required autocomplete="current-password" />
                            </div>
                            <!-- Remember Me -->
                            <div class="block mt-4" style="margin:20px 0">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Souviens-toi de moi') }}</span>
                                </label>
                            </div>

                            <div class="flex items-center justify-end mt-4" >
                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                        {{ __('Mot de passe oublié?') }}
                                    </a>
                                @endif

                                <x-button class="ml-3">
                                    {{ __('connecter') }}
                                </x-button>
                            </div>
                        </form>
                </div>
    </div>
       
</x-guest-layout>
