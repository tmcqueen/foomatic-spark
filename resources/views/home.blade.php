@extends('spark::layouts.app')

@section('content')
<home :user="user" inline-template>
    <div class="container">
        <!-- Application Dashboard -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <a href="/settings#/subscription" class="btn btn-lg btn-primary">Add a Subscription</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</home>
@endsection
