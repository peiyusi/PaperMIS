@extends('layouts.heads')
@section('action')

<body data-type="generalComponents">
        <div class="tpl-content-wrapper">
            <div class="tpl-content-page-title">
                论文审核 
            </div>
           <hr>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">

                    </div>
                    <div class="tpl-portlet-input tpl-fz-ml">
                        <div class="portlet-input input-small input-inline">
                            <div class="input-icon right">
                        </div>
                    </div>
                </div>
                       <div class="am-g">
                        <div class="am-u-sm-12">
                                <table class="am-table am-table-striped am-table-hover table-main">
                                    <thead>
                                        <tr>
                                            <th class="table-title">姓名</th>
                                            <th class="table-author am-hide-sm-only">班级</th>
                                            <th class="table-title">学号</th>
                                            <th class="table-title">手机</th>
                                            <th class="table-title">论文</th>
                                            <th class="table-title">状态</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student) 
                                        <tr>
                                            <td>{{$student->name}}</td>
                                            <td>{{$student->class}}</td>
                                            <td>{{$student->student_number}}</td>
                                            <td>{{$student->telephone}}</td>
                                            <td>{{$student->paper}}</td>
                                            <td>{{$student->pivot->approve ? "通过" : "审核"}}</td>
                                            <td>
                                                <div class="am-btn-toolbar">
                                                    <div class="am-btn-group am-btn-group-xs">

                                                        <form action="/admin/teacher/download" method="post">
                                                        {{ csrf_field() }}
                                                            <input type="hidden" name="sid" value="{{$student->id}}" />
                                                            <button class="am-btn am-btn-success am-btn-xs am-text-success">
                                                            <i class="am-icon-cloud-download"></i>
                                                              下载
                                                            </button>
                                                            
                                                        </form>

                                                        <form action="/admin/teacher/paperJudge" method="post">
                                                        {{ csrf_field() }}
                                                            <input type="hidden" name="sid" value="{{$student->id}}" />
                                                            @if ($student->pivot->approve == 1)
                                                            <button type="submit" class="am-btn am-btn-danger am-btn-xs am-text-danger"><span class="am-icon-pencil-square-o"></span>撤销</button>
                                                            @else
                                                            <button type="submit" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span>通过</button>
                                                            @endif
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            <!--    <div class="am-cf">

                                    <div class="am-fr">
                                        <ul class="am-pagination tpl-pagination">
                                            <li class="am-disabled"><a href="#">«</a></li>
                                            <li class="am-active"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#">5</a></li>
                                            <li><a href="#">»</a></li>
                                        </ul>
                                    </div>
                                </div>  -->
                                <hr>

                        </div>

                    </div>
                </div>
                <div class="tpl-alert"></div>
            </div>



        </div>

    </div>

</body>
@endsection
