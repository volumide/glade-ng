{{-- @php
dd($data);
@endphp --}}
@extends('master.head')
@section('title', 'Employee')
@section('content')
    <div class="py-5 mb-5 text-right "><a href="/admin/register/form" class="rounded text-white bg-blue-600  px-5 p-5 ">Create
            new
            Admin</a>
    </div>
    <ul>
        @foreach ($data as $d)
            @if ($d->role == 0)
                <li class="py-3 flex justify-between items-center shadow mb-3 p-3">
                    <p> {{ $d->name }}</p>
                    <div class="py-3">
                        <a href="/admin/profile/{{ $d->id }}"
                            class=" rounded border border-2 border-gray-200 mr-5 px-5 p-3 ">View</a>
                        <a
                            href="/admin/delete/{{ $d->id }}"class="bg-red-500 border rounded text-white p-3 runded">Delete</a>
                    </div>
                </li>
            @endif
        @endforeach
    </ul>

    @if ($data->lastPage() > 1)
        <div class="text-center border mt-3 p-4 rounded">
            {{ $data->links() }}
        </div>
    @endif
@endsection
