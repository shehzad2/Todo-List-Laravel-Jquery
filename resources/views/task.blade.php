@extends('layout/master')
@section('content')
    <div class="dv_task_list_header">
        <div class="container">
            <h4>task list </h4>
        </div>
    </div>
    <div class="dv_table_wrapper">
        <div class="container">
            <div class="table-responsive">
                <table class="table table-bordered dv_task_table">
                    <thead>
                        <tr>
                            <th>Task</th>
                            <th>Description </th>
                            <th>Status </th>
                            <th>Action </th>
                        </tr>
                    </thead>
                    <tbody id="add-table">
                        @if(!empty($getTask))
                        @foreach($getTask as $task)
                        <tr>
                            <td>{{$task->title}}</td>
                            <td>{{$task->description}}</td>
                            <td id="{{$task->_id}}">
                                 @if($task->status == 1)
                                    <span class="dv_working_task">  Created </span>
                                @elseif($task->status == 2)
                                   <span class="dv_finish_task"> Finish </span>
                                    @elseif($task->status == 3)
                                    <span class="dv_working_task">Working</span>
                                    @elseif($task->status == 4)
                                    <span class="dv_cancel_task">Cancel</span>
                                    @elseif($task->status == 5)
                                    <span class="dv_delete_task">Delete</span>
                                    @endif
                           </td>
                            <td>
                                <div class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown">
										View
									</a>
                                    <div class="dropdown-menu dv_table_action_dropdown">
                                        <a class="dropdown-item"  href="javascript:void(0)" onclick="changeStatus(2,'{{$task->_id}}')">Finish </a>
                                        <a class="dropdown-item"  href="javascript:void(0)" onclick="changeStatus(3,'{{$task->_id}}')">Working </a>
                                        <a class="dropdown-item"  href="javascript:void(0)" onclick="changeStatus(4,'{{$task->_id}}')">Cancel </a>
                                        <a class="dropdown-item"  href="javascript:void(0)" onclick="changeStatus(5,'{{$task->_id}}')">Delete </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="add_new_task">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Task </h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                    <form class="add-task-form" id="submit" action="{{Lib::asset('/save-add-task')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="text-uppercase">Task Name </label>
                        <input type="text" class="form-control dv_input_field" placeholder="" name="title"  data-validation="required"> 
                    </div>
					<div class="form-group">
                        <label for="exampleInputEmail1" class="text-uppercase">Task Description </label>
                        <textarea class="form-control dv_input_field" cols="30" rows="10" style="width: 100%;" name="description"  data-validation="required"></textarea>
                    </div> 
                    <div class="form-group">
                        <button type="submit" class="btn btn-login btn-block float-right">Submit</button>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">
                $(document).on('submit','#submit',function(event) {
                    event.preventDefault();
                     var post_url = $(this).attr("action");
                        var request_method = $(this).attr("method"); 
                        var form_data = new FormData(this); 
                        $.ajax({
                            url : post_url,
                            type: request_method,
                            data : form_data,
                            contentType: false,
                            cache: false,
                            processData:false,
                        success:function(response){  
                          var html = '';
                          $.each(response,function(key,value){
                            html += '<tr >';
                            html += '<td>'+value.title+'</td>';
                            html += '<td>'+value.description+'</td>';
                            html += '<td id="'+value._id+'">';
                            if(value.status == 1){
                            html += '<span class="dv_working_task">Created</span>';
                            }else if(value.status == 2){
                            html += '<span class="dv_finish_task">Finish</span>'; 
                            }else if(value.status == 3){
                            html += '<span class="dv_working_task">Working</span>'; 
                            }else if(value.status == 4){
                            html += '<span class="dv_cancel_task">Cancel</span>'; 
                            }else if(value.status == 5){
                            html += '<span class="dv_delete_task">Delete</span>'; 
                            }
                            html += '</td>';
                            html += '<td>';
                            html += '<div class="dropdown">';
                            html += '<a class="dropdown-toggle" data-toggle="dropdown">';
                            html += 'View';
                            html += '</a>';
                            html += '<div class="dropdown-menu dv_table_action_dropdown">';
                            html += '<a class="dropdown-item" href="javascript:void(0)" onclick="changeStatus(2,\''+value._id+'\')">Finish </a>';
                            html += '<a class="dropdown-item" href="javascript:void(0)" onclick="changeStatus(3,\''+value._id+'\')">Working </a>';
                            html += '<a class="dropdown-item" href="javascript:void(0)" onclick="changeStatus(4,\''+value._id+'\')">Cancel </a>';
                            html += '<a class="dropdown-item" href="javascript:void(0)" onclick="changeStatus(5,\''+value._id+'\')">Delete </a>';
                            html += '</div>';
                            html += '</div>';
                            html += '</td>';
                            html += '</tr>';
                          });
                        $('#add_new_task').modal('hide');
                        $('#add-table').html(html);
                        }
                    });
                });
        </script>
        <script type="text/javascript">
            function changeStatus(status,_id){
                $.ajax({
                    url:"{{Lib::asset('/change-status')}}",
                    type:"post",
                    data:{'_id':_id,'status':status,'_token':'{{csrf_token()}}'},
                    success:function(response){
                        var html = '';
                          if(response.status == 1){
                            html += '<span class="dv_working_task">Created</span>';
                            }else if(response.status == 2){
                            html += '<span class="dv_finish_task">Finish</span>'; 
                            }else if(response.status == 3){
                            html += '<span class="dv_working_task">Working</span>'; 
                            }else if(response.status == 4){
                            html += '<span class="dv_cancel_task">Cancel</span>'; 
                            }else if(response.status == 5){
                            html += '<span class="dv_delete_task">Delete</span>'; 
                            }
                        $('#'+response._id).html(html);
                    }
                })
            }
        </script>
@endsection