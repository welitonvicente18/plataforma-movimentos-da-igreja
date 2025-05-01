@props(['disabled' => false, 'selected' => ''])
<select @disabled($disabled)  {{ $attributes->merge(['class' => 'block mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 shadow-sm focus:ring focus:ring-indigo-200 dark:bg-gray-900 dark:text-gray-300'])}}>
    <option value="">Escolha</option>
    <option value="AC" {{ $selected == 'AC' ? 'selected': ''}}>AC</option>
    <option value="AL" {{ $selected == 'AL' ? 'selected': ''}}>AL</option>
    <option value="AP" {{ $selected == 'AP' ? 'selected': ''}}>AP</option>
    <option value="AM" {{ $selected == 'AM' ? 'selected': ''}}>AM</option>
    <option value="BA" {{ $selected == 'BA' ? 'selected': ''}}>BA</option>
    <option value="CE" {{ $selected == 'CE' ? 'selected': ''}}>CE</option>
    <option value="DF" {{ $selected == 'DF' ? 'selected': ''}}>DF</option>
    <option value="ES" {{ $selected == 'ES' ? 'selected': ''}}>ES</option>
    <option value="GO" {{ $selected == 'GO' ? 'selected': ''}}>GO</option>
    <option value="MA" {{ $selected == 'MA' ? 'selected': ''}}>MA</option>
    <option value="MT" {{ $selected == 'MT' ? 'selected': ''}}>MT</option>
    <option value="MS" {{ $selected == 'MS' ? 'selected': ''}}>MS</option>
    <option value="MG" {{ $selected == 'MG' ? 'selected': ''}}>MG</option>
    <option value="PA" {{ $selected == 'PA' ? 'selected': ''}}>PA</option>
    <option value="PB" {{ $selected == 'PB' ? 'selected': ''}}>PB</option>
    <option value="PR" {{ $selected == 'PR' ? 'selected': ''}}>PR</option>
    <option value="PE" {{ $selected == 'PE' ? 'selected': ''}}>PE</option>
    <option value="PI" {{ $selected == 'PI' ? 'selected': ''}}>PI</option>
    <option value="RJ" {{ $selected == 'RJ' ? 'selected': ''}}>RJ</option>
    <option value="RN" {{ $selected == 'RN' ? 'selected': ''}}>RN</option>
    <option value="RS" {{ $selected == 'RS' ? 'selected': ''}}>RS</option>
    <option value="RO" {{ $selected == 'RO' ? 'selected': ''}}>RO</option>
    <option value="RR" {{ $selected == 'RR' ? 'selected': ''}}>RR</option>
    <option value="SC" {{ $selected == 'SC' ? 'selected': ''}}>SC</option>
    <option value="SP" {{ $selected == 'SP' ? 'selected': ''}}>SP</option>
    <option value="SE" {{ $selected == 'SE' ? 'selected': ''}}>SE</option>
    <option value="TO" {{ $selected == 'TO' ? 'selected': ''}}>TO</option>
</select>
