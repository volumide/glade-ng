@extends('master.head')

@section('title', 'Signup')

@section('content')
    <form action="/company/update/{{ $data->id }}" method="post"
        class="pb-10 shadow-md mt-5 rounded overflow-hidden lg:w-2/5 mx-auto" enctype="multipart/form-data">
        @csrf
        <h1 class="text-2xl text-center mb-10 bg-gray-800 py-5  text-white font-bold">Company Register </h1>
        <div class="w-full px-4">
            <div class="mb-5">
                <label for="" class="font-medium text-base text-black block mb-3">
                    Name
                </label>
                <input type="text" placeholder="Default Input" name="name"
                    value="{{ @old('name') ? @old('name') : $data->name }}"
                    class=" w-full border-[1.5px] border-form-stroke rounded-lg py-3 px-5 font-medium text-body-color placeholder-body-color outline-none focus:border-primary active:border-primary transition disabled:bg-[#F5F7FD] disabled:cursor-default">
                @error('name')
                    <p class="text-red-400">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="w-full px-4">
            <div class="mb-5">
                <label for="" class="font-medium text-base text-black block mb-3">
                    Email
                </label>
                <input type="email" placeholder="Default Input" name="email" value="{{ $data->email }}" disabled
                    class=" w-full border-[1.5px] border-form-stroke rounded-lg py-3 px-5 font-medium text-body-color placeholder-body-color outline-none focus:border-primary active:border-primary transition disabled:bg-[#F5F7FD] disabled:cursor-default">
                @error('email')
                    <p class="text-red-400">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="w-full px-4">
            <div class="mb-5">
                <label for="" class="font-medium text-base text-black block mb-3">
                    Password
                </label>
                <input type="password" placeholder="Default Input" name="password"
                    class=" w-full border-[1.5px] border-form-stroke rounded-lg py-3 px-5 font-medium text-body-color placeholder-body-color outline-none focus:border-primary active:border-primary transition disabled:bg-[#F5F7FD] disabled:cursor-default">
                @error('password')
                    <p class="text-red-400">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="w-full  px-4">
            <div class="mb-5">
                <label for="" class="font-medium text-base text-black block mb-3">
                    Logo
                </label>
                <input type="file" placeholder="Default Input" name="img"
                    class=" w-full border-[1.5px] border-form-stroke rounded-lg py-3 px-5 font-medium text-body-color placeholder-body-color outline-none focus:border-primary active:border-primary transition disabled:bg-[#F5F7FD] disabled:cursor-default">
            </div>
        </div>
        <div class="w-full  px-4">
            <div class="mb-5">
                <label for="" class="font-medium text-base text-black block mb-3">
                    Website
                </label>
                <input type="text" placeholder="Default Input" name="website"
                    value="{{ @old('website') ? @old('website') : $data->website }}"
                    class=" w-full border-[1.5px] border-form-stroke rounded-lg py-3 px-5 font-medium text-body-color placeholder-body-color outline-none focus:border-primary active:border-primary transition disabled:bg-[#F5F7FD] disabled:cursor-default">
            </div>
        </div>
        <div class="w-full  px-4">
            <button type="submit" class="bg-blue-600 rounded text-white p-4 w-full">Sign up</button>
        </div>
    </form>
@endsection
