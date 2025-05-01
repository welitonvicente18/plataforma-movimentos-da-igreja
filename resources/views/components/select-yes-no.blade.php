@props(['disabled' => false, 'selected' => ''])
<select @disabled($disabled)  {{ $attributes->merge(['class' => 'block mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 shadow-sm focus:ring focus:ring-indigo-200 dark:bg-gray-900 dark:text-gray-300'])}}>
    <option value="">Escolha</option>
    <option value="1" @selected($selected == '1')>Sim</option>
    <option value="2" @selected($selected == '2')>Não</option>
</select>
