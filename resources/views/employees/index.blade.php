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
							</tr> 
						</thead> 
						<tbody> 
							@foreach($employees as $emploey)
								<tr>
									<th>{{$emploey->id}}</th> 
									<td>{{$emploey->first_name}}</td> 
									<td>{{$emploey->last_name}}</td> 
									<td>{{$emploey->hire_date}}</td> 
									<td>{{$emploey->birth_date}}</td> 
									<td>{{$emploey->gender}}</td> 
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
