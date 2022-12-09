<div>
<h2 class="font-bold text-red-500">Lista canciones - Playlist - Interactions</h2>

<!-- component -->
<section class="antialiased bg-gray-100 text-gray-600 h-screen px-4">
    <div class="flex flex-col justify-center h-full">
        <!-- Table -->
        <div class="w-full max-w-5xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
            <header class="px-5 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800">Canciones</h2>
            </header>
            <div class="p-3">
                <div class="">
                    <table class="table-auto w-full">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                            <tr>
                            <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">ID SONG</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Artista</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Album</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Playlist</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Interacciones</div>
                                </th>

                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            @foreach($canciones as $item)
                            <tr>
                            <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{$item->songid}}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{$item->nameartist}}</div>
                                </td>
                              
                                <td class="p-2 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img class="rounded-tl-lg rounded-tr-lg rounded-br-lg rounded-bl-lg" src="cover/{{$item->cover}}" width="40" height="40" alt="Alex Shatov"></div>
                                        <div class="font-medium text-gray-800">{{$item->namealbum}}</div>
                                    </div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left font-medium text-green-500"></div>
                                    {{$item->playlistname}}
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-lg text-center ">
                                       <article class="flex flex-col gap-1">
                                       <span class="bg-green-600 text-white text-lg font-medium rounded-tl-lg rounded-tr-lg rounded-br-lg rounded-bl-lg p-2">
                                        
                                        
                                       
                                        LIKED: 
                                         </span>
                                        <span class="bg-red-600 text-white text-lg font-medium rounded-tl-lg rounded-tr-lg rounded-br-lg rounded-bl-lg p-2">
    
                                            Play count:  </span>
                                       </article>
                                        
                                        
                                    </div>
                                </td>
                                <td>
                                      <!-- INICIO INTERACCIONES -->
                                    
                                      
                               
                                    <input type="hidden" value="{{Auth::user()->id}}" name="user_id" id="user_id">
                                <script>
                                   
                                    let setDato=(e=null)=>{
                                        let inter=e
                                        console.log("data",inter)
                                            datos={
                                                user_id:$('#user_id').val(),
                                                song_id:inter,
                                                liked:true,
                                                play_count:inter,
                                            }
                                        console.log(datos)
                                        $.ajax({
                                            type:'POST',
                                            url:'http://localhost:8000/interactions',
                                            data:datos,
                                        
                                            
                                            headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
                                        })
                                      
                                    }
                                   
                                    
                                </script>
                                <button onclick="setDato('{{$item->songid}}')"  class="bg-blue-600 rounded-full p-1">
                                        <svg width="36" height="36" viewBox="0 0 96 96" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<rect width="96" height="96" fill="url(#pattern0)"/>
