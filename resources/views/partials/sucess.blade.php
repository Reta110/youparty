@if(Session::has('succes'))
    <div class="alert alert-succes">
            <ul>
                <li>{{$succes}}</li>
            </ul>
    </div>
@endif