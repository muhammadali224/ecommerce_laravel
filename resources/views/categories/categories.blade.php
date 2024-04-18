@extends('layouts.master')
@section('title')
    التصنيفات | Category
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">التصنيفات</h4>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="col-sm-6 col-md-3 col-xl-3">
                        <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
                            data-toggle="modal" href="#modaldemo8">إضافة تصنيف</a>
                    </div>

                    @if (session()->has('Add'))
                        <br>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">

                            <strong>{{ session()->get('Add') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (session()->has('Error'))
                        <br>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">

                            <strong>{{ session()->get('Error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (session()->has('delete'))
                        <br>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('delete') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if (session()->has('edit'))
                        <br>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('edit') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif


                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">إسم التصنيف بالعربي</th>
                                    <th class="border-bottom-0">إسم التصنيف بالانجليزي</th>
                                    <th class="border-bottom-0">إسم الصورة</th>
                                    <th class="border-bottom-0">المدينة</th>
                                    <th class="border-bottom-0">العدد</th>
                                    <th class="border-bottom-0">الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($categories as $category)
                                    <tr>

                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->category_name_ar }}</td>
                                        <td>{{ $category->category_name_en }}</td>
                                        <td>{{ $category->category_image }}</td>
                                        <td>{{ $category->city->city_name }}</td>
                                        <td>{{ $category->count }}</td>
                                        <td>

                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                data-id="{{ $category->id }}"
                                                data-has_service="{{ $category->has_service }}"
                                                data-category_name_ar="{{ $category->category_name_ar }}"
                                                data-category_name_en="{{ $category->category_name_en }}"
                                                data-category_image="{{ $category->category_image }}"
                                                data-count="{{ $category->count }}"
                                                data-city_id="{{ $category->city_id }}" data-toggle="modal"
                                                href="#exampleModal2" title="تعديل"><i class="las la-pen"></i></a>



                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-id="{{ $category->id }}"
                                                data-category_name_ar="{{ $category->category_name_ar }}"
                                                data-toggle="modal" href="#modaldemo9" title="حذف"><i
                                                    class="las la-trash"></i></a>

                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Basic modal -->
        <div class="modal" id="modaldemo8">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">إضافة تصيف</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('categories.store') }}" method="POST">
                        {{ csrf_field() }}
                        <input name="has_service" type="hidden" value="0">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">إسم التصنيف بالانجليزي</label>
                                <input type="text" class="form-control" name="category_name_en" id="category_name_en"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">إسم التصنيف بالعربي</label>
                                <input type="text" class="form-control" name="category_name_ar" id="category_name_ar"
                                    required>
                            </div>
                            <div class="my-1 mr-2" for="inlineFormCustomSelectPref">المدينة</div>
                            <select name="city_id" id="city_id" class="form-control" required>
                                <option value="" selected disabled>-- أختر المدينة --</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                @endforeach

                            </select>

                            <div class="form-group">
                                <label for="exampleInputEmail1">إسم الصورة</label>
                                <input type="text" class="form-control" name="category_image" id="category_image"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">العدد</label>
                                <input type="text" class="form-control" name="count" id="count" required>
                            </div>

                        </div>


                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit">تأكيد</button>
                            <button class="btn btn-secondary" data-dismiss="modal" type="button">إغلاق</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Basic modal -->

        <!-- edit -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">تعديل التصنيف</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="categories/update" method="post" autocomplete="off">
                            {{ method_field('patch') }}
                            {{ csrf_field() }}


                            {{-- ================================================ --}}
                            
                            <div class="modal-body">
                                <div class="form-group"><input name="has_service" type="hidden" value="0">
                                    <input type="hidden" name="id" id="id" value="">
                                    <label for="recipient-name" class="col-form-label">إسم التصنيف بالانجليزي</label>
                                    <input type="text" class="form-control" name="category_name_en"
                                        id="category_name_en" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">إسم التصنيف بالعربي</label>
                                    <input type="text" class="form-control" name="category_name_ar"
                                        id="category_name_ar" required>
                                </div>
                                <div class="my-1 mr-2" for="inlineFormCustomSelectPref">المدينة</div>
                                <select name="city_id" id="city_id" class="form-control" required>
                                    <option value="{{ $city->id }}" selected>{{ $city->city_name }}</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                    @endforeach

                                </select>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">إسم الصورة</label>
                                    <input type="text" class="form-control" name="category_image" id="category_image"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">العدد</label>
                                    <input type="text" class="form-control" name="count" id="count" required>
                                </div>

                            </div>


                            {{-- ================================================ --}}
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">تاكيد</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- delete -->
        <div class="modal" id="modaldemo9">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">حذف التصنيف</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="categories/destroy" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>هل انت متاكد من عملية الحذف ؟</p><br>
                            <input type="hidden" name="id" id="id" value="">
                            <input class="form-control" name="category_name_ar" id="category_name_ar" type="text"
                                readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                            <button type="submit" class="btn btn-danger">تاكيد</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>
    <script>
        $('#exampleModal2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var category_name_ar = button.data('category_name_ar')
            var category_name_en = button.data('category_name_en')
            var category_image = button.data('category_image')
            var count = button.data('count')
            var has_service = button.data('has_service')
            var city_id = button.data('city_id')

            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #has_service').val("0");
            modal.find('.modal-body #category_name_ar').val(category_name_ar);
            modal.find('.modal-body #category_name_en').val(category_name_en);
            modal.find('.modal-body #category_image').val(category_image);
            modal.find('.modal-body #count').val(count);
            modal.find('.modal-body #city_id').val(city_id);

        })
    </script>

    <script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var category_name_ar = button.data('category_name_ar')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #category_name_ar').val(category_name_ar);
        })
    </script>
@endsection
