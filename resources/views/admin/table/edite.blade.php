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
            <label for="name" class="block m-3 text-sm font-medium text-gray-500  ">Name<span class="inline text-red-500 ">*<span></label>
            <input type="text" value="{{$table->name}}" name="name" id="name" class=" text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-9/12 p-2.5 " placeholder="name" required>


            <label for="name" class="block m-3 text-sm font-medium text-gray-500 ">Guest Number<span class="inline text-red-500 ">*<span></label>
            <input type="number" value="{{$table->guest_number}}" name="guest_number" min="0.00" max="10000.00" step="1" id="price" class=" text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-9/12 p-2.5 " placeholder="guest number" required>


            <label for="status" class="block mb-2 text-sm font-medium text-gray-500">Select status<span class="inline text-red-500 ">*<span></label>

            <select name="status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-9/12 p-2.5  ">
                <option disabled>select</option>
                @foreach ( \App\Traits\Enums\TableStatus::$locations as $key=>$value)
                <option value="{{$key}}"  {{$table->status == $key ? "selected" : ""}}>{{$value}}</option>
                @endforeach
                </select>

                <label   for="location" class="block mb-2 text-sm font-medium text-gray-500">Select location<span class="inline text-red-500 ">*<span></label>
                <select name="location" id="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-9/12 p-2.5  ">
                    <option disabled>select</option>
                    @foreach ( \App\Traits\Enums\TableLocation::$locations as $key=>$value)
                    <option value="{{$key}}" {{$table->location == $key ? "selected" : ""}}>{{$value}}</option>
                    @endforeach
                    </select>

            <div class="m-2 p-2">
                <button   class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg">submit</button>
            </div>
        </form>

     </div>
     </div>
 </x-admin-layout>

