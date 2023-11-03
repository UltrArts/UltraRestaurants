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
                    @livewire('restaurant-form')

                </div>
            </div>
        </div>


    </x-app-layout>

</div>
