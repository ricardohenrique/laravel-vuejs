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
                        <div class="alert alert-success">
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
							<tr>
								<th>1</th> 
								<td>Ricardo</td> 
								<td>Mota</td> 
								<td>01/02/1995</td> 
								<td>02/03/1888</td> 
								<td>M</td> 
							</tr> 
						</tbody> 
					</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
