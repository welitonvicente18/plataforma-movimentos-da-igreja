@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
    <span class="text-[#ff0000]">{{ $attributes->get('required') ? '*' : '' }}</span>
</label>
