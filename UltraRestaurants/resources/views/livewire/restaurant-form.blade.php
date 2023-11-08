<div>    

    <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid  gap-6 lg:gap-8 p-6 lg:p-8">
        <div>
            <div class="flex items-center mb-2">
                @if (empty($this->curr_res))
                    <i class="fa fa-pen text-white"></i>
                    <h2 class="ml-3 text-xl font-semibold text-gray-900 dark:text-white">
                        <a href="javascript:void(0)">Registar Restaurante</a>
                    </h2>
                @else
                    <i class="fa fa-city text-white"></i>
                    <h2 class="ml-3 text-xl font-semibold text-gray-900 dark:text-white">
                        <a href="javascript:void(0)">Perfil do Restaurante</a>
                    </h2>
                @endif
            </div>
            
            <form  wire:submit.prevent="{{empty($this->curr_res) ? 'resRegister' : 'resUpdate'}}" class="card text-white bg-dark mb-3" style="max-width: 100%;">
                @csrf
                @if (empty($this->curr_res))
                    <div class="card-header text-muted">Preencha o formulário devidamente</div>
                @else
                    <div class="card-header text-muted">Faça a alteração dos dados da sua empresa sempre que precisar</div>
                @endif
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-2">
                                <x-label for="name" value="{{ __('Nome do Restaurante') }}" />
                                <x-input wire:model="name" class="block mt-1 w-full form-control {{ $errors->has('name') ? ' is-invalid' : ''}} " type="text"  :value="old('name')"  />

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" style="display: country;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-1">
                                <x-label for="k_selected" value="{{ __('Tipo de cozinha') }}" />
                                <select wire:model="k_selected" class="mt-2 form-control border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm  form-control{{ $errors->has('k_selected') ? ' is-invalid' : ''}}" id="exampleFormControlSelect1">
                                    <option selected value="">-- SELECIONE O TIPO DE COZINHA --</option>
                                    @foreach($kitchen as $k)
                                        <option value="{{$k->id}}">{{$k->desc}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('k_selected'))
                                <span class="invalid-feedback" style="display: country;" role="alert">
                                    <strong>{{ $errors->first('k_selected') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="mb-2 col">
                                    <x-label for="min" value="{{ __('Intervalo de Preçario') }}" />
                                    <x-input  wire:model="min" class="block mt-1 w-full  form-control {{ $errors->has('min') ? 'is-invalid' : ''}}" type="number"  :value="old('min')"   />
                                    @if ($errors->has('min'))
                                        <span class="invalid-feedback" style="display: country;" role="alert">
                                            <strong>{{ $errors->first('min') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="mb-1 col">
                                    <x-label for="max" class="invisible" value="{{ __('a') }}" />
                                    <x-input  wire:model="max" class="block mt-1 w-full form-control{{ $errors->has('max') ? ' is-invalid' : ''}}" type="number"  :value="old('max')"  placeholder="Valor máximo" />
                                        @if ($errors->has('max'))
                                            <span class="invalid-feedback" style="display: country;" role="alert">
                                                <strong>{{ $errors->first('max') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-2 col">
                                    <x-label for="open" value="{{ __('Horários de Abertura') }}" />
                                    <x-input wire:model="open" class="block mt-1 w-full form-control{{ $errors->has('open') ? ' is-invalid' : ''}}" type="time"  :value="old('open')"  />
                                        @if ($errors->has('open'))
                                            <span class="invalid-feedback" style="display: country;" role="alert">
                                                <strong>{{ $errors->first('open') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="mb-1 col">
                                    <x-label for="close" class="" value="{{ __('Horário de Encerramento') }}" />
                                    <x-input  wire:model="close" class="block mt-1 w-full form-control{{ $errors->has('close') ? ' is-invalid' : ''}}" type="time"  :value="old('close')"  placeholder="Valor máximo" />
                                        @if ($errors->has('close'))
                                            <span class="invalid-feedback" style="display: country;" role="alert">
                                                <strong>{{ $errors->first('close') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col">
                            <x-label for="address" class="" value="{{ __('Endereço') }}" />
                            <x-input  wire:model="address" class="block mt-1 w-full form-control{{ $errors->has('address') ? ' is-invalid' : ''}}" type="text"  :value="old('address')"  placeholder="Cidade/Município, Rua, Q, Nr casa" />
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" style="display: country;" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="col">

                            <x-label for="address" class="mb-1"  value="{{ __('Foto de Perfil') }}" />
                            <div class="input-group ">
                                <div class="custom-file inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150  form-control{{ $errors->has('cover') ? ' is-invalid' : ''}}">
                                  <input wire:model="cover" type="file" class="custom-file-input" id="cover">
                                  <label class="custom-file-label" for="cover">Pesquisar Foto</label>
                                </div>
                                @if ($errors->has('cover'))
                                <span class="invalid-feedback" style="display: country;" role="alert">
                                    <strong>{{ $errors->first('cover') }}</strong>
                                </span>
                            @endif
                            </div>



                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    @if (empty($this->curr_res))
                        <button type="submit" class="btn btn-secondary">Registar</button>
                    @else
                        <button type="submit" class="btn btn-secondary">Actualizar</button>
                    @endif
                </div>
            </form>
            

        </div>

    </div>
</div>
