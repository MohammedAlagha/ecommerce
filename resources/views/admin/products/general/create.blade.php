@extends('layouts.admin.app');

@section('title','اضافة منتج')


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
                                <li class="breadcrumb-item"><a href="">المنتجات </a>
                                </li>
                                <li class="breadcrumb-item active">اضافة منتج
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
                                              action="{{route('admin.products.store')}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name"> اسم المنتج* </label>
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
                                                            <label for="slug">الاسم بالرابط* </label>
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

                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="short_description">الوصف المختصر </label>
                                                            <input type="text" value="{{old('slug')}}" id="short_description"
                                                                   class="form-control"
                                                                   placeholder=""
                                                                   name="short_description">
                                                            @error("short_description")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="tags">اختر العلامات الدلالية </label>
                                                            <select name="tags[]" class="form-control select2"  id="tags" multiple>
                                                                @foreach($data['tags'] as $tag)
                                                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error("tags")
                                                            <span class="text-danger">{{ $errors->first('tags') }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="categories"> اختر القسم* </label>
                                                            <select name="categories[]" class="form-control select2"  id="categories" multiple>
                                                                @foreach($data['categories'] as $category)
                                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error("categories")
                                                            <span class="text-danger">{{ $errors->first('categories') }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>



                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="slug">اختر الماركة* </label>
                                                            <select name="brand_id" value="{{old('slug')}}" id="brand"
                                                                   class="form-control select2">
                                                                @foreach($data['brands'] as $brand)
                                                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error("brand_id")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group mt-2">
                                                            <input type="hidden" name="status" value="0">
                                                            <input type="checkbox" value="1"
                                                            name="status"
                                                            id="switcheryColor4"
                                                            class="switchery" data-color="success"
                                                            @if(true) checked @endif
                                                            />
                                                            <lable for="status" class="card-title mt-1">الحالة*</lable>

                                                            @error("status")
                                                            <span class="text-danger">{{$message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="name"> وصف المنتج* </label>
                                                            <textarea name="description"  type="text" value="{{old('name')}}" id="summernote"
                                                                 class="form-control"
                                                                 placeholder="  "
                                                                 ></textarea>
                                                            @error("description")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
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
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 150
            });
        });
    </script>

@endpush
