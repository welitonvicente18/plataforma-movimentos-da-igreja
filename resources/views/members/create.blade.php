<x-app-layout>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="flex flex-row gap-4 p-2">
                    <div class="p-2 w-70 flex-1 text-gray-900 dark:text-gray-100 text-left">
                        <i class="bi bi-people-fill text-gray-700 mr-2 dark:text-gray-100"></i> Inserir de Integrante
                    </div>
                    <div class="p-2 w-70 flex-1 text-gray-900 dark:text-gray-100 text-right">
                        <a href="{{ route('members.index') }}"
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            <i class="bi bi-arrow-left-short text-gray-700 mr-2 dark:text-gray-100"></i> Voltar
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-1 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 rounded shadow">
                <div class=" text-right">
                    <span class="text-[#ff0000]">* Campos Obrigatórios</span>
                </div>

                <form
                    action="{{ isset($member) ? route('members.update', $member->id) : route('members.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($member))
                        @method('PUT') <!-- Usando PUT para atualizar -->
                    @endif
                    <div class="flex gap-4 p-2">
                        <div class="p-2 flex-1">
                            <div class="flex gap-4 flex-row">
                                <div class="flex-1">
                                    <x-input-label for="type" :value="__('Tipo de Integrante')" required/>
                                    <x-select-tipo id="type" name="type"
                                                   :selected="old('type',$member->type->value ?? '')"
                                                   required onchange="hideTios()"/>
                                    <x-input-error :messages="$errors->get('type')" class="mt-2"/>
                                </div>
                                <div class="flex-1">
                                    <x-input-label for="status" :value="__('Situação')" required/>
                                    <x-select-status id="status" name="status" class="w-full"
                                                     :selected="old('status',$member->status->value ?? '')"
                                                     required/>
                                    <x-input-error :messages="$errors->get('status')" class="mt-2"/>
                                </div>
                            </div>
                            <div class="flex gap-4 flex-row hide-tios">
                                <div class="py-1 flex-1">
                                    <x-input-label for="event" :value="__('Encontro')" required/>
                                    <x-select-event id="event" name="event" class="w-full"
                                                    :events="$events"
                                                    :selected="old('event',$member->event ?? '')" required/>
                                    <x-input-error :messages="$errors->get('event')" class="mt-2"/>
                                </div>
                                <div class="py-1 flex-1">
                                    <x-input-label for="circle" :value="__('Circulo')"/>
                                    <x-select-circle id="circle" name="circle" class="w-full"
                                                     :selected="old('circle',$member->circle ?? '')"/>
                                    <x-input-error :messages="$errors->get('circle')" class="mt-2"/>
                                </div>
                            </div>
                            <div class="py-1 flex-1">
                                <x-input-label for="name" :value="__('Nome')" required/>
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                              value="{{ old('name',$member->name ??'') }}" required autofocus/>
                                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                            </div>
                            <div class="py-1 flex-1 hide-jovem">
                                <x-input-label for="spouse" :value="__('Cônjuge')" />
                                <x-text-input id="spouse" class="block mt-1 w-full" type="text" name="spouse"
                                              value="{{ old('spouse',$member->spouse ??'') }}" autofocus/>
                                <x-input-error :messages="$errors->get('spouse')" class="mt-2"/>
                            </div>
                        </div>

                        <div class="p-2 flex flex-col items-center text-center">
                            <div>
                                <x-img
                                    src="{{ isset($member->photo) ? asset('/storage/members/photo/' . $member->photo ) : asset('storage/icones/avatar_sem_imagem.jpg') }}"
                                    width="155px" height="230px" class="rounded-lg" accept="jpeg,png,jpg"/>
                            </div>
                            <div class="mt-4 w-full max-w-xs">
                                <x-text-input id="photo" class="block mt-1 w-full" type="file" name="photo"
                                              value="{{ old('photo', $member->photo ?? '') }}"/>
                                <x-input-error :messages="$errors->get('photo')" class="mt-2"/>
                            </div>
                        </div>
                    </div>

                    <div class="flex w-full p-2">
                        <div class="p-2 hide-tios">
                            <x-input-label for="sex" :value="__('Sexo')" required/>
                            <x-select-sex id="sex" name="sex" class="w-full"
                                          :selected="old('sex',$member->sex ?? '')"
                                          required/>
                            <x-input-error :messages="$errors->get('sex')" class="mt-2"/>
                        </div>
                        <div class="p-2">
                            <x-input-label for="telephone" :value="__('Telefone')"/>
                            <x-text-input id="telephone" class="block mt-1 w-full telephone" type="text" name="telephone"
                                          value="{{ old('telephone',$member->telephone ??'') }}" required/>
                            <x-input-error :messages="$errors->get('telephone')" class="mt-2"/>
                        </div>
                        <div class="p-2">
                            <x-input-label for="birth_date" :value="__('Data de Nascimento')"/>
                            <x-text-input id="birth_date" class="block mt-1 w-full" type="date"
                                          name="birth_date"
                                          value="{{ old('birth_date',$member->birth_date ??'') }}"
                                          required/>
                            <x-input-error :messages="$errors->get('birth_date')" class="mt-2"/>
                        </div>
                    </div>
                    <div class="flex p-2 hide-tios">
                        <div class="p-2 flex-1">
                            <x-input-label for="batizado" :value="__('Batizado')"/>
                            <x-select-yes-no id="batizado" class="block mt-1 w-full" type="text" name="batizado"
                                             :selected="old('batizado',$member->batizado ?? '')"/>
                            <x-input-error :messages="$errors->get('batizado')" class="mt-2"/>
                        </div>
                        <div class="p-2 flex-1">
                            <x-input-label for="crismado" :value="__('Crismado')"/>
                            <x-select-yes-no id="crismado" class="block mt-1 w-full" type="text" name="crismado"
                                             :selected="old('crismado',$member->crismado ?? '')"/>
                            <x-input-error :messages="$errors->get('crismado')" class="mt-2"/>
                        </div>
                        <div class="p-2 flex-1">
                        </div>
                    </div>
                    <div class="flex p-2 ">
                        <div class="p-2 flex-1">

                            <x-input-label for="UF" :value="__('UF')"/>
                            <x-select-uf id="uf" class="block mt-1 w-full" type="text" name="uf"
                                         :selected="old('uf',$member->uf ?? '')" required/>
                            <x-input-error :messages="$errors->get('uf')" class="mt-2"/>
                        </div>
                        <div class="p-2 flex-1">
                            <x-input-label for="city" :value="__('Cidade')"/>
                            <x-text-input id="city" class="block mt-1 w-full" type="text" name="city"
                                          value="{{ old('city',$member->city ??'') }}" required/>
                            <x-input-error :messages="$errors->get('city')" class="mt-2"/>
                        </div>
                        <div class="p-2 flex-1">
                            <x-input-label for="address" :value="__('Endereço')"/>
                            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address"
                                          value="{{ old('address',$member->address ??'') }}" required/>
                            <x-input-error :messages="$errors->get('address')" class="mt-2"/>
                        </div>
                    </div>
                    <div class="px-3">
                        <x-input-label for="observation" :value="__('Observação')"/>
                        <x-textarea name="observation"
                                    class="w-full">{{old('observation',$member->observation ?? '')}}</x-textarea>
                        <x-input-error :messages="$errors->get('observation')" class="mt-2"/>
                    </div>

                    <div class="mt-3 flex flew-row gap-4 px-2">
                        <div class="flex-1">
                            <i class="bi bi-people-fill text-gray-700 mr-2 dark:text-gray-100"></i>
                            Equipes que participei
                        </div>
                    </div>
                    <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
                    <div class="relative overflow-x-auto sm:rounded-lg">
                        <table class="w-full text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <thead>
                            <tr class="bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                <th class="text-left">
                                    Encontro
                                </th>
                                @foreach($teams as $team)
                                    <th class="text-center"> {{$team->name}}</th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                if(isset($member)){
                                 $temaChecked = json_decode($member->team, true) ?? [];
                                }
                            @endphp
                            @foreach($events as $idEncontro => $event)
                                <tr>
                                    <td>
                                        <i class="bi bi-arrow-right-short"></i> {{ $event->name }}
                                    </td>
                                    @foreach($teams as $team)
                                        <td class="text-center">
                                            <x-text-input type="checkbox"
                                                          name="team[{{ $event->id }}][{{ $team->id }}]"
                                                          :checked="isset($temaChecked[$event->id]) && array_key_exists($team->id, $temaChecked[$event->id])"
                                                          value="1"
                                            />
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class=" text-center p-4">
                        <x-primary-button class="ms-3">
                            Salvar
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @vite('resources/js/member/create.js')

</x-app-layout>
