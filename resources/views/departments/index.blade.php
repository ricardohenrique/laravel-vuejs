@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                	Dashboard > Departamentos
                	<a class="btn btn-info pull-right" href="{{ url('dashboard/departments/create') }}">Novo</a>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                        	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{ session('status') }}
                        </div>
                    @endif

					<table class="table"> 
						<caption>Lista de departamentos</caption> 
						<thead> 
							<tr> 
								<th>#</th> 
								<th>Nome</th> 
								<th>Ações</th>
							</tr> 
						</thead> 
						<tbody> 
							@foreach($departments as $department)
								<tr>
									<th>{{$department->id}}</th> 
									<td>{{$department->name}}</td> 
									<td>
										<a class="btn btn-info btn-xs pull-left" href='{{url("dashboard/departments/$department->id/edit")}}'>Editar</a>
										<form class="form-horizontal" method="POST" action='{{ url("dashboard/departments/$department->id") }}' >
				                        	{{ csrf_field() }}
				                        	<input type="hidden" name="_method" value="DELETE">
				                        	<button class="btn btn-danger btn-xs pull-left" href='{{url("dashboard/departments/$department->id/edit")}}'>Excluir</button>
				                        </form>
									</td>
								</tr> 
							@endforeach
						</tbody> 
					</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
