<div>
    {{-- The whole world belongs to you. --}}
    <div>
        <div class="flex  justify-content-between items-center mb-2 ">
            @if($tabNew)
                <h2 class="ml-3 text-xl font-semibold text-gray-900 dark:text-white">
                    <i class="fa fa-pen text-white"></i>
                    <span href="javascript:void(0)">Novo Item</span>
                </h2>
                <button class="ml-3  btn btn-secondary" wire:click="setTab(false)">
                    <span href="javascript:void(0)"><i class="fa fa-list "></i> Lista</span>
                </button>
            @else
                <h2 class="ml-3 text-xl font-semibold text-gray-900 dark:text-white">
                    <i class="fa fa-list text-white"></i>
                    <span href="javascript:void(0)">Lista de Itens</span>
                </h2>
                <button class="ml-3  btn btn-secondary"  wire:click="setTab(true)">
                    <span href="javascript:void(0)"><i class="fa fa-pen "></i> Novo Item</span>
                </button>
            @endif
        </div>
        @if($tabNew)
        <form  wire:submit.prevent="{{!empty($editId) ? 'updateItem' : 'saveItem'}}" class="card text-white bg-dark mb-3" style="max-width: 100%;">
            @csrf
            <div class="card-header text-muted">Preencha o formulário devidamente</div>
            <div class="card-body">
                <div class="row">   
                    <div class="col-6">
                        <div class="mb-2">
                            <x-label for="name" value="{{ __('Nome do Prato') }}" />
                            <x-input wire:model="name" class="block mt-1 w-full form-control {{ $errors->has('name') ? ' is-invalid' : ''}} " type="text"  :value="old('name')"  />

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" style="display: country;" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-6">
                        <x-label for="address" class="mb-1"  value="{{ __('Imagem') }}" />
                        <div class="input-group ">
                            <div class="custom-file inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150  form-control{{ $errors->has('path') ? ' is-invalid' : ''}}">
                              <input wire:model="path" type="file" class="custom-file-input" id="path">
                              <label class="custom-file-label" for="path">Pesquisar Foto</label>
                            </div>
                            @if ($errors->has('path'))
                                <span class="invalid-feedback" style="display: country;" role="alert">
                                    <strong>{{ $errors->first('path') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                </div>

            </div>
            <div class="card-footer">
                @if (! empty($editId))
                    <button wire:click.prevent="clear" class="btn btn-dark">Limpar</button>
                @endif
                <button type="submit" class="btn btn-secondary">Gravar</button>
            </div>
        </form>
        @else
        
        <div   class="card text-white bg-dark mb-3" style="max-width: 100%;">
            @csrf
            <div class="card-header text-muted">
                Pesquisa
            </div>


            <div class="card-body table-responsive " style="max-height: 25em" >
                <table class="table table-dark table-striped table-hover">
                    <thead>
                        <th scope="col">Cód</th>
                        <th scope="col">Prato</th>
                        <th scope="col">Criado</th>
                        <th scope="col">Actualizado</th>
                        <th scope="col">Acções</th>
                    </thead>

                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <th scope="row">{{$item->id}}</th>
                                <td> {{$item->item_name}} </td>
                                <td> {{$item->created_at->diffForHumans()}} </td>
                                <td>{{$item->updated_at->diffForHumans()}} </td>
                                <td>
                                    <span wire:click="deleteItem({{$item->id}})" class="fa fa-trash-alt text-warning mr-3"></span>
                                    <span wire:click="setItem({{$item->id}})" class="fa fa-pencil text-primary ml-4"></span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
            {{-- <div class="card-footer">
                <button type="submit" class="btn btn-secondary">Gravar</button>
            </div> --}}
        </div>
        @endif

    </div>

</div>
