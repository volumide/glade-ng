<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>@yield('title')</title>
</head>

<body>
    <!-- ====== Navbar Section Start -->
    <header x-data="{ navbarOpen: false }" class="bg-white w-full flex items-center shadow">
        <div class="container  mx-auto py-3">
            <div class="flex -mx-4 items-center justify-between relative">
                <div class="px-4 w-60 max-w-full">
                    <a href="javascript:void(0)" class="w-full block py-5">
                        <img src="https://cdn.tailgrids.com/1.0/assets/images/logo/logo.svg" alt="logo"
                            class="w-full" />
                    </a>
                </div>
                <div class="flex px-4 justify-between items-center w-full">
                    <div>
                        <button id="navbarToggler"
                            class="block absolute right-4 top-1/2 -translate-y-1/2 lg:hidden focus:ring-2 ring-primary px-3 py-[6px] rounded-lg">
                            <span class="relative w-[30px] h-[2px] my-[6px] block bg-body-color"></span>
                            <span class="relative w-[30px] h-[2px] my-[6px] block bg-body-color"></span>
                            <span class="relative w-[30px] h-[2px] my-[6px] block bg-body-color"></span>
                        </button>
                        <nav :class="!navbarOpen && 'hidden'" id="navbarCollapse"
                            class=" absolute py-5 px-6 bg-white shadow rounded-lg max-w-[250px] w-full lg:max-w-full lg:w-full right-4 top-full lg:block lg:static lg:shadow-none">
                            <ul class="blcok lg:flex">
                                <li>
                                    <a href="/employee/login/form"
                                        class=" text-base font-medium text-dark hover:text-primary py-2 lg:inline-flex flex lg:ml-12 ">
                                        Employee Login
                                    </a>
                                </li>
                                <li>
                                    <a href="/login/company"
                                        class=" text-base font-medium text-dark hover:text-primary py-2 lg:inline-flex flex lg:ml-12 ">
                                        Company Login
                                    </a>
                                </li>
                                {{-- <li>
                                    <a href="javascript:void(0)"
                                        class=" text-base font-medium text-dark hover:text-primary py-2 lg:inline-flex flex lg:ml-12 ">
                                        Features
                                    </a>
                                </li> --}}
                            </ul>
                        </nav>
                    </div>
                    @if (!Auth::guard('company')->user() && !Auth::user() && !Auth::guard('employee')->user())
                        <div class="sm:flex justify-end hidden pr-16 lg:pr-0">
                            <a href="/admin/login/form"
                                class=" text-base font-medium shadow-lg mr-3 text-white bg-gray-500 rounded hover:text-primary py-3 px-7 ">
                                Admin
                            </a>
                            {{-- <a href="/signup"
                        class=" text-base font-medium text-white bg-blue-600 rounded py-3 px-7 hover:bg-opacity-90 ">
                        Sign Up
                    </a> --}}
                        </div>
                    @endif
                    @if (Auth::guard('company')->user() || Auth::user() || Auth::guard('employee')->user())
                        <div class="sm:flex justify-end hidden pr-16 lg:pr-0">
                            <form action="/logout">
                                <button type="submit"
                                    class=" text-base font-medium shadow-lg mr-3 text-white bg-gray-500 rounded hover:text-primary py-3 px-7">Logout
                                </button>
                            </form>

                        </div>
                    @endif
                </div>
            </div>
        </div>
    </header>
    <!-- ====== Navbar Section End -->
    <div class="container mx-auto">
        @if (Auth::guard('company')->user() || Auth::user() || Auth::guard('employee')->user())
            <div class=" flex h-screen ">
                <div class=" p-10 shadow flex flex-col">
                    <a href="/profile" class="block border w-full border-blue-200 p-5 px-24  mb-4 rounded">Profile</a>
                    <a href="/admin/all" class="block border w-full border-blue-200 p-5 px-24  mb-4 rounded">Admins</a>
                    <a href="/employee/all" class="block border  border-blue-200 p-5 px-24  mb-5 rounded">Employees</a>
                    <a href="/company/all" class="block border border-blue-200 p-5 px-24  mb-5 rounded">Companies</a>
                </div>
        @endif
        <div class="flex-1 p-10"">
            @yield('content')
        </div>
    </div>
</body>

</html>
