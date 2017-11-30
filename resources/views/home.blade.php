@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  @include('inc.messages')
                    <button
                    type="button"
                    class="btn btn-primary btn-lg"
                    data-toggle="modal"
                    data-target="#addModal"
                    name="button">
                    Add Bookmark</button>
                    <h3>My Bookmarks</h3>
                    <ul class="list-group">
                      @foreach ($bookmarks as $bookmark)
                        <li class="list-group-item clearfix">
                          <a href="{{$bookmark->url}}" target="_blank" style="position:absolute;top:30%">{{$bookmark->name}} <span class="label label-default">{{$bookmark->description}}</span></a>
                          <span class="pull-right button-group">
                            <button data-id="{{$bookmark->id}}" type="button" name="button" class="delete-bookmark btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Delete</button>
                          </span>
                        </li>
                      @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="addModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add a Bookmark</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('bookmarks.store')}}" method="post">
          {{csrf_field()}}
          <div class="form-group">
            <label for="">Bookmark Name</label>
            <input type="text" name="name" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Website URL</label>
            <input type="text" name="url" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Bookmark Description</label>
            <textarea name="description" class="form-control"></textarea>
          </div>
          <input type="submit" name="submit" value="Submit" class="btn btn-success">
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection
