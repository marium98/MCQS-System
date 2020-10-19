  <table border="2" class="table table-hover" id="users_table">
                        <thead>
                        <tr>
                        <td>Id</td>
                        <td>Question</td>
                      {{--   <td>Option 1</td>
                        <td>Option 2</td>
                        <td>Option 3</td>
                        <td>Option 4</td> --}}
                        <td>Correct Answer</td>
                        <td>Edit</td>
                        <td>Delete</td>
                        </tr>
                        </thead> --}}
                         @foreach ($questions as $question)
                        <tr class="table-warning">
                        <td>{{ $question->id }}</td>
                        <td>{{ $question->question_text }}</td>
                        @php
                        $filtered = $options->where('question_id', $question->id);
                            // print_r($filtered);exit;
                        @endphp
                            <?php foreach($filtered as $value) { ?>
                                <td> <?= $value['option_text']; ?></td>
                            <?php } ?>
                            <td>{{ $question->answer }}</td>
                        <td><a href="show/{{$question->id}}/edit" class="btn btn-primary">Edit</a></td>
                       <td> <form action="show/{{$question->id}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <input type="submit" value="Delete" class="btn btn-danger"> </td> </form>
                        </tr>
                        @endforeach
                        </table> 