<x-admin-layout>
    <!-- breadcrumb-area -->
    @component('components.admin-breadcrumbs')
    @slot('route1', 'admin.reservations.index' )
    @slot('name1',  'Reservation')
    @slot('name2',  'Edite Reservation')
    @endcomponent
    <!-- breadcrumb-area-end -->
     @include('partials.admin.error')

     <div class="m-5 p-5 bg-gray-50 rounded-lg border border-gray-300 ">
        <h1 class="text-center  text-red-700">{{__('Edite reservation')}}</h1>
        <form action="{{route('admin.reservations.update',$reservation->id)}}" method="post">
            @csrf
            @method('PUT')
            <label for="first_name" class="block m-3 text-sm font-medium text-gray-500 ">First Name<span class="inline text-red-500 ">*<span></label>
            <input type="text" name="first_name" value={{$reservation->first_name}} id="first_name" class=" text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-9/12 p-2.5 " placeholder="First Name" required>

            <label for="last_name" class="block m-3 text-sm font-medium text-gray-500 ">Last Name<span class="inline text-red-500 ">*<span></label>
            <input type="text" name="last_name" value={{$reservation->last_name}} id="last_name" class=" text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-9/12 p-2.5 " placeholder="Last Name" required>

            <label for="email" class="block m-3 text-sm font-medium text-gray-500 ">Email<span class="inline text-red-500 ">*<span></label>
            <input type="email" name="email" value={{$reservation->email}}  id="email" class=" text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-9/12 p-2.5 " placeholder="Email" required>

            <label for="phone" class="block m-3 text-sm font-medium text-gray-500 ">phone Number<span class="inline text-red-500 ">*<span></label>
            <input type="text" name="phone" value="{{$reservation->phone}}"  id="phone" class=" text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-9/12 p-2.5 " placeholder="Phone" required>

            <label for="guest_number" class="block m-3 text-sm font-medium text-gray-500 ">Guest Number<span class="inline text-red-500 ">*<span></label>
            <input type="number" name="guest_number" value={{$reservation->guest_number}} min="0.00" max="10000.00" step="1" id="guest_number" class=" text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-9/12 p-2.5 " placeholder="guest number" required>

            <label for="date" class="block m-3 text-sm font-medium text-gray-500 ">Reservation Date<span class="inline text-red-500 ">*<span></label>
            <input type="datetime-local" name="date" value="{{$reservation->date}}" id="date" class=" text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-9/12 p-2.5 " placeholder="guest number" required>

            <label for="table_id" class="block m-2 text-sm font-medium text-gray-500">Select Table<span class="inline text-red-500 ">*<span></label>

                <select name="table_id" id="status" placeholder="select"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-9/12 p-2.5  ">
                    <option disabled>select</option>
                    @foreach ($tables as $table)
                    <option value="{{$table->id}}" {{$table->id == $reservation->table_id ? "selected" : ""}}>{{$table->name}}({{$table->guest_number}} Guests)</option>
                    @endforeach
                </select>


              </div>


            <div class="m-2 p-2">
                <button   class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg">submit</button>
            </div>
        </form>

     </div>
     </div>
 </x-admin-layout>
