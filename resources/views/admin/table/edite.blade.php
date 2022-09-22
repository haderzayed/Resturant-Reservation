<x-admin-layout>
    <!-- breadcrumb-area -->
    @component('components.admin-breadcrumbs')
    @slot('route1', 'admin.tables.index' )
    @slot('name1',  'Tables')
    @slot('name2',  'Edite Table')
    @endcomponent
    <!-- breadcrumb-area-end -->
     @include('partials.admin.error')

     <div class="m-5 p-5 bg-gray-50 rounded-lg border border-gray-300 ">
        <h1 class="text-center  text-red-700">{{__('Edite Table')}}</h1>
        <form action="{{route('admin.tables.update',$table->id)}}" method="post" >
            @csrf
            @method('PUT')
            <label for="name" class="block m-3 text-sm font-medium text-red-500  ">Name*</label>
            <input type="text" value="{{$table->name}}" name="name" id="name" class=" text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-9/12 p-2.5 " placeholder="name" required>
             
            
            <label for="name" class="block m-3 text-sm font-medium text-red-500 ">Guest Number*</label>
            <input type="number" value="{{$table->guest_number}}" name="guest_number" min="0.00" max="10000.00" step="1" id="price" class=" text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-9/12 p-2.5 " placeholder="guest number" required>

  
            <label for="status" class="block mb-2 text-sm font-medium text-red-500">Select status*</label>
          
            <select name="status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-9/12 p-2.5  ">
                <option selected>select</option>
                <option selected>select</option>
                    <option value="pending"{{$table->status ='availabe'? "selected" : ""}}>Pending</option>
                    <option value="availabe"{{$table->status ='availabe'? "selected" : ""}}>Availabe</option>
                    <option value="unavailabe"{{$table->status ='unavailabe'? "selected" : ""}}>Unavailabe</option>
                </select>

                <label   for="location" class="block mb-2 text-sm font-medium text-red-500">Select location*</label>
                <select name="location" id="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-9/12 p-2.5  ">
                    <option selected>select</option>
                    <option value="front" {{$table->location ='front'? "selected" : ""}}>Front</option>
                    <option value="inside" {{$table->location ='inside'? "selected" : ""}}>Inside</option>
                    <option value="outside" {{$table->location ='outside'? "selected" : ""}}>Outside</option>
        
                    </select>  
        
            <div class="m-2 p-2">
                <button   class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg">submit</button>
            </div>
        </form>

     </div>
     </div>
 </x-admin-layout>
 
