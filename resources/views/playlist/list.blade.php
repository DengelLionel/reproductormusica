<!-- component -->
<table class="min-w-full border-collapse block md:table">
		<thead class="block md:table-header-group">
			<tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">ID</th>
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Canciones de la PlayList</th>
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Song</th>
				
			</tr>
		</thead>
		<tbody class="block md:table-row-group">
            @foreach($playlistSongs as $item)
			<tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold"></span>{{$item->id}}</td>
				<td class="p-2 md:border md:border-grey-500 text-left  md:table-cell">
                    <div class=" flex flex-row items-center justify-center gap-[15px]">
                    <p>{{$item->name}}</p>
                
                <audio controls>
                                            <source src="path/{{$item->path}}" type="audio/mp3">
                                        </audio>
                                        <form action="{{route('playlistsong.destroy',$item->playsong)}}" method="POST">
                                        @csrf
                                         @method('delete')
                                    
                                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded" type="submit">Quitar Canción del playlist</button>
                                        </form>
                                        </div>
                </td>
				<td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold"></span>
                {{$item->title}}
                </td>
				
				
			</tr>
            @endforeach
				
		</tbody>
	</table>


    <!-- component -->
<table class="min-w-full border-collapse block md:table">
		<thead class="block md:table-header-group">
			<tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">ID</th>
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">PlayLists</th>
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Actions</th>
				
			</tr>
		</thead>
		<tbody class="block md:table-row-group">
            @foreach($playlist as $item)
			<tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold"></span>{{$item->id}}</td>
				<td class="p-2 md:border md:border-grey-500 text-left  md:table-cell">
                    <div class=" flex flex-row items-center justify-center gap-[15px]">
                    <p>{{$item->name}}</p>
                
              
                                        
                                        </div>
                </td>
				<td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold"></span>
                <form action="{{route('playlist.destroy',$item->id)}}" method="POST">
                                        @csrf
                                         @method('delete')
                                    
                                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded" type="submit">Eliminar playlist</button>
                                        </form>
                </td>
				
				
			</tr>
            @endforeach
				
		</tbody>
	</table>
    