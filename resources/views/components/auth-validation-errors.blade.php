@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        @foreach ($errors->all() as $error)
            <div class="text-sm text-danger">{{ $error }}</div>
        @endforeach
    </div>
@endif