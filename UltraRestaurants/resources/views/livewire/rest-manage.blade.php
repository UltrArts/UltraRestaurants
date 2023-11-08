<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Restaurante') }}
            </h2>
        </x-slot>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                   
                    {{-- <x-restaurant-form /> --}}
                    @if ($is_rest)
                        @livewire('rest-admin')
                    @else
                        @if(empty($curr_res))
                        <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                            <x-application-logo class="block h-12 w-auto" />
                    
                            <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white">
                                Deseja Juntar O Teu Restaurante à Nossa Plataforma?
                            </h1>
                    
                            <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
                            Prencha o formulário com os dados do teu Restaurante e receba as classificações credíveis de Usuários do mundo inteiro, e assim eleve o teu restaurante a altos patamares.
                            </p>
                        </div>
                        @endif

                        @livewire('restaurant-form')
                    @endif

                </div>
            </div>
        </div>


    </x-app-layout>

</div>
