@extends('layouts.head')
@section('action')

<body data-type="generalComponents">
        <div class="tpl-content-wrapper">
            <div class="tpl-content-page-title">
                选择老师
            </div>
            <ol class="am-breadcrumb">
                <li><a href="#" class="am-icon-home">首页</a></li>
                <li><a href="#">Amaze UI CSS</a></li>
                <li class="am-active">文字列表</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">

                    </div>
                    <div class="tpl-portlet-input tpl-fz-ml">
                        <div class="portlet-input input-small input-inline">
                            <div class="input-icon right">
                                <i class="am-icon-search"></i>
                                <input type="text" class="form-control form-control-solid" placeholder="搜索..."> </div>
                        </div>
                    </div>
                </div>
                       <div class="am-g">
                        <div class="am-u-sm-12">
                            <form class="am-form">
                                <table class="am-table am-table-striped  am-table-hover table-main ">
                                    <thead>
                                        <tr>
                                            <th class="table-title">姓名</th>
                                            <th class="table-author am-hide-sm-only">手机</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($teachers as $teacher)
                                        <tr>
                                            <td>{{$teacher->name}}</td>
                                            <td class="am-hide-sm-only">{{$teacher->telephone}}</td>
                                            <td>
                                                <div class="am-btn-toolbar">
                                                    <form action="/admin/student/selectTeacher" method="POST">
                                                    {{ csrf_field() }}
                                                        <input type="hidden" name="tid" value="{{$teacher->id}}" />
                                                        <button type="submit" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span>选择</button>
                                                    </form> 
                                                </div>
                                            </td>
                                        </tr>
                                   @endforeach
                                    </tbody>
                                </table>
                                <div class="am-cf">
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
                                </div>
                                <hr>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tpl-alert"></div>
            </div>
        </div>
    </div>
</body>
@endsection
