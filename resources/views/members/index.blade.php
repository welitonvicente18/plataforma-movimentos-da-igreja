<x-app-layout>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="flex flex-row gap-4 p-2">
                    <div class="p-2 w-70 flex-1 text-gray-900 dark:text-gray-100 text-left">
                        <i class="bi bi-people-fill text-gray-700 mr-2 dark:text-gray-100"></i> Lista de Integrantes
                    </div>
                    <div class="p-2 w-100 flex-1 text-gray-900 dark:text-gray-100 text-right ">
                        <x-danger-button x-data=""
                                         x-on:click.prevent="$dispatch('open-modal', 'import-integrantes')">
                            <i class="bi bi-file-earmark-arrow-up-fill text-gray-700 mr-2 dark:text-gray-100"></i>
                            Importar Excel
                        </x-danger-button>
                        <x-gray-button>
                            <a href="{{ route('members.create') }}"
                               class="">
                                <i class="bi bi-people-fill text-gray-700 mr-2 dark:text-gray-100"></i> Inserir
                                Integrante
                            </a>
                        </x-gray-button>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('members.index') }}" method="GET">
                <input type="hidden" name="search" value="true"/>
                <div class="p-3 flex flex-row gap-4 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                    <div class="flex-1 ">
                        <x-input-label for="name" :value="__('Nome')"/>
                        <x-text-input id="name" name="name" type="text" class="mt-1 w-full"
                                      value="{{ request('name') }}" autocomplete="name"/>

                    </div>
                    <div class="flex-1">
                        <x-input-label for="telephone" :value="__('Telefone')"/>
                        <x-text-input id="telephone" name="telephone" type="text" class="mt-1 w-full"
                                      value="{{ request('telephone') }}" autocomplete="Tipo"/>
                    </div>
                    <div class="flex-1">
                        <x-input-label for="type" :value="__('Tipo de Integrante')"/>
                        <x-select-tipo id="type" name="type" :selected="request('tipo') ?? ''"/>
                    </div>
                    <div class="flex-1">
                        <x-input-label for="status" :value="__('Situação')"/>
                        <x-select-status id="status" name="status" class="w-full" :selected="request('status') ?? ''"/>
                    </div>
                    <div class="flex flex-row text-center p-4">
                        <x-gray-button class="ms-3">
                            Pesquisar
                        </x-gray-button>
                        <x-gray-button class="ms-3">
                        <span onclick="window.location.href='{{ route('members.index') }}'">
                            Limpar
                        </span>
                        </x-gray-button>
                    </div>
                </div>
            </form>
        </div>
        <div class="mt-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                        <th scope="col" class="px-2 py-3 text-center">Situação</th>
                        <th scope="col" class="px-2 py-3 text-left">Nome</th>
                        <th scope="col" class="px-2 py-3 text-center">Telefone</th>
                        <th scope="col" class="px-2 py-3 text-center">Tipo de Integrante</th>
                        <th scope="col" class="px-2 py-3 text-center">Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($members as $member)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-2 py-2 text-center">{{$member->type->name}}</td>
                            <td class="px-2 py-2 text-left">
                                @if($member->type->value == 1)
                                    {{-- jovem --}}
                                    {{$member->name}}
                                    @if($member->spouse)
                                        - ({{$member->surname ?? '' }})
                                    @endif
                                @else
                                    Tios {{$member->name}}
                                    @if($member->spouse)
                                        e {{$member->spouse}}
                                    @endif
                                @endif

                            </td>
                            <td class="px-2 py-2 text-center">{{$member->telephone}}</td>
                            <td class="px-2 py-2 text-center"> {{$member->status->name}}</td>
                            <td class="px-2 py-2 text-center">
                                <a href="{{ route('members.edit', $member->id) }}">
                                    <i class="bi bi-pencil-square fa-2x"></i>
                                </a>
                                <form action="{{ route('members.delete', $member->id) }}" method="POST"
                                      onsubmit="return confirm('Tem certeza que deseja excluir o integrante?')"
                                      style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background: none; border: none; padding: 0;">
                                        <i class="bi bi-x-circle fa-2x text-[#f53003]"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-2 overflow-x-auto shadow-md sm:rounded-lg">
                {{ $members->links() }}
            </div>
        </div>
    </div>
</x-app-layout>


<x-modal name="import-integrantes" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <form method="post" action="{{ route('members.import') }}" class="p-6" enctype="multipart/form-data">
        @csrf
        <h2 class="text-center font-medium text-gray-900 dark:text-gray-100">
            Importação de excel de Integrantes
        </h2>
        <p class="mt-1 text-sm text-center text-gray-600 dark:text-gray-400">
            lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatibus.
        </p>
        <div class="p-4">
            <x-input-label for="arquivo" value="Arquivo Excel" class="w-full" required/>
            <x-text-input
                id="arquivo"
                name="arquivo"
                type="file"
                class="w-full"
                accept=".xls, .xlsx"
                required
                placeholder="Arquivo Excel"
            />
            <x-input-error :messages="$errors->userDeletion->get('arquivo')" class="mt-2"/>
        </div>
        <div class="mt-6 flex justify-end">
            <x-success-button class="ms-3" type="submit">
                {{ __('Enviar') }}
            </x-success-button>
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancelar') }}
            </x-secondary-button>
        </div>
    </form>
</x-modal>
