<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

    <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
        <x-application-logo class="block h-12 w-auto" />
    
        <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white">
            Lista de Restaurantes
        </h1>
    
        <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
            Acompanhe a lista de restaurantes logo a seguir.
        </p>


    </div>
    
    <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 row p-6 lg:p-8">

        
        


                
        <div class="container mx-auto mt-4">
            <div class="row justify-content-center">
                @foreach ($rests as $item)
                    
                <div class="col-md-4">
                    @if($is_chat && $current_id == $item->id)
                     
                    <section class="chatbox rouded">
                        <div class="text-right bg-dark mb-0">
                            <a href="javascript:void(0)" wire:click="hideChat">
                                <span style="margin-right: 10%" class="text-light mr-4">
                                    <span > {{$item->name}} </span>
                                </span>
                                <i class="fa fa-close px-2 py-1 bg-danger text-white rouded rounded"></i>
                            </a>
                        </div>
                        <section class="chat-window">
                            @if(!is_null($comments))
                            @foreach ($comments as $comm)
                            @if($comm->rest_id == $item->id)
                            @if($comm->user_id != auth()->user()->id)
                            <article class="msg-container msg-remote" id="msg-0">
                                <div class="msg-box">
                                    {{-- {{asset('storage/'.auth()->user()->profile_photo_path)}} --}}
                                    @if (empty($comm->user->profile_photo_path))
                                        <img class="user-img" id="user-0" src="https://meta.com.sg/wp-content/uploads/2015/09/blank-avatar.png" />
                                    @else
                                        <img class="user-img" id="user-0" src="{{asset('storage/'.$comm->user->profile_photo_url)}}" />
                                    @endif
                                    <div class="flr">
                                        <div class="messages">
                                            <p class="msg" id="msg-0">
                                                {{$comm->comment}}
                                            </p>
                                        </div>
                                        <span class="timestamp text-light"><span class="username"> {{$comm->user->name}} </span>&bull;<span class="posttime">{{($comm->updated_at->diffForHumans())}}</span></span>
                                    </div>
                                </div>
                            </article>
                            @else
                            <article class="msg-container msg-self" id="msg-0">
                                <div class="msg-box">
                                    <div class="flr">
                                        <div class="messages">
                                            <p class="msg" id="msg-1">
                                                {{$comm->comment}}
                                            </p>
                                        </div>
                                        <span class="timestamp text-light">
                                            <a href="javascript:void(0)" wire:click="deleteComment({{$comm->id}})">
                                                <span class="username bg-light p-1 rounded fa fa-trash text-danger " ></span>&bull;
                                            </a>
                                            <span class="posttime">{{($comm->updated_at->diffForHumans())}}</span>
                                        </span>
                                    </div>
                                    <img src="{{asset('storage/'.auth()->user()->profile_photo_path)}}" alt="{{ auth()->user()->name }}" class="rounded-full h-10 w-10 object-cover ml-2">
                                </div>
                            </article>
                            @endif
                            @endif
                            @endforeach
                            @endif
                        </section>
                        <form class="chat-input" onsubmit="return false;">
                            <input type="text" wire:model="comment" autocomplete="on" placeholder="Escreva a tua mensagem" />
                            <button wire:click="saveComment">
                                <i class="fa-regular fa-paper-plane text-white mr-1"></i>
                            </button>
                        </form>
                    </section>
                    @else

                    <div class="card" style="width: 18rem;">
                        @if (empty($item->cover))
                            <img src="{{asset('img/UR_min.png')}}" class="card-img-top" alt="{{$item->name}}">
                        @else   
                            <img src="{{asset('storage/'.$item->cover)}}"  class="card-img-top" alt="{{$item->name}}"> 
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{$item->name}}</h5>
                            <h6 class="card-subtitle mb-2 text-warning">
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </h6>
                            <a href="{{route('rest.details', ['name'  =>  $item->name])}}" class="card-text"> <div class="btn btn-info"> <i class="fa fa-list"></i> detalhes</div> </a>
                            <a wire:click="showChat({{$item->id}})" href="javascript:void(0)" data-bs-toggle="modal"  class="btn mr-2"><i class="fa-regular fa-comments text-light"></i> 
                            </a>
                            @for ($j = 0; $j < 5; $j++)
                                <a href="javascript:void(0)" class="star" wire:click="setRating({{$j+1}}, '{{$j}}')"> 
                                    <i class="fa fa-star"></i> 
                                </a>
                            @endfor
                        </div>
                    </div>
                    
                    @endif



                </div>   

                
                @endforeach
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