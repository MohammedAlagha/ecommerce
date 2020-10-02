@extends('layouts.admin.app');

@section('title',"اضافة قسم")


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
                                <li class="breadcrumb-item active">اضافة قسم
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
                                    <h4 class="card-title" id="basic-layout-form">اضافة البيانات </h4>
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
                                    <hr>
                                    <div class="card-body">
                                        <form class="form"
                                              action="{{route('admin.categories.store')}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name"> الاسم </label>
                                                            <input type="text" value="{{old('name')}}" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="name">
                                                            @error("name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="slug">الاسم بالرابط </label>
                                                            <input type="text" value="{{old('slug')}}" id="slug"
                                                                   class="form-control"
                                                                   placeholder=""
                                                                   name="slug">
                                                            @error("slug")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row hidden" id="category-list" >
                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">

                                                            <label for="select_cat">اختر القسم الرئيسي </label>

                                                            <select class="form-control select2" id="select_cat" name="parent_id">
                                                                @if($categories && $categories -> count()>0)
                                                                    @foreach($categories as $category)
                                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>

                                                            @error("parent_id")
                                                            <span class="text-danger">{{$message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                            <input type="hidden" name="status" value="0">
                                                            <input type="checkbox" value="1"
                                                                   name="status"
                                                                   id="switcheryColor4"
                                                                   class="switchery" data-color="success"
                                                            />
                                                            <label for="switcheryColor4"
                                                                   class="card-title ml-1">الحالة </label>

                                                            @error("status")
                                                            <span class="text-danger">{{$message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group mt-1">
                                                            <input type="radio" value="1"
                                                                   name="type"
                                                                   id="type1"
                                                                   class="switchery"
                                                                   data-color="success"
                                                                   checked
                                                            />
                                                            <label for="type1"
                                                                   class="card-title ml-1">قسم رئيسي</label>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group mt-1">
                                                            <input type="radio" value="2"
                                                                   name="type"
                                                                   id="type2"
                                                                   class="switchery"
                                                                   data-color="success"

                                                            />
                                                            <label for="type2"
                                                                   class="card-title ml-1">قسم فرعي</label>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> تراجع
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> حفظ
                                                </button>
                                            </div>
                                        </form>
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

@push('script')



    <script>

        // $('#category-list').removeClass('hidden');

        $('input:radio[name="type"]').change(
            function () {
                if (this.checked && this.value == '2') { //1 if main category 2 if sub category
                    $('#category-list').removeClass('hidden');
                }else{
                    $('#category-list').addClass('hidden');
                }
            }
        );

    </script>

@endpush
