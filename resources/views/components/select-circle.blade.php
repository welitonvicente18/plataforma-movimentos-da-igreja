@props(['disabled' => false, 'selected' => ''])
<select @disabled($disabled)  {{ $attributes->merge(['class' => 'block mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 shadow-sm focus:ring focus:ring-indigo-200 dark:bg-gray-900 dark:text-gray-300'])}}>
    <option value="">Escolha</option>
    <option value="Amarelo" @selected($selected == 'Amarelo') >Amarelo</option>
    <option value="Azul" @selected($selected == 'Azul') >Azul</option>
    <option value="Rosa" @selected($selected == 'Rosa') >Rosa</option>
    <option value="Verde" @selected($selected == 'Verde')>Verde</option>
    <option value="Vermelho" @selected($selected == 'Vermelho')>Vermelho</option>
</select>
