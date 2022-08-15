@props(['errors'])

@if ($errors->any())
    {{-- <div {{ $attributes }}> --}}
    <div class="bg-red-50 border-t-4 border-red-300 rounded-b text-red-900 px-4 py-5 mb-4">
        <div class="font-bold text-red-600">
            {{ __('Whoops! Something went wrong.') }}
        </div>

        <ul name="{{ $errors->count() }}" class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
