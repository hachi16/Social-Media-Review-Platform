@extends('layouts.app') @section('content')
<div id="page-wrapper">
  @if(Session::has('message'))
  <p class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissable">{{ Session::get('message') }}</p>
  @endif
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
              <div class="col-sm-6">
                Hashtags
              </div>
              <div class="col-sm-6">
                <a href= "{{ url('/hashtags/create') }}"><button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Add More Hashtags</button></a>
              </div>
            </div>
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
              <div class="row">
                <div class="col-sm-12">
                  <table width="100%" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" style="width: 100%;">
                    <thead>
                      <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 102px;">Hashtag Name</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 126px;">Linked Handled Name</th>
                         <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 126px;">Linked Handled</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 86px;">Remove</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(count($hashtags)) 
                        @foreach($hashtags as $index => $hashtag)
                          <tr class="gradeA odd" role="row">
                            <td class="sorting_1">
                              <a href="{{ url('hashtags/'.$hashtag->id) }}">{{ $hashtag->name }}</a>
                            </td>
                            <td>{{ $hashtag->handle_name }}</td>
                            <td>{{ $hashtag->handle }}</td>
                            <td class="center">
                              <a href="{{ url('hashtags/'.$hashtag->id.'/edit') }}"><span><i class="fa fa-pencil-square-o fa-fw"></i></span></a>
                              <a href="{{ url('hashtags/'.$hashtag->id.'/delete') }}""><span><i class="fa fa-trash-o fa-fw"></i></span></a>
                            </td>
                          </tr>
                        @endforeach 
                      @else
                      <tr class="gradeA odd" role="row">
                        <td colspan="4">No data available</td>
                      </tr>
                      @endif
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="dataTables_info" id="dataTables-example_info" role="status" aria-live="polite">Showing {{ $hashtags->firstItem() }} to {{ $hashtags->lastItem() }} of {{ $hashtags->total() }} entries </div>
                </div>
                <div class="col-sm-8">
                  <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                    {{ $hashtags->links() }}
                  </div>
                </div>
              </div>
            </div>
            <!-- /.table-responsive -->
          </div>
          <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
  </div>
</div>
@endsection