<defs>
<pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
<use xlink:href="#image0_4_3" transform="scale(0.0104167)"/>
</pattern>
<image id="image0_4_3" width="96" height="96" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAABmJLR0QA/wD/AP+gvaeTAAAEm0lEQVR4nO2dz4tbVRTHv+e9PEOaSe5LMgsRRt1qF67F35VZuPN/EFy4Ebeu3Av+QKegjCuLrkprx3EKFaUoYlEptRVx448Rh0cy47tIzdA2yXETIWTy+90fL9PzWd5737mH85n7Iwm8AQRBEAThGJIkSVlrvZ2m6dO+c7nrSJKknKbp5TRNOU3Tm1rrU75zGkXgOwEbJElSLhaL2wCe7DeVmXlLa/2sz7xGQb4TME2r1aoUCoUdAI+N6G73er31RqPxjeu8xnGsVkCSJOVCobCF0cUHgBNhGJ5ttVr3ucxrEsdGwMC289Skccx8bxiGrzlKayrHYguasu2M4jAMw7VqtXpgM69ZWPoV0N92LmD24gNAqdPpPGorp3lYagHNZnOlWCxeBDD3PT8IgoctpDQ3SysgSZJyFEVbAB5f5Hlm7hpOaSEKvhNYhGazuRJF0WcAnsgQpmUqnyws3QoY+MvPUnwAuG4in6ws1S1ob2/vRKlU2sYCe/4Q7TiOFRF1TOSVhaVZAf3if4rsxQeA7/JQfGBJBAwU/xkT8Zj5WxNxTJB7AaaLDwBEdMVUrKzkWoCN4gNAp9PJjYDcHsK2ig9gt1arPWA45sLkcgVYLH6u9n8ghwL6xd+CheID+dr/gZwJGCi+tZ8Pe72erIBRuCg+gDvtdvuqxfhzkwsBjooPAFfX1tYOLc8xF94FOCw+AORq+wE8C3BcfDBzrg5gwKMA18UHgCAIRAAAMHNUKpXOw2HxAbSUUr86nG8mvAjQWr8OYN3xtFeIiB3PORXnX0Xs7+8/FIbhdQCh67kd8S+A3wF8zsyb9Xr9xqTBzldAGIYv4vgWHwDKAE4CeJmIrmmtN5j5nnGDfWxBrrcenwTM/JLWemecBB8C7vcwp29Oaa3fGNVx5AxI0zTTQVWr1SaeK1njLzHdXq/3SKPR+Gmw0fsn4buIMAiCF4YbRYBbjpx/IsAtR36JEwFuqQw3iADPiADPiADPiADPiADPiADPiADPiAC3/DPcIALc8udwgwhwy8XhBhHgECL6eLhNBLjj6ziOfxhuFAGOIKJ3RrWLADfsKaXOjeoQAQ5g5g0iujOqTwTY51YURZvjOkWAfT6qVCrNcZ0iwDJEdHpSvwiwy1dxHH8/aYAIsMi4q+cgIsAefymlzk8bJAIsMenqOYgIsMOtKIo+mGWgCLDDmUlXz0FEgB2mHr7/IwLMc7lWq12bdbAIMMwsV89BRIBZdpVSn8zzgAgwCBGdnvdddCLAHIdBEIz91nMcIsAQzHxmkZeBiwBzvLvIQyLADF/W6/UfF3lQBJhhrqvnICIgO3/EcXxh0Yd9CLjpYU5rENEGES38KnwfAnY9zGmLNhHN9K3nOHwIuORhTisw84dKqb+zxHAugJk3AeTiv1dkpFMoFN7MGsS5gHq9foOI3nM9rwXerlarv2QN4uUWpJR6BcAXPuY2ARHtxHH8qolYXgQQ0e04jp8DsIHl2o66AN5SSj1PRLdNBHT+upphDg4OTvbfIrIO4EEAK1nmt0AbwG8ALnW73fdXV1d/9p2QIAiCIAiCIAiCIAiCsJz8B5W2ScmVBXDfAAAAAElFTkSuQmCC"/>
</defs>
</svg>


                                        </button>
                                </td>
                                <td>
                                    <button>
                                        <p>{{$item->songname}}</p>
                                        <audio controls>
                                            <source src="path/{{$item->path}}" type="audio/mp3">
                                        </audio>
                                   
                                    </button>
                                   
                                    
                                     <!-- FIN INTERACCIONES -->
                                </td>
                                <td>
                                    <p>Eliminar si no tiene playlist</p>
                                    <form action="{{route('canciones.destroy',['cancione'=>$item->songid])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                <button type="submit" class="p-[8px] bg-red-700 font-bold text-white">Eliminar</button>
                                </form>
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
   





<div>
<h2 class="font-bold text-red-500">Lista canciones </h2>

<!-- component -->
<section class="antialiased bg-gray-100 text-gray-600 h-screen px-4">
    <div class="flex flex-col justify-center h-full">
        <!-- Table -->
        <div class="w-full max-w-5xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
            <header class="px-5 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800">Canciones</h2>
            </header>
            <div class="p-3">
                <div class="">
                    <table class="table-auto w-full">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                            <tr>
                            <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">ID SONG</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Title song</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Lyrics</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Audio</div>
                                </th>
                               

                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            @foreach($songsList as $item)
                            <tr>
                            <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{$item->id}}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{$item->title}}</div>
                                </td>
                              
                                <td class="p-2 whitespace-nowrap">
                                    <div class="flex items-center">
                                        
                                        <div class="font-medium text-gray-800">{{$item->lyrics}}</div>
                                    </div>
                                </td>
                              
                                
                                <td>
                                    <button>
                                   
                                        <audio controls>
                                            <source src="path/{{$item->path}}" type="audio/mp3">
                                        </audio>
                                   
                                    </button>
                                   
                                    
                                     <!-- FIN INTERACCIONES -->
                                </td>
                                <td>
                                    <a href="{{route('canciones.edit',['cancione'=>$item->id])}}">Editar</a>
                                </td>
                                <td>

                                    <p>Eliminar</p>
                                    <form action="{{route('canciones.destroy',['cancione'=>$item->id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                <button type="submit" class="p-[8px] bg-red-700 font-bold text-white">Eliminar</button>
                                </form>
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
   







   



   

