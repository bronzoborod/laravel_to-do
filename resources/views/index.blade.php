@extends('layouts.app')
@section('content')
    <div class="panel-body">
        @include('common.errors')
        <form action="{{ url('task') }}" method="POST" class="form-horizontal">
            {{csrf_field()}}
            <div class="form-group">
                <label for="task-name" class="col-sm-3 control-label">Задача</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i>Добавить задачу
                    </button>
                </div>
            </div>
        </form>
    </div>
    @if (count($tasks)>0)
        <div class="card card-default">
            <div class="panel-heading">
                Текущие задачи:
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                    <th>Task</th>
                    <th></th>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td class="table-text">
                                <div>{{$task->name}}</div>
                            </td>
                            <td>
                                <form action="{{url('task/'.$task->id)}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>Удалить
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
