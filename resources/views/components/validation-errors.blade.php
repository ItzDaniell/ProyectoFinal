@if ($errors->any())
    <div {{ $attributes }}>
        <div class="">{{ __('Whoops! Algo anda mal...') }}</div>

        <ul class="">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
