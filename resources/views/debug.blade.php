@extends('master.app')

@section('title', 'Developer Debug')

@section('content')
<div id="content-page" class="content-page">

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                {{ $password }}
            </div>
        </div>

    </div>

</div>
@endsection