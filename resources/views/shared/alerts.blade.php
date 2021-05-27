@if(session('success'))
    <div class="alert alert-success" id="success-alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>Success! </strong> {{session('success')}}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger" id="success-alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>Error! </strong> {{session('error')}}
    </div>
@endif


