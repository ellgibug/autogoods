@if(count($errors))
    <hr>
    @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
@endif