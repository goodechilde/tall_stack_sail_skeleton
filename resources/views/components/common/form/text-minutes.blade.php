<div class="relative rounded-md shadow-sm">
    <x-common.form.text-with-leading-or-trailining-inline-addons
        {{ $attributes }}
        padding-right="12"
    />
    <div class="
        absolute
        inset-y-0
        right-0
        pr-3
        flex
        items-center
        pointer-events-none
    ">
        <span class="text-gray-500 sm:text-sm" id="price-currency">
            mins
        </span>
    </div>
</div>
