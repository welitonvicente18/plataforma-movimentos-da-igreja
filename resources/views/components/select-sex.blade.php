@props(['disabled' => false, 'selected' => ''])
<select @disabled($disabled)  {{ $attributes->merge(['class' => 'block mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 shadow-sm focus:ring focus:ring-indigo-200 dark:bg-gray-900 dark:text-gray-300'])}}>
    <option value="">Selecione</option>
    <option value="M" @selected($selected == 'M') >Masculino</option>
    <option value="F" @selected($selected == 'F')>Feminino</option>
</select>
