@props([
    'id',
    'header',
    'hidefooter' => false
    ])

@php
    $id = $id ?? md5($attributes->wire('model'));

@endphp

<div
     x-data="{
        show: @entangle($attributes->wire('model')),
        focusables() {
            // All focusable element types...
            let selector = 'a, button, input, textarea, select, details, [tabindex]:not([tabindex=\'-1\'])'
            return [...$el.querySelectorAll(selector)]
                // All non-disabled elements...
                .filter(el => ! el.hasAttribute('disabled'))
        },
        firstFocusable() { return this.focusables()[0] },
        lastFocusable() { return this.focusables().slice(-1)[0] },
        nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() },
        prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() },
        nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) },
        prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 },
        autofocus() { let focusable = $el.querySelector('[autofocus]'); if (focusable) focusable.focus() },
    }"
     x-init="$watch('show', value => value && setTimeout(autofocus, 50))"
     x-on:close.stop="show = false"
     x-on:keydown.escape.window="show = false"
     x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
     x-on:keydown.shift.tab.prevent="prevFocusable().focus()"
     x-show="show"
     id="{{ $id }}"
     {{ $attributes->merge(['class' => 'fixed inset-0 overflow-hidden z-10'])->only('class') }}
{{--     class="fixed top-0 inset-x-0 px-4 pt-6 z-50 sm:px-0 sm:flex sm:items-top sm:justify-center"--}}
     style="display: none;"
>
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute inset-0 bg-gray-500 bg-opacity-50 transition-opacity" aria-hidden="true"  x-show="show" x-on:click="show = false"></div>
        <section class="absolute inset-y-0 right-0 pl-10 max-w-full flex" aria-labelledby="slide-over-heading">
            <!--
              Slide-over panel, show/hide based on slide-over state.

              Entering: "transform transition ease-in-out duration-500 sm:duration-700"
                From: "translate-x-full"
                To: "translate-x-0"
              Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
                From: "translate-x-0"
                To: "translate-x-full"
            -->
            <div class="w-screen max-w-md">
                <div class="h-full flex flex-col py-6 bg-white shadow-xl">
                    <div class="px-4 sm:px-6">
                        <div class="flex items-start justify-between">
                            <h2 id="slide-over-heading" class="text-lg font-medium text-gray-900">
                                {{ $header ?? '' }}
                            </h2>
                            <div class="ml-3 h-7 flex items-center" x-show="show" x-on:click="show = false">
                                <x-common.button.secondary class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <span class="sr-only">Close panel</span>
                                    <!-- Heroicon name: x -->
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </x-common.button.secondary>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 relative flex-1 px-4 sm:px-6 overflow-y-scroll">
                        <!-- Replace with your content -->
                        <div class="absolute inset-0 px-4 sm:px-6">
                            {{ $slot }}
                        </div>
                        <!-- /End replace -->
                    </div>
                    @unless($hidefooter)
                        <div class="flex-shrink-0 px-4 py-4 flex justify-end bg-white z-20">
                            <x-common.button.secondary x-show="show" x-on:click="show = false">Cancel</x-common.button.secondary>
                            <x-common.button.primary type="submit">Save</x-common.button.primary>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </div>
</div>
