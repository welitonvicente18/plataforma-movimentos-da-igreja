<x-app-layout>

    <x-slot name="header">
        <h2 class="px-2 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <i class="bi bi-collection-fill text-gray-700 mr-2 dark:text-gray-100"></i> Relatórios
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="mt-2 mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('members.report') }}" method="GET">
                <input type="hidden" name="search" value="true"/>
                <div class="p-3 flex flex-row gap-4 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                    <div class="flex-1">
                        <x-input-label for="name" :value="__('Nome')"/>
                        <x-text-input id="name" name="name" type="text" class="mt-1 w-full"
                                      value="{{ request('name') }}" autocomplete="Nome"/>

                    </div>
                    <div class="flex-1">
                        <x-input-label for="telephone" :value="__('Telefone')"/>
                        <x-text-input id="telephone" name="telephone" type="text" class="mt-1 w-full"
                                      value="{{ request('telephone') }}" autocomplete="Tipo"/>
                    </div>
                    <div class="flex-1">
                        <x-input-label for="type" :value="__('Tipo de Integrante')"/>
                        <x-select-tipo id="type" name="type" :selected="request('type') ?? ''"/>
                    </div>
                    <div class="flex-1">
                        <x-input-label for="status" :value="__('Situação')"/>
                        <x-select-status id="status" name="status" class="w-full" :selected="request('status') ?? ''"/>
                    </div>
                    <div class="flex flex-row text-center p-4">
                        <x-primary-button class="ms-3">
                            Pesquisar
                        </x-primary-button>
                        <span
                            class="ms-3 pointer inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'"
                            onclick="window.location.href='{{ route('members.report') }}'">
                            Limpar
                        </span>
                    </div>
                </div>
            </form>
        </div>

        <div class="mt-2 mx-auto sm:px-6 lg:px-8">
            @if (!empty($members))
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr class="bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                            <th scope="col" class="px-2 py-3 text-center">Tipo de Integrante</th>
                            <th scope="col" class="px-2 py-3 text-center">Situação</th>
                            <th scope="col" class="px-2 py-3 text-left">Nome</th>
                            <th scope="col" class="px-2 py-3 text-left">Apelido</th>
                            <th scope="col" class="px-2 py-3 text-center">Sexo</th>
                            <th scope="col" class="px-2 py-3 text-center">Telefone</th>
                            <th scope="col" class="px-2 py-3 text-center">Data de Nascimento</th>
                            <th scope="col" class="px-2 py-3 text-center">Batizado</th>
                            <th scope="col" class="px-2 py-3 text-center">Crisma</th>
                            <th scope="col" class="px-2 py-3 text-center">UF</th>
                            <th scope="col" class="px-2 py-3 text-center">Cidade</th>
                            <th scope="col" class="px-2 py-3 text-center">Endereço</th>
                            <th scope="col" class="px-2 py-3 text-center">Observação</th>
                            <th scope="col" class="px-2 py-3 text-center">Equipes</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($members as $member)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-2 py-2 text-center">{{$member->type->name ?? ''}}</td>
                                <td class="px-2 py-2 text-center"> {{$member->status->name ?? ''}}</td>
                                <td class="px-2 py-2 text-left">{{$member->name ?? ''}}</td>
                                <td class="px-2 py-2 text-left">{{$member->surname ?? ''}}</td>
                                <td class="px-2 py-2 text-center">{{$member->sex ?? ''}}</td>
                                <td class="px-2 py-2 text-center">{{$member->telephone ?? ''}}</td>
                                <td class="px-2 py-2 text-center">{{$member->birth_date ?? ''}}</td>
                                <td class="px-2 py-2 text-center">{{$member->batizado->name ?? ''}}</td>
                                <td class="px-2 py-2 text-center">{{$member->crismado->name ?? ''}}</td>
                                <td class="px-2 py-2 text-center">{{$member->uf ?? ''}}</td>
                                <td class="px-2 py-2 text-center">{{$member->city ?? ''}}</td>
                                <td class="px-2 py-2 text-center">{{$member->address ?? ''}}</td>
                                <td class="px-2 py-2 text-center">{{$member->observation ?? ''}}</td>
                                <td class="px-2 py-2 text-center">{{$member->team ?? ''}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="mx-auto">
                    <div class="p-2 bg-white text-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                        Utilize os campos de pesquisa.
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
