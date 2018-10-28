@if(count($comments) > 0)
    <button class="btn btn-primary btn-raised center-block btn-add-comment" data-parent="0" data-toggle="modal" data-target="#commentModal">Add
        Comment
    </button>

    <br/>

    <ul class="list-comments">
        @foreach($comments as $comment)
            <li>
                <div class="card">
                    <div class="comment-avatar"><img class="img-circle" src="assets/img/avatar1.jpg?1403934956"
                                                     alt=""/>
                    </div>
                    <div class="card-body">
                        <h4 class="comment-title">{{$comment->owner_name}}
                            <small>{{$comment->created_at}}</small>
                        </h4>
                        <button class="btn btn-default-dark stick-top-right reply"
                                data-parent={{$comment->id}} data-toggle="modal" data-target="#commentModal">Reply
                        </button>
                        <p>{{$comment->body}}</p>
                    </div>
                </div><!--end .card -->


                @if($comment->sub_comments)
                    <ul>

                        @foreach($comment->sub_comments as $sub_comment)
                            <li>
                                <div class="card ">
                                    <div class="comment-avatar"><img class="img-circle"
                                                                     src="assets/img/avatar1.jpg?1403934956"
                                                                     alt=""/>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="comment-title">{{$sub_comment->owner_name}}
                                            <small>{{$sub_comment->created_at}}</small>
                                        </h4>
                                        <button class="btn btn-default-dark stick-top-right reply"
                                                data-parent={{$sub_comment->id}} data-toggle="modal"
                                                data-target="#commentModal">Reply
                                        </button>
                                        <p>{{$sub_comment->body}}</p>
                                    </div>
                                </div><!--end .card -->

                                @if($sub_comment->sub_comments)
                                    <ul>

                                        @foreach($sub_comment->sub_comments as $sub_comment2)
                                            <li>
                                                <div class="card">
                                                    <div class="comment-avatar"><img class="img-circle"
                                                                                     src="assets/img/avatar1.jpg?1404026449"
                                                                                     alt=""/></div>
                                                    <div class="card-body">
                                                        <h4 class="comment-title">{{$sub_comment2->owner_name}}
                                                            <small>{{$sub_comment2->created_at}}</small>
                                                        </h4>
                                                        <button class="btn btn-default-dark stick-top-right reply"
                                                                data-parent={{$sub_comment->id}} data-toggle="modal"
                                                                data-target="#commentModal">Reply
                                                        </button>
                                                        <p>{{$sub_comment2->body}}</p>
                                                    </div>
                                                </div><!--end .card -->
                                            </li><!-- end sub-sub-comment -->

                                        @endforeach

                                    </ul>
                                @endif

                            </li><!-- end sub-comment -->

                        @endforeach

                    </ul>

                @endif

            </li><!-- end comment -->


        @endforeach
    </ul>

@endif




