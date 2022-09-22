<x-admin-layout>

    <div class="py-12">
    <div class="flex m-4 p-4">
     <a href="{{route('admin.categories.index')}}" class="btn-create  "> Category Index</a>
    </div>
     <div class="m-5 p-5 bg-gray-50 rounded-lg border border-gray-300 ">
        <form action="{{route('admin.categories.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
            <input type="text" id="name" class=" text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-9/12 p-2.5 " placeholder="name" required>


            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="file_input">Upload file</label>
            <input name="image" class="block w-9/12 text-sm text-gray-900  rounded-lg border border-gray-300 cursor-pointer  focus:outline-none " aria-describedby="file_input_help" id="file_input" type="file">
            <p class="mt-1 text-sm text-gray-500 " id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>

            <label for="description" class="block m-2 text-sm font-medium text-gray-900 ">Description</label>
            <textarea id="description" rows="4" class="block p-2.5 w-9/12 text-sm text-gray-900   rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Your message..."></textarea>
            <div class="m-2 p-2">
                <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg">submit</button>
            </div>
        </form>

     </div>
     </div>
 </x-admin-layout>