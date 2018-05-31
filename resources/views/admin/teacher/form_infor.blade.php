@extends('layouts.heads')

@section('action')
       <div class="tpl-content-wrapper">
            <div class="tpl-content-page-title">
				学生论文管理系统
            </div>
            <ol class="am-breadcrumb">
                <li><a href="#" class="am-icon-home">首页</a></li>
                <li class="am-active">用户信息</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
						详细信息
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
                            <form class="am-form am-form-horizontal" method="post" action="{{ url('teacher/save')}}">
								{{ csrf_field() }}
                               <div class="am-form-group">
                                    <label for="user-email" class="am-u-sm-3 am-form-label" >电子邮箱/ Email</label>
                                    <div class="am-u-sm-9">
                                        <input type="email" id="user-email" readonly="" autocomplete="off" disable value="">
                                    </div>
                                </div>
								
								
                                <input type="user_id" id="user_id" name="Teacher[user_id]" value="{{$uid}}" style="display:none">

                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">真实姓名/ Name</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" id="user-name" name="Teacher[name]" placeholder="真实姓名 / Name">
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">电话 / Telephone</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" id="telephone" name="Teacher[telephone]" placeholder="电话 / Telephone">
									</div>
								</div>

                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">职称/  professional title</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" id="pro-title" name="Teacher[pro_title]" placeholder="职称 /  professional title">
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


@endsection
