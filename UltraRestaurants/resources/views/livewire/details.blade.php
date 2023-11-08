<div>
    {{-- The whole world belongs to you. --}}
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

    <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
        <x-application-logo class="block h-12 w-auto" />
    
        <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white">
            {{$rest_name}}
        </h1>
    
        <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
            <i class="fa-solid fa-clock-rotate-left"> Hora de Abertura: {{$rest->open_time}}</i>
            <i class="fa-solid fa-clock-rotate-left"> Hora de Fechar: {{$rest->close_time}}</i>
        </p>


    </div>
    
    <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 row p-6 lg:p-8">


                
        <div class="container mx-auto mt-4">
            <div class="row justify-content-center">
                
                {{-- @if($is_chat && $current_id == $item->id) --}}
                @foreach ($items as $item)
                <div class="col-md-4">
                     

                    <div class="card" style="width: 18rem;">
                        {{-- @if (empty($item->cover)) --}}
                            {{-- <img src="{{asset('img/UR_min.png')}}" class="card-img-top" alt=""> --}}
                        {{-- @else    --}}
                        {{asset('public/'.$item->path)}}
                            <img src="{{asset('public/'.$item->path)}}"  class="card-img-top" alt=""> 
                        {{-- @endif --}}
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <h6 class="card-subtitle mb-2 text-warning">
                                {{$item->item_name}}
                            </h6>
                            <a href="" class="card-text"> <div class="btn btn-success"> <i class="fa fa-plus"></i> Solicitar</div> </a>
                            <a  href="javascript:void(0)" data-bs-toggle="modal"  class="btn mr-2 text-light">
                                <i class="fa-regular fa-list text-light"></i><span
                                >Nr Soli.:</span> <b class="text-danger">87</b>
                            </a>
                        </div>
                    </div>
                    
                    
                    
                    
                </div>   
                @endforeach
                {{-- @endif --}}

                
            </div>    
        </div>    

        











         


    
    </div>
    
    
    {{-- Modals --}}
    <div  >
        <div wire:ignore.self   class="modal" id="commentsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Your modal content goes here -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script>
    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('.star');

        stars.forEach((star, index) => {
            star.addEventListener('mouseenter', () => {
                for (let i = 0; i <= index; i++) {
                    stars[i].classList.add('highlight');
                }
            });

            star.addEventListener('mouseleave', () => {
                stars.forEach((s) => {
                    s.classList.remove('highlight');
                });
            });
            
        });
    });
    

    document.addEventListener('livewire:load', function () {
        Livewire.on('openCommentsModal', function () {
            // Adicione uma classe CSS para animação de entrada ao modal de criação
            $('#commentsModal').addClass('show');
        });

    });

</script>