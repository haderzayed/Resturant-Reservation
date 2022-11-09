<x-guest-layout>
    <section class="mt-8 bg-white">
        <div class="mt-4 text-center">
           @if(count($categories)>0)
                <h3 class="text-2xl font-bold">Our Categories</h3>
                <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
                    TODAY'S SPECIALITY</h2>
             @else
              <h3 class="text-2xl font-bold">No Categories</h3>
             @endif

        </div>

        <div class="container w-full px-5 py-6 mx-auto">
            <div class="grid lg:grid-cols-4 gap-y-6">
               @forelse($categories  as $category )
                <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                    <img class="w-full h-48" src="{{Storage::url($category->image)}}"
                    alt="Image"/>
                    <div class="px-6 py-4">
                    <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600 hover:text-green-400 uppercase">{{$category->name}}</h4>
                     <p class="leading-normal text-gray-700">  {{ Str::limit($category->description,30)}} </p>
                    </div>
                </div>
              @endforeach
            </div>
          </div>
      </section>
</x-guest-layout>
