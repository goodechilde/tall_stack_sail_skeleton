@props([
    'leadingAddOn' => false,
])

<div class="flex rounded-md shadow-sm">
    @if($leadingAddOn)
        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
            {{ $leadingAddOn }}
        </span>
    @endif

    <input
        {{ $attributes }}
           type="text"
           class="{{ $leadingAddOn ? ' rounded-none rounded-r-md ' : 'rounded-md' }} flex-1 form-input block w-full transition duration-150 ease-in-out border-gray-300" >
</div>
