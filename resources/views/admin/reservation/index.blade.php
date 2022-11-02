<x-admin-layout>

    <!-- breadcrumb-area -->
    @component('components.admin-breadcrumbs')
    @slot('route1', 'admin.reservations.index' )
    @slot('name1',  'Reservations')
    @endcomponent
    <!-- breadcrumb-area-end -->


    <div class="flex justify-end m-3 p-3">
        <a href="{{route('admin.reservations.create')}}" class="btn-create  ">New Reservation</a>
    </div>
     <div class="overflow-x-auto relative shadow-md sm:rounded-lg p-5">
         <div class="flex justify-between items-center pb-4 bg-white dark:bg-gray-900">

             <label for="reservation-search" class="sr-only">Search</label>
             <div class="flex justify-center">
                <div class="mb-3 xl:w-96">
                    <form action="{{route('admin.reservations.index')}}" method="get">

                  <div class="input-group relative flex flex-wrap items-stretch w-full mb-4">
                     <input type="search" name="phone" class="form-control m-2 relative flex-auto min-w-0 block  px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Search By Phone" aria-label="Search" aria-describedby="button-addon2">
                    <input type="search" name="table_name" class="form-control m-2 relative flex-auto min-w-0 block  px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Search By Table" aria-label="Search" aria-describedby="button-addon2">
                    <input type="search" name="date" class="form-control m-2 relative flex-auto min-w-0 block  px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Search By Date" aria-label="Search" aria-describedby="button-addon2">

                    <button type="submit" class="btn m-2  inline-block px-6 py-2.5 bg-indigo-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex items-center" type="button" id="button-addon2">
                      <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                      </svg>
                    </button>
                  </div>
                    </form>
                </div>
              </div>
         </div>
         <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
             <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                       #
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Name
                    </th>

                    <th scope="col" class="py-3 px-6">
                        Email
                    </th>
                    <th scope="col" class="py-3 px-6">
                       Phone
                    </th>
                    <th scope="col" class="py-3 px-6">
                       Table
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Guest Number
                     </th>
                     <th scope="col" class="py-3 px-6">
                        Date
                     </th>
                     <th scope="col" class="py-3 px-6">
                     Actions
                     </th>
                </tr>
             </thead>
             <tbody>

                @forelse($reservations as $index => $reservation)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                    <td class="py-4 px-6">
                      {{$index + 1}}
                    </td>

                    <td class="py-4 px-6">
                         {{$reservation->first_name}}  {{$reservation->last_name}}
                    </td>

                   <td class="py-4 px-6">
                    {{$reservation->email}}
                   </td>
                   <td class="py-4 px-6">
                    {{$reservation->phone}}
                   </td>
                   <td class="py-4 px-6">
                    {{$reservation->table->name}}
                   </td>
                   <td class="py-4 px-6">
                    {{$reservation->guest_number}}
                   </td>
                   <td class="py-4 px-6">
                    {{$reservation->date->format('Y-m-d h:m A')}}
                   </td>

                    <td class="py-4 px-6">
                        <div class="flex space-x-2">
                        <a href="{{route('admin.reservations.edit',$reservation->id)}}" class="px-4 py-2 bg-green-500  hover:bg-green-700 rounded-lg text-white">Edit</a>
                            <form class="px-2 py-2 bg-red-500  hover:bg-red-700 rounded-lg text-white"
                            method="post"
                            action="{{route('admin.reservations.destroy',$reservation->id)}}"
                            onsubmit="return confirm('Are You Sure')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                 @empty
                 <tr><td colspan="4" class="text-center"> No reservations </td></tr>
                @endforelse


             </tbody>
            </table>
            <div >
                <div >
                    {{ $reservations->links() }}
                </div>
            </div>
     </div>

 </div>

</x-admin-layout>
