@if(session()->has('error'))
    <div class="text-center mb-3 text-uppercase font-weight-bold alert alert-danger" role="alert">
        {{ session()->get('error') }}
    </div>
@endif

@if(session()->has('success'))
    <div class="text-center mb-3 text-uppercase font-weight-bold alert alert-success" role="alert">
        {{ session()->get('success') }}
    </div>
@endif

@if(session()->has('warning'))
    <div class="text-center mb-3 text-uppercase font-weight-bold alert alert-warning" role="alert">
        {{ session()->get('warning') }}
    </div>
@endif

@if($errors)
    @foreach($errors as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
@endif
