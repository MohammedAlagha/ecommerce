@extends('layouts.admin.app')

@section('title','SubCategories');


@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item active">الأقسام الفرعية
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form">عرض الأقسام الفرعية</h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                @include('admin.includes.alerts.success')
                                @include('admin.includes.alerts.errors')
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <table id="table1" class="table" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th class="th-sm">id
                                                </th>
                                                <th class="th-sm">name
                                                </th>
                                                <th class="th-sm">parent
                                                </th>
                                                <th class="th-sm">slug
                                                </th>
                                                <th class="th-sm">status
                                                </th>
                                                <th class="th-sm">updated_at
                                                </th>
                                                <th class="th-sm">created_at
                                                </th>
                                                <th class="th-sm" style="width: 30%">action
                                                </th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

@endsection

@section('script')

<script>

    jQuery(document).ready(function() {
        "use strict";
        var table = jQuery('#table1').DataTable({     //For making the table and I give it name to call it
            serverSide: true,
            processing: true,
            ajax: {
                "url": "{{route('admin.subCategories.data')}}",

            },
            columns: [
                {data: 'id'},
                {data: 'name'},
                {data: 'parent'},
                {data: 'slug'},
                {data: 'status'},
                {data: 'updated_at'},
                {data: 'created_at'},
                {data: 'action', orderable: false, searchable: false},
            ]
        });
    })

    $(document).on('click','.delete',function(e){

        e.preventDefault();
        let url = $(this).data('url');
        let n =  new Noty({
            theme:'sunset',
            type:'alert',
            layout:'topRight',
            text:"هل أنت متأكد",
            killer:true,
            buttons:[
                Noty.button('Yes','btn btn-success mr-2 mt-2', function(){
                    axios({
                        method: 'delete',
                        url: url,
                        data: {
                            _token:'{{csrf_token()}}'
                        },
                        dataType: 'json',
                    }).then(function({data}){
                        n.close();
                        new Noty({
                            type:data.status,
                            layout:'topRight',
                            text:data.message,
                        }).show();

                        jQuery('#table1').DataTable().ajax.reload(null, false);
                    });
                }),
                Noty.button('No','btn btn-danger mt-2', function(){
                    n.close();
                })
            ]
        })
        n.show();
    })
</script>

@endsection
