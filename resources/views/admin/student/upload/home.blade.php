@extends('layouts.head')
@section('action')

<body data-type="generalComponents">
     <div class="tpl-content-wrapper">
        <div class="tpl-portlet-components"> 
          <form action="/admin/student/papers" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="am-form-group am-form-file">
                  <button type="button" class="am-btn am-btn-success am-round">
                  <i class="am-icon-plus"></i>
                  选择 
                  </button>
                  <input type="file" name="paper">
            </div>
                  <button type="submit" class="am-btn am-btn-danger am-round">
                  <i class="am-icon-cloud-upload am-icon-spin"></i>
                  提交
          </form>
        </div>
       <div>
            <section class="am-panel am-panel-default">
              <header class="am-panel-hd">
                <h3 class="am-panel-title">我的论文</h3>
                @if ($approve == 1) 
                <h4><span class="am-icon-check-square-o"></span> 通过</h4>
                @else
                <h4><span class="am-icon-paper-plane-o"></span> 审核</h4>
                @endif
              </header>
              <div class="am-panel-bd">
              {{$filename}}
              </div>
              <button class="am-btn am-btn-primary am-btn-sm" onclick="window.location.href='{{url('admin/student/papers/create')}}'">下载</button>
            </section>
       </div>
     </div>
</body>



@endsection

             
