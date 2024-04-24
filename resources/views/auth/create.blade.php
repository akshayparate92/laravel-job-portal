<x-layout>
    <h1 class="mb-10 text-center text-lg font-medium text-slate-600">
        Sign in to your account
      </h1>
    <x-card>
        <form action="{{route('auth.store')}} " method="POST">
                @csrf
              
           <label for="email" class="font-medium block text-sm m-4 text-slate-600"> Email</label>     
            <input type="email" class="mb-4 px-2.5 py-1.5 ring-1 focus:ring-2 ring-slate-300 border-0 rounded-md w-full
            placeholder:text-slate-300 text-sm " name="email" placeholder="Enter  your Email Address">
             @error('email')
             <div class="text-sm text-red-600">    {{$message}}</div>
            @enderror
            <label for="password" class="mb-2 font-medium block text-sm  text-slate-600"> Password</label>     
            <input type="password" class="mb-4 px-2.5 py-1.5 ring-1 focus:ring-2 ring-slate-300 border-0 rounded-md w-full
            placeholder:text-slate-300 text-sm " name="password">
            @error('password')
               <div class="text-sm text-red-400 "> {{$message}}</div>
            @enderror
            <div class="flex justify-between mb-4 ">
                <div class="space-x-2 items-center text-xs">
                  <input type="checkbox" name="remember" class="rounded-sm border border-slate-600"/>
                  <label for="remember">Remember me</label>
                </div>
                <div >
                    <a href="#" class="text-indigo-600 hover:underline hover:text-slate-950">Forget password?</a>
                </div>
            </div>
            <x-button class="my-4 w-full px-3 py-4 hover:text-slate-800 hover:bg-slate-500 ">Sign In</x-button>
        </form>
    </x-card>
</x-layout>