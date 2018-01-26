@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard > Funcionarios > Cadastro</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ url('dashboard/employees') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col-md-4 control-label">Primeiro nome</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="col-md-4 control-label">Último nome</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('birth_date') ? ' has-error' : '' }}">
                            <label for="birth_date" class="col-md-4 control-label">Data de nascimento</label>

                            <div class="col-md-6">
                                <input id="birth_date" type="date" class="form-control" name="birth_date" value="{{ old('birth_date') }}" required>

                                @if ($errors->has('birth_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birth_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('hire_date') ? ' has-error' : '' }}">
                            <label for="hire_date" class="col-md-4 control-label">Data de contratação</label>

                            <div class="col-md-6">
                                <input id="hire_date" type="date" class="form-control" name="hire_date" value="{{ old('hire_date') }}" required>

                                @if ($errors->has('hire_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hire_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-4 control-label">Sexo</label>

                            <div class="col-md-6">
                                <!-- <input value="{{ old('gender') }}" > -->
                                <select id="gender" name="gender" class="form-control" required>
                                    <option>M</option>
                                    <option>F</option>
                                </select>

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <hr>

                        <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                            <label for="department" class="col-md-4 control-label">Departamento</label>

                            <div class="col-md-6">
                                <select id="department" name="department" class="form-control" required>
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('department'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('salary') ? ' has-error' : '' }}">
                            <label for="salary" class="col-md-4 control-label">Salário</label>

                            <div class="col-md-6">
                                <input id="salary" type="number" class="form-control" name="salary" value="{{ old('salary') }}" required>

                                @if ($errors->has('salary'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('salary') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Título</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Cadastrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
