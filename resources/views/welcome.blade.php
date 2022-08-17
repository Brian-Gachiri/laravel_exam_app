@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center mt-5">
            <h1 class="text-primary">Exams</h1>

            <div class="col-lg-12 mt-3">

                <div class="card">
                    <div class="card-body">

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($exams as $exam)
                                <tr>
                                    <td>#{{$exam->id}}</td>
                                    <td><a href="{{route("exam.details", ['id'=> $exam->id])}}">{{$exam->name}}</a></td>
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
