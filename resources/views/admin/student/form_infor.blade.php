@extends('layouts.head')

@section('action')
<!-- "userid是" {{$uid}}-- >
<body data-type="generalComponents">
<div class="tpl-content-wrapper">
            <div class="tpl-content-page-title">
                学生论文管理系统
            </div>
            <ol class="am-breadcrumb">
                <li><a href="#" class="am-icon-home">首页</a></li>
                <li class="am-active">用户资料</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        详细资料
                    </div>
                    <div class="tpl-portlet-input tpl-fz-ml">
                        <div class="portlet-input input-small input-inline">
                            <div class="input-icon right">
                                
                            </div>
                        </div>
                    </div>


                </div>
                <div class="tpl-block ">

                    <div class="am-g tpl-amazeui-form">


                        <div class="am-u-sm-12 am-u-md-9">
							<form class="am-form am-form-horizontal" method="post" action="{{ url('student/form_infor') }}">
								{{ csrf_field() }}
                               <div class="am-form-group">
                                    <label for="user-email" class="am-u-sm-3 am-form-label" >电子邮件 / Email</label>
                                    <div class="am-u-sm-9">
                                        <input type="email" id="user-email" readonly="" autocomplete="off" disable value="">
                                    </div>
                                </div>
								
                                <input type="user_id" id="user_id"  name="Student[user_id]" value="{{$uid}}" style="display:none">

                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">真实姓名 / Name</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="Student[name]" id="user-name" value="" placeholder="真实姓名 / Name">
                                    </div>
                                </div>
                                
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">班级 / Class</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="Student[class]" value="" id="user-class" placeholder="班级 / Class">
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">学号 / Student Number</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="Student[student_number]" value="" id="student-number" placeholder="学号 / Student Number">
                                    </div>
                                </div>

                                 <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">性别 / Sex</label>
                                    <div class="am-u-sm-9">
                                        男<input type="radio" id="user-sex" value="男" name="Student[sex]" checked="checked">
                                        &nbsp;&nbsp;&nbsp;
                                        女<input type="radio" id="user-sex" value="女" name="Student[sex]" checked="checked">
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <div class="am-u-sm-9 am-u-sm-push-3">
                                        <button type="submit" class="am-btn am-btn-primary">保存修改</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
</div>

   
</body>
@endsection
