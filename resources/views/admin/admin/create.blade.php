<x-admin-layout>
    <!-- breadcrumb-area -->
    @component('components.admin-breadcrumbs')
    @slot('route1', 'admin.admins.index' )
    @slot('name1',  'admins')
    @slot('name2',  'Create Admin')
    @endcomponent
    <!-- breadcrumb-area-end -->
     @include('partials.admin.error')

     <div class="m-5 p-5 bg-gray-50 rounded-lg border border-gray-300 ">
          <h1 class="text-center  text-red-700">{{__('Create Admin')}}</h1>
        <form action="{{route('admin.admins.store')}}" method="post"  >
            @csrf
            <label for="name" class="block m-3 text-sm font-medium text-gray-900 ">Name<span class="inline text-red-500 ">*<span></label>
            <input type="text" name="name" value="{{old('name')}}" id="name" class=" text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-9/12 p-2.5 " placeholder="name" required>

            <label for="email" class="block m-3 text-sm font-medium text-gray-900 ">Email<span class="inline text-red-500 ">*<span></label>
            <input type="email" name="email" value="{{old('email')}}" id="email" class=" text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-9/12 p-2.5 " placeholder="Email" required>

            <label for="password" class="block m-3 text-sm font-medium text-gray-900 ">Password<span class="inline text-red-500 ">*<span></label>
            <input type="password" name="password" id="password" class=" text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-9/12 p-2.5 " placeholder="password" required>

            <label for="password_confirmation" class="block m-3 text-sm font-medium text-gray-900 ">Password Confirmation<span class="inline text-red-500 ">*<span></label>
            <input type="password" name="password_confirmation" id="password_confirmation" class=" text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-9/12 p-2.5 " placeholder="Password Confirmation" required >

            <div class="m-2 p-2">
                <button   class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg">submit</button>
            </div>
        </form>

     </div>
     </div>
 </x-admin-layout>
