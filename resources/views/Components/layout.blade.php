
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BlogApp</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="min-h-full">
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <x-nav-link href="/" :active="request()->is('/')" type="a">Home</x-nav-link>
                            <x-nav-link href="/jobs" :active="request()->is('jobs')" >jobs</x-nav-link>
                            <x-nav-link href="/contact" :active="request()->is('contact')" >Contact</x-nav-link>
                        </div>

                    </div>
                </div>
                @guest()
                        <div>
                            <x-nav-link href="/register">Register</x-nav-link>
                            <x-nav-link href="/login">login</x-nav-link>
                        </div>
                @endguest
                @auth()

                    <form  method="POST"  name="logout" action="/logout">
                    @csrf
                    <x-form-button name="logout">logout</x-form-button>
                    </form>
                @endauth
            </div>
        </div>

    </nav>

    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 sm:flex sm:justify-between">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{$heading}}</h1>
            <div>
                <x-button href="/jobs/create">Create a Job</x-button>
            </div>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            {{$slot}}
        </div>
    </main>
</div>

</body>
</html>
