@props(['disabled' => false, 'events' => '', 'selected' => ''])
<select @disabled($disabled)  {{ $attributes->merge(['class' => 'block mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 shadow-sm focus:ring focus:ring-indigo-200 dark:bg-gray-900 dark:text-gray-300'])}}>
    <option value="">Escolha</option>
    @foreach($events as $id => $event)
        <option
                value="{{ $event->id }}" @selected($selected == $event->id )>{{ $event->name }}</option>
    @endforeach
</select>
