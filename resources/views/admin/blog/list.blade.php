@extends('admin.template.layout')

@section('header')

@stop

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><i class="fa fa-align-justify"></i> Blog List</div>
                        <div class="card-body">
                            <form action="" method="get">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Title</label>
                                            <input class="form-control filter_1" name="search_text" value="{{$search_text}}">
                                        </div>
                                    </div>


                                    <div class="col-md-3" style="margin-top: 1.8rem !important;">
                                        <button class="btn btn-primary" type="submit">Filter</button>
                                            <a href="{{ url('admin/blog') }}" class="btn btn-success dt_tables_filter_button" data-tid="dt-tbl"
                                            type="button">Reset</a>
                                    </div>
                                </div>
                            </form>
                            <button class="btn btn-primary mb-3"
                                onclick="location.href='{{ url('admin/blog/create') }}'"><i class="fas fa-plus"></i>
                                Create Blog</button>

                            <table class="table table-responsive-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Title Ar</th>
                                        <th>Folder</th>
                                        <th>Is Active</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    @foreach ($cat as $c)
                                        <?php
                                        $i++;
                                        $checked = $c->active ? 'checked' : '';
                                        ?>
                                        <tr role="row">
                                            <td class="trVOE">{{ $i }}</td>
                                            <td class="trVOE">{{ $c->name }}</td>
                                            <td class="trVOE">{{ $c->name_ar }}</td>
                                            <td class="trVOE">{{ $c->folder->title ?? '' }}</td>

                                            <td>
                                                <input class="toggle_status"
                                                    data-url="{{ url('admin/blog/change_status') }}" type="checkbox"
                                                    {{ $checked }} data-id="{{ $c->id }}" data-toggle="toggle"
                                                    data-on="Yes" data-off="No" data-onstyle="success"
                                                    data-offstyle="danger">

                                            </td>


                                            <td class="trVOE">
                                                {{ web_date_in_timezone($c->created_at, 'd-M-Y h:i A') }}</td>

                                            <td>
                                                <a class="btn btn-outline-info active" title="Edit"
                                                    href="{{ url('admin/blog/edit/' . $c->id) }}"
                                                    aria-hidden="true"><i class="fas fa-edit fa-1x"></i></a>
                                                &nbsp;
                                                <a href="{{ url('admin/blog/delete/' . $c->id) }}"
                                                    class="btn btn-outline-danger active deleteListItem" data-role="unlink"
                                                    data-message="Do you want to remove this blog?" title="Delete"
                                                    aria-hidden="true"><i class="fas fa-trash-alt fa-1x"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')

@stop
