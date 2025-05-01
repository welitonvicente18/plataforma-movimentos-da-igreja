@props(['value', 'src' => '' , 'alt' => '', 'width' => 'auto', 'height' => 'auto'])

<img src="{{$src}}"
     width="{{$width}}"
     height="{{$height}}"
     alt="{{$alt}}" {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 dark:text-gray-300']) }} />
