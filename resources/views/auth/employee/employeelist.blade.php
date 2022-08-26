@extends('master.head')
@section('title', 'Employee')
@section('content')
    <div class="py-5 mb-5 text-right "><a href="/employee/register/form"
            class="rounded  text-white bg-blue-600  px-5 p-5 ">Create new
            Employee</a>
    </div>
    <ul>
        @foreach ($data as $d)
            <li class="py-3 flex justify-between items-center shadow mb-3 p-3">
                <p> {{ $d->first_name }} {{ $d->last_name }}</p>
                <div>
                    <a class=" rounded  text-white bg-blue-600 mr-5 px-5 p-3 "
                        href="/employee/profile/{{ $d->id }}">View</a>
                    <a href="/employee/update/{{ $d->id }}"
                        class="border-gray-200 border rounded  p-3 runded mx-5">Update</a>
                    {{-- <button class=" rounded border border-2 border-gray-200 mr-5 px-5 p-3 runded">Edit</button> --}}
                    <button class="bg-red-500 rounded text-white p-3">Delete</button>
                </div>
            </li>
        @endforeach
    </ul>

    @if ($data->lastPage() > 1)
        <div class="text-center border mt-3 p-4 rounded">
            {{ $data->links() }}
        </div>
    @endif
@endsection
