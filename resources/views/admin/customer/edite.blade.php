<x-admin-layout>
    <!-- breadcrumb-area -->
    @component('components.admin-breadcrumbs')
    @slot('route1', 'admin.customers.index' )
    @slot('name1',  'Customers')
    @slot('name2',  'Edite Customer')
    @endcomponent
    <!-- breadcrumb-area-end -->
     @include('partials.admin.error')

     <div class="m-5 p-5 bg-gray-50 rounded-lg border border-gray-300 ">
        <h1 class="text-center  text-red-700">{{__('Edite Admin')}}</h1>
        <form action="{{route('admin.customers.update',$customer->id)}}" method="post"  >
            @csrf
            @method('PUT')
            <label for="name" class="block m-3 text-sm font-medium text-gray-900 ">Name<span class="inline text-red-500 ">*<span></label>
            <input type="text" value="{{old('name',$customer->name)}}" name="name" id="name" class=" text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-9/12 p-2.5 " placeholder="name" required>

            <label for="email" class="block m-3 text-sm font-medium text-gray-900 ">Email<span class="inline text-red-500 ">*<span></label>
            <input type="email" name="email" value="{{old('email',$customer->email)}}" id="email" class=" text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-9/12 p-2.5 " placeholder="Email" required>


            <label for="password" class="block m-3 text-sm font-medium text-gray-900 ">Password<span class="inline text-red-500 ">*<span></label>
            <input type="password" name="password" id="password" class=" text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-9/12 p-2.5 " placeholder="password" >

            <label for="password_confirmation" class="block m-3 text-sm font-medium text-gray-900 ">Password Confirmation<span class="inline text-red-500 ">*<span></label>
            <input type="password" name="password_confirmation" id="password_confirmation" class=" text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-9/12 p-2.5 " placeholder="Password Confirmation" >

            <div class="m-2 p-2">
                <button   class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg">submit</button>
            </div>
        </form>

     </div>
     </div>
 </x-admin-layout>
