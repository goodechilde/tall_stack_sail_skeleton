@props([
    'formAction' => 'save',
])
<div class="space-y-6">
    <form wire:submit.prevent="{{ $formAction }}">
        <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">{{ $header ?? '' }}</h3>
                   <p class="mt-1 text-sm text-gray-500">{{ $body ?? '' }}</p>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    {{ $slot }}
                </div>
            </div>
        </div>
        <div class="flex justify-end pt-3">
            {{ $buttons ?? '' }}
        </div>
    </form>
</div>
