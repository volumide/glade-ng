@extends('master.head')
@section('title', 'Employee')
@section('content')
    <div class="py-5 mb-5 text-right ">
        <a href="/register/company" class="rounded  text-white bg-blue-600  px-5 p-5 ">Create new Company
        </a>
    </div>
    <ul>
        @foreach ($data as $d)
            <li class="py-3 flex justify-between items-center shadow mb-3 p-3">
                <p> {{ $d->name }}</p>
                <div>
                    <a href="/company/profile/{{ $d->id }}"
                        class=" rounded text-white bg-blue-500   px-5 p-3 runded">View</a>
                    <a href="/company/edit/{{ $d->id }}"
                        class="border-gray-200 border rounded  p-3 runded mx-5">Update</a>
                    <button class="bg-red-500 rounded text-white p-3 runded">Delete</button>
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
