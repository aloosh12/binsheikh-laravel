@extends('admin.template.layout')
@section('header')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" />

@stop
@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><strong>
                                @if ($id)
                                    Edit
                                @else
                                    Add
                                @endif Video
                            </strong></div>
                        <form method="post" id="admin-form" action="{{ url('admin/save_videos') }}"
                            enctype="multipart/form-data" data-parsley-validate="true">
                            <div class="card-body">
                                <input type="hidden" name="id" id="cid" value="{{ $id }}">
                                @csrf()

                                <div class="row">



                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Youtube Embed Link<b class="text-danger">&nbsp;</b></label>
                                            <input type="url" name="link" class="form-control" required    data-parsley-pattern="^https:\/\/www\.youtube\.com\/embed\/([a-zA-Z0-9_-]{11})(\?[\w=&]*)?$"
                                            data-parsley-pattern-message="Please enter a valid YouTube embed URL."
                                                data-parsley-required-message="Enter Embed Link" value="@if($id){{ $videos->link }} @endif">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="active" class="form-control">
                                                <option <?= ($id && $videos->active == 1) ? 'selected' : '' ?> value="1">Active</option>
                                                <option <?= ($id && $videos->active == 0) ? 'selected' : '' ?> value="0">Inactive
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <a href="{{url('admin/videos')}}" class="btn btn-secondary"  data-bs-dismiss="modal">{{__('Back')}}  </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.col-->
            </div>
            <!-- /.row-->
        </div>
    </div>

@stop
@section('script')

    <script>
        $('body').off('submit', '#admin-form');
        $('body').on('submit', '#admin-form', function(e) {
            e.preventDefault();
            var $form = $(this);
            var formData = new FormData(this);
            $(".invalid-feedback").remove();

            $form.find('button[type="submit"]')
                .text('Saving')
                .attr('disabled', true);


            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: $form.attr('action'),
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
                dataType: 'json',
                success: function(res) {

                    if (res['status'] == 0) {
                        if (typeof res['errors'] !== 'undefined' && res['errors']) {
                            var error_def = $.Deferred();
                            var error_index = 0;
                            jQuery.each(res['errors'], function(e_field, e_message) {
                                if (e_message != '') {
                                    $('[name="' + e_field + '"]').eq(0).addClass('is-invalid');
                                    $('<div class="invalid-feedback">' + e_message + '</div>')
                                        .insertAfter($('[name="' + e_field + '"]').eq(0));
                                    if (error_index == 0) {
                                        error_def.resolve();
                                    }
                                    error_index++;
                                }
                            });
                            error_def.done(function() {
                                var error = $form.find('.is-invalid').eq(0);
                                $('html, body').animate({
                                    scrollTop: (error.offset().top - 100),
                                }, 500);
                            });
                        } else {
                            var m = res['message'] ||
                                'Unable to save videos. Please try again later.';
                            show_msg(0, m)
                        }
                    } else {
                        var m = res['message'];
                        show_msg(1, m)
                        setTimeout(function() {
                            window.location.href = "{{ url('/admin/videos') }}";
                        }, 1500);

                    }

                    $form.find('button[type="submit"]')
                        .text('Save')
                        .attr('disabled', false);
                },
                error: function(e) {

                    $form.find('button[type="submit"]')
                        .text('Save')
                        .attr('disabled', false);
                    show_msg(0, e.responseText)
                }
            });
        });


    </script>

@stop
