
        <!-- component -->

        <div
	class="relative   min-h-screen  sm:flex sm:flex-row  justify-center bg-transparent rounded-3xl shadow-xl  bg-purple-900  bg-gradient-to-b z-[10] from-gray-900 via-gray-900 to-purple-800 mb-[20px]">
	<div class="flex-col flex  self-center lg:px-14 sm:max-w-4xl xl:max-w-md  z-10">
		<div class="self-start hidden lg:flex flex-col  text-gray-300">
			
			<h1 class="my-3 font-semibold text-4xl">Agregar canciones a una playlist</h1>
			<p class="pr-3 text-sm opacity-75"> Sea el primero en obtener el exito gracias a tus playlists.</p>
		</div>
	</div>
	<div class="flex justify-center self-center  z-10">
		<div class="p-12 bg-white mx-auto rounded-3xl w-96 ">
			<div class="mb-7">
				<h3 class="font-semibold text-2xl text-gray-800">Agregar canciones a una playlist </h3>
				
			</div>
			<form action="{{route('playlistsong.store')}}" method="POST" class="space-y-6">
				@csrf
				<div class="">
					<label for="">Playlist</label>
                <select class=" w-full text-sm  px-4 py-3 bg-gray-200 focus:bg-gray-100 border  border-gray-200 rounded-lg focus:outline-none focus:border-purple-400 mb-[10px]" name="playlist_id" id="">
                    @foreach($playlist as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                   </select>
						<label for="">Canción</label>
                   <select class=" w-full text-sm  px-4 py-3 bg-gray-200 focus:bg-gray-100 border  border-gray-200 rounded-lg focus:outline-none focus:border-purple-400 mb-[10px]" name="song_id" id="">
                    @foreach($songs as $item)
                    <option value="{{$item->id}}">{{$item->title}}</option>
                    @endforeach
                   </select>
              </div>


					<div class="relative" x-data="{ show: true }">
						
						<div class="flex items-center absolute inset-y-0 right-0 mr-3  text-sm leading-5">

							

							

						</div>
					</div>


					<div class="flex items-center justify-between">

						
					</div>
					<div>
						<button type="submit" class="w-full flex justify-center bg-purple-800  hover:bg-purple-700 text-gray-100 p-3  rounded-lg tracking-wide font-semibold  cursor-pointer transition ease-in duration-500">
                        Agregar canciones a una playlist
              </button>
					</div>
					
			</form> <!-- dfdf -->
		</div>
	</div>
	</div>
