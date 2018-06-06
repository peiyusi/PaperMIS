@extends('layouts.head')

@section('action')
       <style>
            .full-height {
                height: 100vh;
            }   

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }   

            .position-ref {
                position: relative;
            }   

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    Welcome to School Mane
                </div>

            </div>
        </div>
    </body>
@endsection
