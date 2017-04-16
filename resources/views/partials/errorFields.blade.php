@if($errors->any())
    <div class="alert alert-danger">
        <p>Por favor corrige los errores:</p>
        @foreach($errors->all() as $error)
            <ul>
                <li>{{$error}}</li>
            </ul>
        @endforeach
    </div>
@endif