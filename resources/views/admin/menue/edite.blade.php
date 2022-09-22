<x-admin-layout>
    <!-- breadcrumb-area -->
    @component('components.admin-breadcrumbs')
    @slot('route1', 'admin.menues.index' )
    @slot('name1',  'Menues')
    @slot('name2',  'Edite Menue')
    @endcomponent
    <!-- breadcrumb-area-end -->
     @include('partials.admin.error')

     <div class="m-5 p-5 bg-gray-50 rounded-lg border border-gray-300 ">
        <h1 class="text-center  text-red-700">{{__('Edite menue')}}</h1>
        <form action="{{route('admin.menues.update',$menue->id)}}" method="post" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <label for="name" class="block m-3 text-sm font-medium text-red-500  ">Name*</label>
            <input type="text" value="{{$menue->name}}" name="name" id="name" class=" text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-9/12 p-2.5 " placeholder="name" required>
             
            
            <label for="name" class="block m-3 text-sm font-medium text-red-500 ">Price*</label>
            <input type="number" value="{{$menue->price}}" name="price" min="0.00" max="10000.00" step="1" id="price" class=" text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-9/12 p-2.5 " placeholder="price" required>


              <div class="m-4">
                <img class="w-32 h-32" src="{{Storage::url($menue->image)}}" >
              </div>
            <label class="block m-3 text-sm font-medium text-red-500" for="file_input">Upload Image*</label>
            <input name="image" class="block w-9/12 text-sm text-gray-900  rounded-lg border border-gray-300 cursor-pointer  focus:outline-none " aria-describedby="file_input_help" id="file_input" type="file">
            <p class="mt-1 text-sm text-gray-500 " id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
 
            <label for="categories" class="block mb-2 text-sm font-medium text-red-500">Select categories*</label>
            <div class="relative flex w-9/12">
                <select
                  id="categories"
                  name="categories[]"
                  multiple
                  placeholder="Select categories..."
                  autocomplete="off"
                  class="block w-full rounded-sm cursor-pointer focus:outline-none rounded-lg border border-gray-300"
                  multiple
                >
                @foreach ( $categories as $category )
                <option value="{{$category->id}}" {{in_array($category->id,$menue->categories->pluck('id')->toArray()) ? "selected" : ""}} >{{$category->name}}</option>

                @endforeach

                </select>
            </div>

            <label for="description" class="block m-3 text-sm font-medium text-red-500  ">Description*</label>
            <textarea id="description" name="description" rows="4" class="block p-2.5 w-9/12 text-sm text-gray-900   rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Your message..."> {{$menue->description}}</textarea>
            <div class="m-2 p-2">
                <button   class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg">submit</button>
            </div>
        </form>

     </div>
     </div>
 </x-admin-layout>
