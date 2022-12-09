<!-- component -->
<table class="min-w-full border-collapse block md:table">
		<thead class="block md:table-header-group">
			<tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">ID</th>
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Nombre</th>
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Imagen</th>
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Actions</th>
			</tr>
		</thead>
		<tbody class="block md:table-row-group">
            @foreach($generos as $genero)
			<tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold"></span>{{$genero->id}}</td>
				<td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold"></span>
                {{$genero->name}}
                </td>
				<td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold"></span>
                <img class="w-[30px] h-[30px]" src="/cover/{{$genero->cover}}" alt=""></td>
				
				<td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
					<span class="inline-block w-1/3 md:hidden font-bold">Actions</span>
					<a href="{{route('genero.edit',['genero'=>$genero->id])}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">Edit</a>
					<form action="{{route('genero.destroy',['genero'=>$genero->id])}}" method="POST">
					@csrf
					@method('DELETE')
					<button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Delete</button>
					</form>
					
				</td>
			</tr>
            @endforeach
				
		</tbody>
	</table>