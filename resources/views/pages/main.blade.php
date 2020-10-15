@extends('layouts.app')

@section('content')
    <div class="container bg-dark">
        <div class="container"> 
        <h5> Username : {{auth()->user()->name ?? ''}}</h5>
        <h5> Email : {{auth()->user()->email ?? ''}}</h5>
            <a class="btn btn-dark text-white border-white border" onclick="getKey()">Request Key</a>
            <br>
            <code id="activeID">{{auth()->user()->api_token ?? ''}}</code>
        </div>
    </div>


<script>
    var username = '{{auth()->user()->name ?? ''}}';
    function getKey(){
        $.ajax({
            type: "GET",
            url: "api/"+username+"/get-id",
            success: function (response) {
                $("#activeID").text(response.data.apiKey);
            }
        });
    }
</script>
@endsection