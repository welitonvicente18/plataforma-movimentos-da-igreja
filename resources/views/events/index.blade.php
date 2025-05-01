<x-app-layout>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="flex flex-row gap-4 p-2">
                    <div class="p-2 w-70 flex-1 text-gray-900 dark:text-gray-100 text-left">
                        <i class="bi bi-collection-fill text-gray-700 mr-2 dark:text-gray-100"></i> Lista de Encontros
                    </div>
                    <div class="p-2 w-100 flex-1  text-gray-900 dark:text-gray-100 text-right">
                        <a href="{{ route('events.create') }}"
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            <i class="bi bi-collection-fill text-gray-700 mr-2 dark:text-gray-100"></i> Inserir Encontro
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('events.index') }}" method="GET">
                <input type="hidden" name="search" value="true"/>
                <div class="p-3 flex flex-row gap-4 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                    <div class="flex-1 ">
                        <x-input-label for="name" :value="__('Nome')"/>
                        <x-text-input id="name" name="name" type="text" class="mt-1 w-full"
                                      value="{{ request('name') }}" autocomplete="name"/>
                    </div>
                    <div class="flex-1 ">
                        <x-input-label for="date_event" :value="__('Ano do Encontro')"/>
                        <x-select-ano id="date_event" name="date_event" anoInicio="2000"
                                      anoFim="{{ date('Y') }}" class="mt-1 w-full"
                                      :selected=" request('date_event') ?? ''"/>
                    </div>

                    <div class="flex flex-row text-center p-4">
                        <x-primary-button class="ms-3">
                            Pesquisar
                        </x-primary-button>
                        <span
                            class="ms-3 pointer inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'"
                            onclick="window.location.href='{{ route('events.index') }}'">
                            Limpar
                        </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="mt-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                    <tr class="bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                        <th scope="col" class="px-2 py-3 text-left">Nome</th>
                        <th scope="col" class="px-2 py-3 text-center">Data</th>
                        <th scope="col" class="px-2 py-3 text-center">Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($events as $event)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-2 py-2 text-left">{{$event->name}}
                            </td>
                            <td class="px-2 py-2 text-center">{{$event->date_event->format('d/m/Y')}}</td>
                            <td class="px-2 py-2 text-center">
                                <a href="{{ route('events.edit', $event->id) }}">
                                    <i class="bi bi-pencil-square fa-2x"></i>
                                </a>
                                <i class="bi bi-x-circle fa-2x text-[#f53003]"></i>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-2 overflow-x-auto shadow-md sm:rounded-lg">
                {{ $events->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
