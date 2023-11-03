<div>    
    <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
        <x-application-logo class="block h-12 w-auto" />

        <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white">
            Deseja Juntar O Teu Restaurante à Nossa Plataforma?
        </h1>

        <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
        Prencha o formulário com os dados do teu Restaurante e receba as classificações credíveis de Usuários do mundo inteiro, e assim eleve o teu restaurante a altos patamares.
        </p>
    </div>

    <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid  gap-6 lg:gap-8 p-6 lg:p-8">
        <div>
            <div class="flex items-center MB-2">
                <i class="fa fa-pen text-white"></i>
                <h2 class="ml-3 text-xl font-semibold text-gray-900 dark:text-white">
                    <a href="https://laravel.com/docs">Registar Restaurante</a>
                </h2>
            </div>
            

            <form class="card text-white bg-dark mb-3" style="max-width: 100%;">
                <div class="card-header text-muted">Preencha o formulário devidamente</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-2">
                                <x-label for="name" value="{{ __('Nome do Restaurante') }}" />
                                <x-input id="email" class="block mt-1 w-full" type="text"  :value="old('name')"  />
                            </div>
                            <div class="mb-1">
                                <x-label for="name" value="{{ __('Tipo de cozinha') }}" />
                                <select class="mt-2 form-control border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                  </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="mb-2 col">
                                    <x-label for="name" value="{{ __('Intervalo de Preçario') }}" />
                                    <x-input  wire:modal="min" class="block mt-1 w-full" type="number"  :value="old('min')"  placeholder="Valor mínimo" />
                                </div>
                                <div class="mb-1 col">
                                    <x-label for="name" class="invisible" value="{{ __('a') }}" />
                                    <x-input  wire:modal="min" class="block mt-1 w-full" type="number"  :value="old('max')"  placeholder="Valor máximo" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-2 col">
                                    <x-label for="name" value="{{ __('Horários de Abertura') }}" />
                                    <x-input wire:modal="open" class="block mt-1 w-full" type="time"  :value="old('open')"  />
                                </div>
                                <div class="mb-1 col">
                                    <x-label for="name" class="" value="{{ __('Horário de Encerramento') }}" />
                                    <x-input  wire:modal="close" class="block mt-1 w-full" type="time"  :value="old('close')"  placeholder="Valor máximo" />
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="btn btn-secondary">Registar </div>
                </div>
            </form>
            

        </div>

    </div>
</div>
