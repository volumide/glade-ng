{{-- {{ $data }} --}}
@extends('master.head')
@section('title', 'Company profile')
@section('content')
    <!-- component -->

    <div
        class=" mx-auto border border-2 border-green-200 rounded-xl overflow-hidden container lg:w-2/6 xl:w-2/7 sm:w-full md:w-2/3    bg-white  shadow-lg    transform   duration-200 easy-in-out">
        <div class=" h-32 overflow-hidden">
            <img class="w-full" src="" alt="" />
        </div>
        <div class="flex justify-center px-5  -mt-12">
            <img class="h-32 w-32 bg-white p-2 rounded-full   " src="https://via.placeholder.com/150" alt="" />
        </div>
        <div class=" ">
            <div class="text-center px-14">
                <h2 class="text-gray-800 text-3xl font-bold">{{ $data->name }}</h2>
                {{-- <a class="text-gray-400 mt-2 hover:text-blue-500" href="https://www.instagram.com/immohitdhiman/"
                    target="BLANK()"></a> --}}
                <p class="mt-2 text-gray-500 text-sm">{{ $data->email }} </p>
            </div>
            <hr class="mt-6" />
            <div class="bg-gray-50 ">
                <div class="text-center p-4 hover:bg-gray-100 cursor-pointer">
                    <p> <span class="font-semibold">Creator role: </span>
                        {{ $data->role ? 'Super admin' : 'admin' }}
                    </p>
                </div>

            </div>
        </div>
    </div>

@endsection
