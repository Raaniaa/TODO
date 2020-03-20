@extends('layout.app')
@section('title' , 'All todos')
@section('content')
   <div class="container">
        <div class="row pt-3 justify-content-center">
            <div class="card" style="width:50%">
       <div class="card-header text-center">
            <h1>All Todos</h1>
            </div>
                @if (session()->has('success'))
                <div class="alert alert-success">
                {{session()->get('success')}}
                </div>
                @endif
            <div class="card-body">
                <ul class="list-group">
                @forelse($todos as $todo)
                    <li class="list-group-item text-muted ">
                    {{ $todo -> title }}
                        <span class="float-right">
                        <a href ="/todos/{{$todo->id}}/delete" style="color:#e40c21">
                            <i class="fas fa-trash-alt"></i>
                            </a>
                        </span>
                        <span class="float-right mr-2">
                        <a href ="/todos/{{$todo->id}}/edit" style="color:#27cc4c" >
                           <i class="far fa-edit"></i>
                            </a>
                        </span>
                        <span class="float-right mr-2">
                        <a href ="/todos/{{$todo->id}}" style="color:#a6a6e6">
                           <i class="fas fa-eye"></i>
                            </a>
                        </span>
                        @if (!$todo->completed)
                        <span class="float-right mr-2">
                        <a href ="/todos/{{$todo->id}}/complete" style="color:#d39e00">
                           <i class="far fa-check-square"></i>
                            </a>
                        </span>
                        @endif
                    </li>
                    @empty
                    <p class="text-center">No todos</p>
                    @endforelse
                </ul>
            </div>
                </div>
       </div>
        </div>
@endsection

