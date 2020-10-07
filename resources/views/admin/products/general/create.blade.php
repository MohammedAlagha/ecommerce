@extends('layouts.admin.app');

@section('title','اضافة منتج')



@section('content')
    {{--    <div class="app-content content">--}}
    {{--        <div class="content-wrapper">--}}
    {{--            <div class="content-header row">--}}
    {{--                <div class="content-header-left col-md-6 col-12 mb-2">--}}
    {{--                    <div class="row breadcrumbs-top">--}}
    {{--                        <div class="breadcrumb-wrapper col-12">--}}
    {{--                            <ol class="breadcrumb">--}}
    {{--                                <li class="breadcrumb-item"><a href="">الرئيسية </a>--}}
    {{--                                </li>--}}
    {{--                                <li class="breadcrumb-item"><a href="">المنتجات </a>--}}
    {{--                                </li>--}}
    {{--                                <li class="breadcrumb-item active">اضافة منتج--}}
    {{--                                </li>--}}
    {{--                            </ol>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="content-body">--}}
    {{--                <!-- Basic form layout section start -->--}}
    {{--                <section id="basic-form-layouts">--}}
    {{--                    <div class="row match-height">--}}
    {{--                        <div class="col-md-12">--}}
    {{--                            <div class="card">--}}
    {{--                                <div class="card-header">--}}
    {{--                                    <h4 class="card-title" id="basic-layout-form">اضافة البيانات </h4>--}}

    {{--                                    <a class="heading-elements-toggle"><i--}}
    {{--                                            class="la la-ellipsis-v font-medium-3"></i></a>--}}
    {{--                                    <div class="heading-elements">--}}
    {{--                                        <ul class="list-inline mb-0">--}}
    {{--                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>--}}
    {{--                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>--}}
    {{--                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>--}}
    {{--                                            <li><a data-action="close"><i class="ft-x"></i></a></li>--}}
    {{--                                        </ul>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}

    {{--                                @include('admin.includes.alerts.success')--}}
    {{--                                @include('admin.includes.alerts.errors')--}}
    {{--                                <div class="card-content collapse show">--}}
    {{--                                    <hr>--}}
    {{--                                    <div class="card-body">--}}
    {{--                                        <form class="form"--}}
    {{--                                              action="{{route('admin.products.store')}}"--}}
    {{--                                              method="POST"--}}
    {{--                                              enctype="multipart/form-data">--}}
    {{--                                            @csrf--}}

    {{--                                            <div class="form-body">--}}
    {{--                                                <div class="row">--}}
    {{--                                                    <div class="col-md-6">--}}
    {{--                                                        <div class="form-group">--}}
    {{--                                                            <label for="name"> اسم المنتج* </label>--}}
    {{--                                                            <input type="text" value="{{old('name')}}" id="name"--}}
    {{--                                                                   class="form-control"--}}
    {{--                                                                   placeholder="  "--}}
    {{--                                                                   name="name">--}}
    {{--                                                            @error("name")--}}
    {{--                                                            <span class="text-danger">{{$message}}</span>--}}
    {{--                                                            @enderror--}}
    {{--                                                        </div>--}}
    {{--                                                    </div>--}}

    {{--                                                    <div class="col-md-6">--}}
    {{--                                                        <div class="form-group">--}}
    {{--                                                            <label for="slug">الاسم بالرابط* </label>--}}
    {{--                                                            <input type="text" value="{{old('slug')}}" id="slug"--}}
    {{--                                                                   class="form-control"--}}
    {{--                                                                   placeholder=""--}}
    {{--                                                                   name="slug">--}}
    {{--                                                            @error("slug")--}}
    {{--                                                            <span class="text-danger">{{$message}}</span>--}}
    {{--                                                            @enderror--}}
    {{--                                                        </div>--}}
    {{--                                                    </div>--}}

    {{--                                                </div>--}}

    {{--                                                <div class="row">--}}

    {{--                                                    <div class="col-md-6">--}}
    {{--                                                        <div class="form-group">--}}
    {{--                                                            <label for="short_description">الوصف المختصر </label>--}}
    {{--                                                            <input type="text" value="{{old('slug')}}" id="short_description"--}}
    {{--                                                                   class="form-control"--}}
    {{--                                                                   placeholder=""--}}
    {{--                                                                   name="short_description">--}}
    {{--                                                            @error("short_description")--}}
    {{--                                                            <span class="text-danger">{{$message}}</span>--}}
    {{--                                                            @enderror--}}
    {{--                                                        </div>--}}
    {{--                                                    </div>--}}

    {{--                                                    <div class="col-md-6">--}}
    {{--                                                        <div class="form-group">--}}
    {{--                                                            <label for="tags">اختر العلامات الدلالية </label>--}}
    {{--                                                            <select name="tags[]" class="form-control select2"  id="tags" multiple>--}}
    {{--                                                                @foreach($data['tags'] as $tag)--}}
    {{--                                                                    <option value="{{$tag->id}}">{{$tag->name}}</option>--}}
    {{--                                                                @endforeach--}}
    {{--                                                            </select>--}}
    {{--                                                            @error("tags")--}}
    {{--                                                            <span class="text-danger">{{ $errors->first('tags') }}</span>--}}
    {{--                                                            @enderror--}}
    {{--                                                        </div>--}}
    {{--                                                    </div>--}}

    {{--                                                </div>--}}

    {{--                                                <div class="row">--}}
    {{--                                                    <div class="col-md-6">--}}
    {{--                                                        <div class="form-group">--}}
    {{--                                                            <label for="categories"> اختر القسم* </label>--}}
    {{--                                                            <select name="categories[]" class="form-control select2"  id="categories" multiple>--}}
    {{--                                                                @foreach($data['categories'] as $category)--}}
    {{--                                                                    <option value="{{$category->id}}">{{$category->name}}</option>--}}
    {{--                                                                @endforeach--}}
    {{--                                                            </select>--}}
    {{--                                                            @error("categories")--}}
    {{--                                                            <span class="text-danger">{{ $errors->first('categories') }}</span>--}}
    {{--                                                            @enderror--}}
    {{--                                                        </div>--}}
    {{--                                                    </div>--}}



    {{--                                                    <div class="col-md-4">--}}
    {{--                                                        <div class="form-group">--}}
    {{--                                                            <label for="brand_id">اختر الماركة* </label>--}}
    {{--                                                            <select name="brand_id" value="{{old('slug')}}" id="brand_id"--}}
    {{--                                                                   class="form-control select2">--}}
    {{--                                                                @foreach($data['brands'] as $brand)--}}
    {{--                                                                    <option value="{{$brand->id}}">{{$brand->name}}</option>--}}
    {{--                                                                @endforeach--}}
    {{--                                                            </select>--}}
    {{--                                                            @error("brand_id")--}}
    {{--                                                            <span class="text-danger">{{$message}}</span>--}}
    {{--                                                            @enderror--}}
    {{--                                                        </div>--}}
    {{--                                                    </div>--}}

    {{--                                                    <div class="col-md-2">--}}
    {{--                                                        <div class="form-group mt-2">--}}
    {{--                                                            <input type="hidden" name="status" value="0">--}}
    {{--                                                            <input type="checkbox" value="1"--}}
    {{--                                                            name="status"--}}
    {{--                                                            id="switcheryColor4"--}}
    {{--                                                            class="switchery" data-color="success"--}}
    {{--                                                            @if(true) checked @endif--}}
    {{--                                                            />--}}
    {{--                                                            <lable for="status" class="card-title mt-1">الحالة*</lable>--}}

    {{--                                                            @error("status")--}}
    {{--                                                            <span class="text-danger">{{$message}} </span>--}}
    {{--                                                            @enderror--}}
    {{--                                                        </div>--}}
    {{--                                                    </div>--}}

    {{--                                                </div>--}}

    {{--                                                <div class="row">--}}
    {{--                                                    <div class="col-md-12">--}}
    {{--                                                        <div class="form-group">--}}
    {{--                                                            <label for="summernote"> وصف المنتج* </label>--}}
    {{--                                                            <textarea name="description"  type="text" value="{{old('name')}}" id="summernote"--}}
    {{--                                                                 class="form-control"--}}
    {{--                                                                 placeholder="  "--}}
    {{--                                                                 ></textarea>--}}
    {{--                                                            @error("description")--}}
    {{--                                                            <span class="text-danger">{{$message}}</span>--}}
    {{--                                                            @enderror--}}
    {{--                                                        </div>--}}
    {{--                                                    </div>--}}
    {{--                                                </div>--}}


    {{--                                            </div>--}}


    {{--                                            <div class="form-actions">--}}
    {{--                                                <button type="button" class="btn btn-warning mr-1"--}}
    {{--                                                        onclick="history.back();">--}}
    {{--                                                    <i class="ft-x"></i> تراجع--}}
    {{--                                                </button>--}}
    {{--                                                <button type="submit" class="btn btn-primary">--}}
    {{--                                                    <i class="la la-check-square-o"></i> حفظ--}}
    {{--                                                </button>--}}
    {{--                                            </div>--}}
    {{--                                        </form>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}

    {{--                </section>--}}
    {{--                <!-- // Basic form layout section end -->--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}





    <section id="validation">
        <div class="app-content content">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Validation Example</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form action="{{route('admin.products.store')}}" method="post" class="steps-validation wizard-circle">

                                        <!-- Step 1 -->
                                        <h6>المعلومات الأساسية</h6>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">
                                                            اسم المنتج :
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control required" id="name"
                                                               name="name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="slug">
                                                            الاسم بالرابط :
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control required" id="slug"
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
                                                        <label for="emailAddress5">
                                                            الوصف المختصر :

                                                        </label>
                                                        <input type="text" class="form-control"
                                                               id="short_description" name="short_description">
                                                        @error("short_description")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="tags">
                                                            اختر العلامات الدلالية :
                                                        </label>
                                                        <select name="tags[]"
                                                                class="form-control custom-select select2-container--open"
                                                                id="tags" multiple>
                                                            @foreach($data['tags'] as $tag)
                                                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error("tags")
                                                        <span
                                                            class="text-danger">{{ $errors->first('tags') }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="categories"> اختر القسم :</label>
                                                        <span class="danger">*</span>
                                                        <select name="categories[]"
                                                                class="form-control custom-select select2-container--open required"
                                                                id="categories" multiple required>
                                                            @foreach($data['categories'] as $category)
                                                                <option
                                                                    value="{{$category->id}}">{{$category->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error("categories")
                                                        <span
                                                            class="text-danger">{{ $errors->first('categories') }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="brand_id">اختر الماركة :</label>
                                                        <span class="danger">*</span>
                                                        <select name="brand_id" id="brand_id"
                                                                class="form-control custom-select select2-container--open required"
                                                                required>
                                                            @foreach($data['brands'] as $brand)
                                                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error("brand_id")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="summernote">وصف المنتج</label>
                                                        <span class="danger">*</span>
                                                        <textarea name="description" required
                                                                  id="summernote"
                                                                  class="form-control"
                                                                  >{{old('description')}}</textarea>
                                                        @error("description")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </fieldset>
                                        <!-- Step 2 -->
                                        <h6>السعر</h6>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="price">
                                                            سعر المنتج :
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <input type="number" class="form-control required" value="{{old('price')}}"
                                                               id="price" name="price">
                                                        @error('price')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="special_price_start">
                                                            تاريخ البداية :
                                                        </label>
                                                        <input type="date" class="form-control"
                                                               id="special_price_start" name="special_price_start">
                                                        @error('special_price_start')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="special_price_end">تاريخ النهاية :</label>
                                                        <input type="date" class="form-control" id="special_price_end"
                                                               name="special_price_end">
                                                        @error('special_price_end')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="special_price">
                                                            سعر خاص :
                                                        </label>
                                                        <input type="number" class="form-control" id="special_price"
                                                               name="special_price">
                                                        @error('special_price')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                <div class="form-gr">

                                                </div>
                                                    <div class="form-group">
                                                        <label for="special_price_type">نوع السعر :</label>
                                                        <select class="custom-select form-control" name="special_price_type" id="special_price_type">
                                                            <option value="percent">percent</option>
                                                            <option value="fixed">fixed</option>
                                                        </select>
                                                        @error('special_price_type')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <!-- Step 3 -->
                                        <h6>تتبع المستودع</h6>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="sku">
                                                            كود المنتج :
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control required" id="sku"
                                                               name="sku">
                                                        @error('sku')
                                                        <span class="danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="status">
                                                            حالة المنتج:
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <select class="custom-select form-control required"
                                                                id="status" name="status" required>
                                                            <optgroup label="اختر حالة المنتج"></optgroup>
                                                            <option value="0">متاح</option>
                                                            <option value="1">غير متاح</option>
                                                        </select>
                                                        @error('status')
                                                        <span class="danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="status">
                                                             تتبع المستودع:
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <select class="custom-select form-control required"
                                                                id="manage_stock" name="manage_stock" required>
                                                            <optgroup label="اختر حالة التتبع"></optgroup>
                                                            <option value="1">اتاحة التتبع</option>
                                                            <option value="0">عدم اتاحة التتبع</option>
                                                        </select>
                                                        @error('manage_stock')
                                                        <span class="danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group" id="qty_div">
                                                        <label for="qty">
                                                            الكمية :
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control required" id="qty"
                                                               name="qty">
                                                        @error('qty')
                                                        <span class="danger">{{$message}}</span>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                        </fieldset>
                                        <!-- Step 4 -->
                                        <h6>Step 4</h6>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="meetingName3">
                                                            Name of Meeting :
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control required"
                                                               id="meetingName3" name="meetingName">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="meetingLocation3">
                                                            Location :
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control required"
                                                               id="meetingLocation3" name="meetingLocation">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="participants3">Names of Participants</label>
                                                        <textarea name="participants" id="participants3" rows="4"
                                                                  class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="decisions3">Decisions Reached</label>
                                                        <textarea name="decisions" id="decisions3" rows="4"
                                                                  class="form-control"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Agenda Items :</label>
                                                        <div class="c-inputs-stacked">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" name="agenda3"
                                                                       class="custom-control-input" id="item31">
                                                                <label class="custom-control-label" for="item31">1st
                                                                    item</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" name="agenda3"
                                                                       class="custom-control-input" id="item32">
                                                                <label class="custom-control-label" for="item32">2nd
                                                                    item</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" name="agenda3"
                                                                       class="custom-control-input" id="item33">
                                                                <label class="custom-control-label" for="item33">3rd
                                                                    item</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" name="agenda3"
                                                                       class="custom-control-input" id="item34">
                                                                <label class="custom-control-label" for="item34">4th
                                                                    item</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" name="agenda3"
                                                                       class="custom-control-input" id="item35">
                                                                <label class="custom-control-label" for="item35">5th
                                                                    item</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('script')

    <script>
        // Validate steps wizard

        // Show form
        var form = $(".steps-validation").show();

        $(".steps-validation").steps({
            headerTag: "h6",
            bodyTag: "fieldset",
            transitionEffect: "fade",
            titleTemplate: '<span class="step">#index#</span> #title#',
            labels: {
                finish: 'Submit'
            },
            onStepChanging: function (event, currentIndex, newIndex)
            {
                // Allways allow previous action even if the current form is not valid!
                if (currentIndex > newIndex)
                {
                    return true;
                }
                // Forbid next action on "Warning" step if the user is to young
                if (newIndex === 3 && Number($("#age-2").val()) < 18)
                {
                    return false;
                }
                // Needed in some cases if the user went back (clean up)
                if (currentIndex < newIndex)
                {
                    // To remove error styles
                    form.find(".body:eq(" + newIndex + ") label.error").remove();
                    form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
                }
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            },
            onFinishing: function (event, currentIndex)
            {
                form.validate().settings.ignore = ":disabled";
                return form.valid();
            },
            onFinished: function (event, currentIndex)
            {
                alert("Submitteffd!");
            }
        });

    </script>
    <script>
        $(document).ready(function () {
            $('#summernote').summernote({
                height: 150,


            }).on('summernote.change', function(customEvent, contents, $editable) {
                // Revalidate the content when its value is changed by Summernote
                fv.revalidateField('content');
            });
        });
    </script>



    <script>
        $('#tags,#categories,#brand_id').select2({});
    </script>

    <script>
        $(document).on('change','#manage_stock',function () {
            if ($(this).val() == 1){
                $('#qty_div').removeClass('hidden');
            }else {
                $('#qty_div').addClass('hidden');
            }
        })
    </script>
@endpush

