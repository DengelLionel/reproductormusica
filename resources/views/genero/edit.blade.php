<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Modificar Género</title>
</head>
<body>
    
</body>
</html>
<div
	class="relative   min-h-screen  sm:flex sm:flex-row  justify-center bg-transparent rounded-3xl shadow-xl  bg-blue-900  bg-gradient-to-b z-[10] from-gray-900 via-gray-900 to-blue-800">
	<div class="flex-col flex  self-center lg:px-14 sm:max-w-4xl xl:max-w-md  z-10">
		<div class="self-start hidden lg:flex flex-col  text-gray-300">
			@if(session('status'))
		<div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-3" role="alert">
        <p class="font-bold">{{session('message')}}</p>
      
    </div>
	@endif
			
			@if($errors->any())
			@foreach ($errors->all() as $error)
			<div class="bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3 mb-[10px]" role="alert">
        
        <p class="text-sm">{{$error}}</p>
    </div>
	@endforeach
	@endif

			<h1 class="my-3 font-semibold text-4xl">Modificar Género</h1>
			<p class="pr-3 text-sm opacity-75"> Sea el primero en obtener el exito gracias a tus playlists.</p>
		</div>
	</div>
	<div class="flex justify-center self-center  z-10">
		<div class="p-12 bg-white mx-auto rounded-3xl w-96 ">
			<div class="mb-7">
				<h3 class="font-semibold text-2xl text-gray-800">Modificar Género </h3>
				
			</div>
			<form action="{{route('genero.update',['genero'=>$genero->id])}}" enctype="multipart/form-data" method="POST" class="space-y-6">
                {{method_field('PUT')}}
				@csrf
				<div class="">
					<input class=" w-full text-sm  px-4 py-3 bg-gray-200 focus:bg-gray-100 border  border-gray-200 rounded-lg focus:outline-none focus:border-purple-400 mb-[10px]" value="{{$genero->name}}" name="name" type="" placeholder="Nombre">
                    <select class=" w-full text-sm  px-4 py-3 bg-gray-200 focus:bg-gray-100 border  border-gray-200 rounded-lg focus:outline-none focus:border-purple-400" name="artist_id" id="">
                    @foreach($artista as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                   </select>
              </div>

                    <!-- IMAGEN IMAGEN IMAGEN -->
					<div class="relative" x-data="{ show: true }">
						<!-- component -->
<div class="flex min-h-[50px]  bg-gray-100 font-sans">
    <div>
  <label for="dropzone-file" class="mx-auto cursor-pointer flex w-full max-w-lg flex-col items-center rounded-xl border-2 border-dashed border-blue-400 bg-white p-6 text-center">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
      <path stroke-linecap="round" stroke-linejoin="round" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
    </svg>

    <h2 class="mt-4 text-xl font-medium text-gray-700 tracking-wide">Añadir imagen del género</h2>

    <p class="mt-2 text-gray-500 tracking-wide">Se permite  PNG y JPG </p>

    <input id="dropzone-file" name="cover" type="file" class="hidden" />
  </section>
  </div>
  <img class="w-[80px] h-[60px]" src="/cover/{{$genero->cover}}" alt="">
</div>
					</div> <!-- FINALIZA IMAGEN -->


					<div class="flex items-center justify-between">

						
					</div>
					<div>
						<button type="submit" class="w-full flex justify-center bg-blue-800  hover:bg-blue-700 text-gray-100 p-3  rounded-lg tracking-wide font-semibold  cursor-pointer transition ease-in duration-500">
                Modificar Género
              </button>
					</div>
					
</form> <!-- df -->

		</div>

	</div>
	
	</div>
