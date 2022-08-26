@php
$data = '';
$img = '';
@endphp
@auth
    @php
    $data = Auth::user();
    @endphp
@endauth
@auth('company')
    @php
    $data = Auth::guard('company')->user();
    $img = $data->logo;
    @endphp
@endauth
@auth('employee')
    @php
    $data = Auth::guard('employee')->user();
    @endphp
@endauth



@extends('master.head')
@section('title', 'Dasboard')
@section('content')

    {{-- <p>This is dasboard page</p> --}}
    @if (session('message'))
        <p class="text-green-500 p-4 border w-2/12 rounded">{{ session('message') }} </p>
    @endif
    <br>
    @if ($img)
        <img class="h-32 w-32 bg-white p-2 rounded-full my-5" src="{{ $img }}" alt="" />
    @endif
    @if ($data)
        <p>Name: {{ $data->name }} {{ $data->first_name }} {{ $data->last_name }} </p>
        <p>Email: {{ $data->email }}</p>
        @if (($data->role && $data->role == 0) || $data->role == 1)
            <p>Role: {{ $data->role ? 'Supper Admin' : 'Admin' }}</p>
        @endif
        @if ($data->website)
            <p>Website: @if ($data->website)
                    {{ $data->website }}
                @else
                    Not available
                @endif
            </p>
        @endif
        <p>
            @if ($data->Phone)
                Phone :{{ $data->phone }}
            @endif
        </p>
    @endif

@endsection
