@extends('master.head')

@section('title', 'Signup')

@section('content')
    <form action="/employee/register" method="POST" class="pb-10 shadow-md mt-5 rounded overflow-hidden lg:w-2/5 mx-auto">
        @csrf
        <h1 class="text-2xl text-center mb-10 bg-gray-800 py-5  text-white font-bold">Employee Register </h1>
        <div class="w-full px-4">
            <div class="mb-5">
                <label for="" class="font-medium text-base text-black block mb-3">
                    First Name
                </label>
                <input type="text" placeholder="First Name" name="first_name" value="{{ @old('first_name') }}"
                    class=" w-full border-[1.5px] border-form-stroke rounded-lg py-3 px-5 font-medium text-body-color placeholder-body-color outline-none focus:border-primary active:border-primary transition disabled:bg-[#F5F7FD] disabled:cursor-default">
                @error('first_name')
                    <p class="text-red-400">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="w-full px-4">
            <div class="mb-5">
                <label for="" class="font-medium text-base text-black block mb-3">
                    Last Name
                </label>
                <input type="text" placeholder="Last Name" name="last_name" value="{{ @old('last_name') }}"
                    class=" w-full border-[1.5px] border-form-stroke rounded-lg py-3 px-5 font-medium text-body-color placeholder-body-color outline-none focus:border-primary active:border-primary transition disabledb:bg-[#F5F7FD] disabled:cursor-default">
                @error('last_name')
                    <p class="text-red-400">{{ $message }}</p>
                @enderror
            </div>
        </div>
        @if (Auth::user())
            <div class="w-full px-4">
                <div class="mb-5">
                    <label for="" class="font-medium text-base text-black block mb-3">
                        Company
                    </label>
                    <select name="company_id" id="Id"
                        class=" w-full border-[1.5px] border-form-stroke rounded-lg py-3 px-5 font-medium text-body-color placeholder-body-color outline-none focus:border-primary active:border-primary transition">
                        <option value="">Select company</option>
                        @foreach ($data as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('company_id')
                        <p class="text-red-400">Company is compuslory</p>
                    @enderror
                </div>
            </div>
        @endif
        <div class="w-full px-4">
            <div class="mb-5">
                <label for="" class="font-medium text-base text-black block mb-3">
                    Email
                </label>
                <input type="email" placeholder="Email" name="email" value="{{ @old('email') }}"
                    class=" w-full border-[1.5px] border-form-stroke rounded-lg py-3 px-5 font-medium text-body-color placeholder-body-color outline-none focus:border-primary active:border-primary transition disabled:bg-[#F5F7FD] disabled:cursor-default">
                @error('email')
                    <p class="text-red-400">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="w-full px-4">
            <div class="mb-5">
                <label for="" class="font-medium text-base text-black block mb-3">
                    Phone
                </label>
                <input type="number" placeholder="Phone" name="phone" value="{{ @old('phone') }}"
                    class=" w-full border-[1.5px] border-form-stroke rounded-lg py-3 px-5 font-medium text-body-color placeholder-body-color outline-none focus:border-primary active:border-primary transition disabled:bg-[#F5F7FD] disabled:cursor-default">
            </div>
        </div>
        <div class="w-full px-4">
            <div class="mb-5">
                <label for="" class="font-medium text-base text-black block mb-3">
                    Password
                </label>
                <input type="password" placeholder="Password" name="password"
                    class=" w-full border-[1.5px] border-form-stroke rounded-lg py-3 px-5 font-medium text-body-color placeholder-body-color outline-none focus:border-primary active:border-primary transition disabled:bg-[#F5F7FD] disabled:cursor-default">
                @error('password')
                    <p class="text-red-400">{{ $message }}</p>
                @enderror
            </div>
        </div>
        {{-- <div class="w-full  px-4">
            <div class="mb-5">
                <label for="" class="font-medium text-base text-black block mb-3">
                    Profile Pic
                </label>
                <input type="file" placeholder="Default Input" name="logo"
                    class=" w-full border-[1.5px] border-form-stroke rounded-lg py-3 px-5 font-medium text-body-color placeholder-body-color outline-none focus:border-primary active:border-primary transition disabled:bg-[#F5F7FD] disabled:cursor-default">
            </div>
        </div> --}}

        <div class="w-full  px-4">
            <button type="submit" class="bg-blue-600 rounded text-white p-4 w-full">Sign up</button>
        </div>
    </form>
@endsection
