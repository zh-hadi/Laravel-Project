<x-layout>
    <h1 class="text-4xl font-semibold text-center my-16 text-slate-600">
        Sing in to your account
    </h1>
    <x-card class="py-8 px-16">
        <form action="{{route('auth.store')}}" method="post">
            @csrf
            <div class="mb-8">
                <label for="">Email</label>
                <x-text-input name="email"/>
            </div>
            <div class="mb-8">
                <label for="">Password</label>
                <x-text-input type="password" name="password"/>
            </div>
            <div class="mb-8 flex justify-between">
                <div class="flex items-center space-x-2">
                    <input type="checkbox" name="remember" class="rounded-sm border border-slate-400"/>
                    <label for="">Remember me</label>
                </div>
                <div>
                    <a href="#" class="text-sm text-indigo-600 hover:underline">Forget password?</a>
                    
                </div>
            </div>
            <x-button class="bg-green-50">Login</x-button>
        </form>
    </x-card>
</x-layout>