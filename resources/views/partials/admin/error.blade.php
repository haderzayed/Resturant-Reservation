@if($errors->any())
    <div class="mx-4 px-2 py-2 bg-red-500 rounded-lg w-12/12 text-white">
        <p><strong>Opps Something went wrong</strong></p>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

{{-- @if(session()->has('danger'))
  <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
    <span class="font-medium">Danger alert!</span> {{session()->get('danger')}}
  </div>
  @endif
  @if(session()->has('success'))
  <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
    <span class="font-medium">Success alert!</span> {{session()->get('success')}}
  </div>
  @endif
  @if(session()->has('warning'))
  <div class="p-4 mb-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg dark:bg-yellow-200 dark:text-yellow-800" role="alert">
    <span class="font-medium">Warning alert!</span> {{session()->get('warning')}}
  </div>
  @endif --}}
