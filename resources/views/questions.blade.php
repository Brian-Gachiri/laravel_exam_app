@extends('layouts.app')

@section('content')

    <div class="container">

        <a href="/" class="mt-3 btn btn-dark border-0"><i class="bi bi-arrow-left"></i>     Back</a>
        <h2 class="text-primary mt-4">Exam: {{$exam->name}}</h2>
        <div class="row justify-content-center mt-3">

            <div class="col-lg-6">

                <h4>Add Question</h4>
                <hr>

                <div class="card">
                    <div class="card-body">
                        <form id="question_form">
                            @csrf

                            <input name="exam" value="{{$exam->id}}" type="hidden">
                            <div class="mb-3">
                                <label for="question">Question</label>
                                <textarea class="form-control" name="question"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="inputState">Category</label>

                                <select id="inputState" name="category_id" class="form-control">
                                    <option selected>Choose a category:</option>

                                    @foreach ($categories as $category)

                                        <option value="{{$category->id}}">{{$category->name}}</option>


                                    @endforeach

                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="choice_1">Choice 1</label>
                                <textarea class="form-control" name="choice_1"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="choice_2">Choice 2</label>
                                <textarea class="form-control" name="choice_2"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="choice_3">Choice 3</label>
                                <textarea class="form-control" name="choice_3"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="choice_4">Choice 4</label>
                                <textarea class="form-control" name="choice_4"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Add Question</button>
                        </form>

                    </div>
                </div>
            </div>


            <div class="col-lg-6">

                <h4 class="font-weight-bold">Exam Questions</h4>

                <hr>

                @foreach($questions as $question)

                    <div class="card mt-3">
                        <div class="card-body">
                            <span class="badge bg-primary">{{$question->category->name}}</span>
                            <h5>{{$question->question}}?</h5>
                            <ol type="a">
                                <li>{{$question->choice_1}}</li>
                                <li>{{$question->choice_2}}</li>
                                <li>{{$question->choice_3}}</li>
                                <li>{{$question->choice_4}}</li>
                            </ol>

                            <div class="d-flex flex-row">
                                <a href="#" class="btn btn-outline-primary btn-sm">Edit</a>
                                <button onclick="delete_question('{{$question->id}}')" class="btn btn-outline-danger btn-sm mx-2">Remove</button>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>

        </div>

    </div>

@endsection

@section('scripts')

    <script>

        function delete_question(id){
            if(confirm("Are you sure you want to remove this question?")){
                $.ajax({
                    method: "GET",
                    dataType: "json",
                    url:'/exam/remove/question/'+id,
                    success: function (data){
                        console.log(data);
                        window.location.reload();
                    },
                    error: function (data){
                        console.log(data)
                    }
                })
            }
        }

        $(document).ready(function (){

            $("#question_form").on("submit", function (e){
                e.preventDefault();

                $.ajax({
                    data: $("#question_form").serialize(),
                    method: "POST",
                    dataType: "json",
                    url:"{{route('create.question')}}",
                    success: function (data){
                        console.log(data);
                        window.location.reload();
                    },
                    error: function (data){
                        console.log(data)
                    }
                })
            });
        });
    </script>

@endsection
