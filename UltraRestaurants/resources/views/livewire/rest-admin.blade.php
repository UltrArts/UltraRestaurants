<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

    <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
        <x-application-logo class="block h-12 w-auto" />
    
        <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white">
            Faça a gestão do teu restaurante aqui
        </h1>
    
        <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
            Acompanhe a lista de restaurantes logo a seguir.
        </p>

        <div>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button wire:click="setTab('menu')" class="nav-link {{$active_tab == 'menu'? 'active' : ''}}" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Menú</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button wire:click="setTab('profile')" class="nav-link {{$active_tab == 'profile'? 'active' : ''}}" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Perfil</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button wire:click="setTab('buking')" class="nav-link {{$active_tab == 'buking'? 'active' : ''}}" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Pedidos</button>
                </li>
              </ul>
        </div>
        
    </div>
    
    <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 row p-6 lg:p-8">

        
        @if($active_tab == 'menu')
            @livewire('menu')
        @elseif($active_tab == 'profile')
            @livewire('restaurant-form')
        @else

        @endif












         


    
    </div>
    
    
</div>

