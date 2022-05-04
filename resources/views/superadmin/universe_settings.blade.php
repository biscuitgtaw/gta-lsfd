@extends('master.app')

@section('title', 'Universe Settings')
@section('breadcrumb', 'Home>Superadmin>Universe Settings')

@section('content')
<div id="content-page" class="content-page">

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <code class="codeblock">

                	{{ session('universe') }} => [
						'enabled' => {{ $constants['universes'][session('universe')]['enabled'] }},
						'display_id' => {{ $constants['universes'][session('universe')]['display_id'] }},
						'name' => '{{ $constants['universes'][session('universe')]['name'] }}',
                        'features' => [
                            'superadmin' => {{ $constants['universes'][session('universe')]['features']['superadmin'] }},
                            'administration' => {{ $constants['universes'][session('universe')]['features']['administration'] }},
                        ]
					]

				</code>
            </div>
        </div>

    </div>

</div>
@endsection