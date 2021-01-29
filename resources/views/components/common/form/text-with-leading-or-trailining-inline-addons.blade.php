@props(['paddingLeft' => false, 'paddingRight' => false])
<div>
    <input
        {{ $attributes }}
        type="text"
        class="{{ $paddingLeft ? ' pl-' . $paddingLeft : null }}{{ $paddingRight ? ' pr-' . $paddingRight : null }} block w-full form-input transition duration-150 ease-in-out border-gray-300 rounded-md" >
</div>
