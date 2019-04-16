@if($errors->all())
    <div class="alert alert-warning">
        @if(count($errors) > 1)
            <ul>
                @foreach($errors->all() as $errors)
                    <li>{{ $errors }}</li>
                @endforeach
            </ul>
        @else
            {{ $errors->first() }}
        @endif
    </div>
@endif

@if(session()->has('message'))
    <div class="alert alert-{{session('type')}}">
        {{ session('message')}}
    </div>
@endif
