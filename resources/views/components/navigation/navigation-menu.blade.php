<nav x-data="{ open: false }" class="relative z-10 border-b border-teal-500 border-opacity-25 lg:bg-transparent lg:border-none">
    <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8">
        <div class="relative h-16 flex items-center justify-between lg:border-b lg:border-light-blue-800">
            <div class="px-2 flex items-center lg:px-0">
                <!-- Icon -->
                <div class="flex-shrink-0">
                    <img class="block h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-teal-400.svg" alt="Workflow">
                </div>
                <!-- Main Navigation Links -->
                <div class="hidden lg:block lg:ml-6 lg:space-x-4">
                    <div class="flex">
                        <x-navigation.main-nav-link routeName="dashboard" />
                        <x-navigation.main-nav-link routeName="recipes" />
                    </div>
                </div>
            </div>
            <!-- Search Bar -->
            <div class="flex-1 px-2 flex justify-center lg:ml-6 lg:justify-end">
                <div class="max-w-lg w-full lg:max-w-xs">
                    <label for="search" class="sr-only">Search</label>
                    <div class="relative text-light-blue-100 focus-within:text-gray-400">
                        <div class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
                            <!-- Heroicon name: search -->
                            <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input
                               autocomplete="off"
                               id="search"
                               name="search"
                               class="block w-full bg-light-blue-700 bg-opacity-50 py-2 pl-10 pr-3 border border-transparent rounded-md leading-5 placeholder-light-blue-100 focus:outline-none focus:bg-white focus:ring-white focus:border-white focus:placeholder-gray-500 focus:text-gray-900 sm:text-sm"
                               placeholder="Search"
                               type="search">
                    </div>
                </div>
            </div>
            <!-- Mobile menu button -->
            <div class="flex lg:hidden ">
                <button @click="open = ! open" class="p-2 rounded-md inline-flex items-center justify-center text-light-blue-200 hover:text-white hover:bg-light-blue-800 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!-- Icon when menu is closed. -->
                    <!--
                      Heroicon name: menu

                      Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg class="block flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- Icon when menu is open. -->
                    <!--
                      Heroicon name: x

                      Menu open: "block", Menu closed: "hidden"
                    -->
                    <svg class="hidden flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <!-- Profile Dropdown -->
            <div class="hidden lg:block lg:ml-4">
                <div class="flex items-center">
                    <!-- Profile dropdown -->
                    <x-navigation.dropdown>
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="rounded-full flex text-sm text-white focus:outline-none focus:bg-light-blue-900 focus:ring-2 focus:ring-offset-2 focus:ring-offset-light-blue-900 focus:ring-white" id="user-menu" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="rounded-full h-8 w-8"  src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                        <button type="button" class="rounded px-2 flex text-sm text-white focus:outline-none focus:bg-light-blue-900 focus:ring-2 focus:ring-offset-2 focus:ring-offset-light-blue-900 focus:ring-white" id="user-menu" aria-haspopup="true">
                                            {{ Auth::user()->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                            @endif
                        </x-slot>
                        <x-slot name="content">
                            <div>
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>

                                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-jet-dropdown-link>

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-jet-dropdown-link>
                                @endif

                                <div class="border-t border-gray-100"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Logout') }}
                                    </x-jet-dropdown-link>
                                </form>
                            </div>
                        </x-slot>
                    </x-navigation.dropdown>
                </div>
            </div>
        </div>
    </div>

    <!--
      Mobile menu, toggle classes based on menu state.
    -->
    <div :class="{'block': open, 'hidden': ! open}" class="bg-light-blue-900">
        <div class="pt-2 pb-3 px-2 space-y-1">
            <!-- Current: "bg-black bg-opacity-25", Default: "hover:bg-light-blue-800" -->
            <x-navigation.responsive-nav-link routeName="dashboard" />
            <x-navigation.responsive-nav-link routeName="recipes" />
        </div>
        <div class="pt-4 pb-3 border-t border-light-blue-800">
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="flex items-center px-4">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="flex-shrink-0 mr-3">
                            <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </div>
                    @endif

                    <div>
                        <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-white">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Account Management -->
                    <x-navigation.responsive-nav-link routeName="profile.show" displayName="Profile" />

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-navigation.responsive-nav-link routeName="api-tokens.index" displayName="API Tokens" />
                    @endif

                <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-navigation.responsive-nav-link routeName="logout" displayName="Logout"
                                                   onclick="event.preventDefault();
                                    this.closest('form').submit();" />
                    </form>

                    <!-- Team Management -->
{{--                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())--}}
{{--                        <div class="border-t border-gray-200"></div>--}}

{{--                        <div class="block px-4 py-2 text-xs text-gray-400">--}}
{{--                            {{ __('Manage Team') }}--}}
{{--                        </div>--}}

{{--                        <!-- Team Settings -->--}}
{{--                        <x-navigation.responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">--}}
{{--                            {{ __('Team Settings') }}--}}
{{--                        </x-navigation.responsive-nav-link>--}}

{{--                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())--}}
{{--                            <x-navigation.responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">--}}
{{--                                {{ __('Create New Team') }}--}}
{{--                            </x-navigation.responsive-nav-link>--}}
{{--                        @endcan--}}

{{--                        <div class="border-t border-gray-200"></div>--}}

{{--                        <!-- Team Switcher -->--}}
{{--                        <div class="block px-4 py-2 text-xs text-gray-400">--}}
{{--                            {{ __('Switch Teams') }}--}}
{{--                        </div>--}}

{{--                        @foreach (Auth::user()->allTeams() as $team)--}}
{{--                            <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />--}}
{{--                        @endforeach--}}
{{--                    @endif--}}
                </div>
            </div>
        </div>
    </div>
</nav>
