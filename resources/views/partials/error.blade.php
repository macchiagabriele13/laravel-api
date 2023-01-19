@if($errors->any())
<div class="alert alert-danger">
    <ul>
        <li>Hai {{count($errors)}} errori da sistemare</li>
        @foreach($errors->all() as $error)

        @endforeach
    </ul>
</div>
@endif