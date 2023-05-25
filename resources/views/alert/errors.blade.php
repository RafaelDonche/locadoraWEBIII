@if (isset($errors) && count($errors)>0)
    <div class="text-center mt-4 mb-4 p-2 alert-danger" >
        @foreach ($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
    </div>
@endif

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <strong class="mt-1">{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
    <strong class="mt-1">{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
    <strong class="mt-1">{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
    <strong class="mt-1">{{ $message }}</strong>
</div>
@endif
