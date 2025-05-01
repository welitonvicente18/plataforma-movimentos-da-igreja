<x-app-layout>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="flex flex-row gap-4 p-2">
                    <div class="p-2 w-70 flex-1 text-gray-900 dark:text-gray-100 text-left">
                        <i class="bi bi-collection-fill text-gray-700 mr-2 dark:text-gray-100"></i> Inserir de Encontros
                    </div>
                    <div class="p-2 w-70 flex-1 text-gray-900 dark:text-gray-100 text-right">
                        <a href="{{ route('events.index') }}"
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
                <form action="{{ isset($event->id) ? route('events.update', $event->id) : route('events.store') }}" method="POST">
                    @csrf
                    @if (isset($event->id))
                        @method('PUT')
                    @endif
                    <div class="flex p-2">
                        <div class="px-2 flex-1">
                            <x-input-label for="name" :value="__('Nome')" required/>
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                          value="{{ old('name', $event->name ?? '') }}" required autofocus/>
                            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                        </div>
                    </div>

                    <div class="flex p-2">
                        <div class="px-2 flex-2">
                            <x-input-label for="date_event" :value="__('Data do Encontro')" required/>
                            <x-text-input id="date_event" class="block mt-1 w-full" type="date"
                                          name="date_event"
                                          value="{{ isset($event->date_event) ? $event->date_event->format('Y-m-d') : '' }}"
                                          required/>
                            <x-input-error :messages="$errors->get('date_event')" class="mt-2"/>
                        </div>
                    </div>
                    <div class="flex p-2 ">
                        <div class="p-2 flex-1">
                            <x-input-label for="UF" :value="__('UF')"/>
                            <x-select-uf id="uf" class="block mt-1 w-full" type="text" name="uf"
                                         :selected="old('uf', $event->uf ?? '')" required/>
                            <x-input-error :messages="$errors->get('uf')" class="mt-2"/>
                        </div>
                        <div class="p-2 flex-1">
                            <x-input-label for="city" :value="__('Cidade')"/>
                            <x-text-input id="city" class="block mt-1 w-full" type="text" name="city"
                                          value="{{ old('city', $event->city ??'') }}"/>
                            <x-input-error :messages="$errors->get('city')" class="mt-2"/>
                        </div>
                        <div class="p-2 flex-1">
                            <x-input-label for="address" :value="__('Endereço')"/>
                            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address"
                                          value="{{ old('address', $event->address ??'') }}"/>
                            <x-input-error :messages="$errors->get('address')" class="mt-2"/>
                        </div>
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
</x-app-layout>
