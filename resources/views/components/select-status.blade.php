@props(['disabled' => false, 'selected' => ''])
<select @disabled($disabled)  {{ $attributes->merge(['class' => 'block mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 shadow-sm focus:ring focus:ring-indigo-200 dark:bg-gray-900 dark:text-gray-300'])}}>
    <option value="" >Escolha</option>
    <option value="1" {{ $selected == 1 ? 'selected': ''}} >Ativo</option>
    <option value="2" {{ $selected == 2 ? 'selected': ''}} >Inativo</option>
    <option value="3" {{ $selected == 3 ? 'selected': ''}} >Afastado</option>
    <option value="4" {{ $selected == 4 ? 'selected': ''}} >Falecido</option>
    <option value="5" {{ $selected == 5 ? 'selected': ''}} >Desligado</option>
    <option value="6" {{ $selected == 6 ? 'selected': ''}} >Transferido</option>
</select>
