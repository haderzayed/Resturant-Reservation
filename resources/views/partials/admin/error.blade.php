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
