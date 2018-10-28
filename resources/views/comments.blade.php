<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>


    <title>Comment</title>
    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- END META -->

    <!-- BEGIN STYLESHEETS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet'
          type='text/css'/>
    <link type="text/css" rel="stylesheet" href="/assets/css/theme-default/bootstrap.css?1422792965"/>
    <link type="text/css" rel="stylesheet" href="/assets/css/theme-default/materialadmin.css?1425466319"/>
    <link type="text/css" rel="stylesheet" href="/assets/css/theme-default/font-awesome.min.css?1422529194"/>
    <link type="text/css" rel="stylesheet"
          href="/assets/css/theme-default/material-design-iconic-font.min.css?1421434286"/>
    <!-- END STYLESHEETS -->


</head>
<body>
<!-- BEGIN HEADER-->
<header id="header" class="header-inverse ">
    <div class="headerbar">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="headerbar-left">
            <ul class="header-nav header-nav-options">
                <li class="header-nav-brand">
                    <div class="brand-holder">
                        <a href="#">
                            <span class="text-lg text-bold text-primary">Comment Task</span>
                        </a>
                    </div>
                </li>

            </ul>
        </div>


    </div>
</header>
<!-- END HEADER-->

<!-- BEGIN BASE-->
<div id="base">


    <!-- BEGIN CONTENT-->
    <div id="content">
        <section>

            <div class="section-body contain-lg">


                <!-- BEGIN COMMENTS -->
                <div class="row">
                    <div class="col-md-9">

                        <div id="comment-container">
                            @include('content')

                        </div>
                        <br/>
                        <button class="btn btn-primary btn-raised center-block btn-add-comment" data-parent="0" data-toggle="modal"
                                data-target="#commentModal">Add Comment
                        </button>

                        <br/>
                    </div><!--end .col -->
                </div><!--end .row -->
                <!-- END COMMENTS -->


            </div><!--end .section-body -->
        </section>
    </div><!--end #content-->
    <!-- END CONTENT -->

    <!-- BEGIN SIMPLE MODAL MARKUP -->
    <div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="simpleModalLabel">Leave a comment</h4>
                </div>
                <form class="form-horizontal addCommentForm form-validate" role="form" method="POST"
                      id="addCommentModalForm" action="/comments">
                    @csrf
                    <input type="hidden" value="0" name="parent_id" id="parent_id">

                    <div class="modal-body">

                        <div class="form-group">
                            <div class="col-md-2">
                                <label for="name" class="control-label">Name</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" id="owner_name" name="owner_name"
                                       class="form-control control-width-normal" placeholder="Name"
                                       required data-rule-minlength="2">


                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-2">
                                <label for="textarea1" class="control-label">Comment</label>
                            </div>
                            <div class="col-md-10">
                                <textarea name="body" id="body" required data-rule-minlength="1"
                                          class="form-control autosize" rows="5"
                                          placeholder="Leave a comment"></textarea>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Post comment</button>
                    </div>

                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- END SIMPLE MODAL MARKUP -->

</div><!--end #base-->
<!-- END BASE -->


<!-- BEGIN JAVASCRIPT -->
<script src="/assets/js/jquery/jquery-1.11.2.min.js"></script>
<script src="/assets/js/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="/assets/js/bootstrap/bootstrap.min.js"></script>
<script src="/assets/js/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="/assets/js/jquery-validation/dist/additional-methods.min.js"></script>


<script src="/assets/js/app.js"></script>

<!-- END JAVASCRIPT -->
</body>
</html>
