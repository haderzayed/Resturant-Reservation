<x-guest-layout>
    <section class="mt-8 bg-white">
        <div class="mt-4 text-center">

                <h3 class="text-2xl font-bold">Our Menue </h3>
                <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
                    TODAY'S SPECIALITY</h2>


        </div>

        <div class="container w-full px-5 py-6 mx-auto">
            <div class="grid lg:grid-cols-4 gap-y-6">
               @forelse($category->menues  as $menue )
                <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                    <a href="{{route('categories.show',$menue->id)}}"> <img class="w-full h-48" src="{{Storage::url($menue->image)}}"
                    alt="Image" />
                    <div class="px-6 py-4">
                    <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600 hover:text-green-400 uppercase"><a href="#">{{$menue->name}}</a></h4>
                     <p class="leading-normal text-gray-700">  {{ Str::limit($menue->description,30)}} </p>
                    </div>
                    <div class="flex items-center justify-between p-4">
                        <span class="text-xl text-green-600">{{$menue->price}}</span>
                      </div>
                </div>
              @endforeach
            </div>
          </div>


      </section>
</x-guest-layout>
