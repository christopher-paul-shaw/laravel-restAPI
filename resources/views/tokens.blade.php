@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">API Token</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

						<form method="post" action="/">
							@csrf
							<input type="text" name="name" /><button>Generate Token</button>
						</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
