@extends('vgplay::settings.layout')

@section('title', 'Cấu hình trang chủ')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            @if (session('status'))
                <div class="alert alert-custom alert-success alert-shadow gutter-b w-100 mx-4" role="alert">
                    <div class="alert-icon">
                        <i class="fas fa-torii-gate"></i>
                    </div>
                    <div class="alert-text">
                        {{ session('status') }}
                    </div>
                </div>
            @endif
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            @foreach ($settings->groupBy('type') as $type => $group)
                                <li class="nav-item"><a class="nav-link @if ($loop->first) active @endif"
                                        href="#tab-{{ str_slug($type) }}" data-toggle="tab">{{ $type }}</a></li>
                            @endforeach
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('settings.update') }}" method="POST" id="form-update">
                            @csrf
                            @method('PUT')
                            <div class="tab-content">
                                @foreach ($settings->groupBy('type')->sortBy('group') as $type => $group)
                                    <div class="tab-pane @if ($loop->first) active @endif" id="tab-{{ str_slug($type) }}">

                                        @foreach ($group as $item)
                                            @include('vgplay::settings.partials.form-element')
                                        @endforeach
                                    </div>
                                @endforeach
                                <div class="form-group">
                                </div>
                            </div>
                        </form>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                    <div class="card-footer text-right">
                        <button class="btn btn-primary" form="form-update">
                            <i class="fas fa-save"></i>
                            Lưu lại</button>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>

@endsection

@include('vgplay::settings.partials.scripts')
