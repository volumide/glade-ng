@extends('master.head')

@section('title', 'Login')

@section('content')
    <form action="/admin/login" method="POST" class="pb-10 shadow-md mt-5 rounded overflow-hidden lg:w-2/5 mx-auto">
        @csrf
        <h1 class="text-2xl text-center mb-10 bg-gray-800 py-5  text-white font-bold">Admin Login Page </h1>
        <p class="text-center text-red-500">{{ session('message') }}</p>

        <div class="w-full px-4">
            <div class="mb-5">
                <label for="" class="font-medium text-base text-black block mb-3">
                    Email
                </label>
                <input type="email" placeholder="Default Input" name="email"
                    class=" w-full border-[1.5px] border-form-stroke rounded-lg py-3 px-5 font-medium text-body-color placeholder-body-color outline-none focus:border-primary active:border-primary transition disabled:bg-[#F5F7FD] disabled:cursor-default">

            </div>
        </div>
        <div class="w-full px-4">
            <div class="mb-5">
                <label for="" class="font-medium text-base text-black block mb-3">
                    Password
                </label>
                <input type="password" placeholder="Default Input" name="password"
                    class=" w-full border-[1.5px] border-form-stroke rounded-lg py-3 px-5 font-medium text-body-color placeholder-body-color outline-none focus:border-primary active:border-primary transition disabled:bg-[#F5F7FD] disabled:cursor-default">
            </div>
        </div>
        <div class="w-full  px-4">
            <button type="submit" class="bg-blue-600 rounded text-white p-4 w-full">Login</button>
        </div>
    </form>
@endsection
