<x-admin-layout>

        <!-- breadcrumb-area -->
        @component('components.admin-breadcrumbs')
        @slot('route1', 'admin.menues.index' )
        @slot('name1',  'Menues')
        @endcomponent
        <!-- breadcrumb-area-end -->


        <div class="flex justify-end m-3 p-3">
            <a href="{{route('admin.menues.create')}}" class="btn-create  ">New Menue</a>
        </div>
         <div class="overflow-x-auto relative shadow-md sm:rounded-lg p-5">
             <div class="flex justify-between items-center pb-4 bg-white dark:bg-gray-900">
                 <div>
                    <form action="{{route('admin.menues.index')}}" method="get">

                     <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                         Search By Categories
                         <svg class="ml-2 w-3 h-3" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                     </button>
                     <!-- Dropdown menu -->
                     <div id="dropdownRadio" class="hidden z-10 w-48 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                         <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioButton">
                            @foreach ($categories as $index=>$value )
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="filter-radio-example-1" type="checkbox" value="{{$index}}" name="category_ids[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="filter-radio-example-1" class="ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300"> {{$value}}</label>
                                </div>
                            </li>
                            @endforeach

                         </ul>
                     </div>
                 </div>
                 <label for="table-search" class="sr-only">Search</label>
                 <div class="flex justify-center">
                    <div class="mb-3 xl:w-96">

                      <div class="input-group   relative flex flex-wrap items-stretch w-full mb-4">
                        <input type="search" name="name" class="form-control m-2 relative flex-auto min-w-0 block px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Search By  Name" aria-label="Search" aria-describedby="button-addon2">
                        <input type="search" name="price" class="form-control m-2 relative flex-auto min-w-0 block px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Search By  Price" aria-label="Search" aria-describedby="button-addon2">

                        <button type="submit" class="btn m-2 inline-block px-6 py-2.5 bg-indigo-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex items-center" type="button" id="button-addon2">
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
                            Image
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Price
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Categories
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Action
                        </th>
                    </tr>
                 </thead>
                 <tbody>

                    @forelse($menues as $index => $menue)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <td class="py-4 px-6">
                          {{$index + 1}}
                        </td>
                        <td scope="row" class="flex items-center py-4 px-6 text-gray-900 whitespace-nowrap dark:text-white">
                            <img class="w-10 h-10 rounded-full" src="{{Storage::url($menue->image)}}" alt="Jese image">

                        </td>
                        <td class="py-4 px-6">
                             {{$menue->name}}
                        </td>
                        <td class="py-4 px-6">
                            {{$menue->price}}
                       </td>
                        <td class="py-4 px-6 w-max h-3/6">
                            @foreach($menue->categories as $category)
                            <span class="bg-indigo-500	text-white text-blue-800 text-2xs font-semiboldn  mx-2 px-2 py-1 rounded ">{{$category->name}}</span>
                            @endforeach
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex space-x-2">
                            <a href="{{route('admin.menues.edit',$menue->id)}}" class="px-4 py-2 bg-green-500  hover:bg-green-700 rounded-lg text-white">Edit</a>
                                <form class="px-2 py-2 bg-red-500  hover:bg-red-700 rounded-lg text-white"
                                method="post"
                                action="{{route('admin.menues.destroy',$menue->id)}}"
                                onsubmit="return confirm('Are You Sure')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                     @empty
                     <tr><td colspan="4" class="text-center"> No Menues </td></tr>
                    @endforelse


                 </tbody>
             </table>
             {{ $menues->links('pagination::tailwind') }}
         </div>

     </div>
 </x-admin-layout>
