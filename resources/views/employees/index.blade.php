@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                	Dashboard > Funcionarios
                	<a class="btn btn-info pull-right" href="{{ url('dashboard/employees/create') }}">Novo</a>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                        	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{ session('status') }}
                        </div>
                    @endif

					<table class="table"> 
						<caption>Lista de funcionários</caption> 
						<thead> 
							<tr> 
								<th>#</th> 
								<th>Primeiro nome</th> 
								<th>Último nome</th>
								<th>Data de contratação</th> 
								<th>Data de nascimento</th> 
								<th>Sexo</th>
								<th>Salário</th>
								<th>Título</th>
								<th>Ações</th>
							</tr> 
						</thead> 
						<tbody> 
							@foreach($employees as $employe)
								<tr>
									<th>{{$employe->id}}</th> 
									<td>{{$employe->first_name}}</td> 
									<td>{{$employe->last_name}}</td> 
									<td>{{$employe->hire_date}}</td> 
									<td>{{$employe->birth_date}}</td> 
									<td>{{$employe->gender}}</td> 
									<td>{{$employe->salary->salary}}</td> 
									<td>{{$employe->title->title}}</td> 
									<td>
										<a class="btn btn-info btn-xs pull-left" href='{{url("dashboard/employees/$employe->id/edit")}}'>Editar</a>
										<form class="form-horizontal" method="POST" action='{{ url("dashboard/employees/$employe->id") }}' >
				                        	{{ csrf_field() }}
				                        	<input type="hidden" name="_method" value="DELETE">
				                        	<button class="btn btn-danger btn-xs pull-left" href='{{url("dashboard/employees/$employe->id/edit")}}'>Excluir</button>
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
