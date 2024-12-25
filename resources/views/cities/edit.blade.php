@extends('parent')

@section('main_content')
<!--begin::Container-->
<div class="row">
    <div class="col-lg-12">
        <!--begin::Card-->
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title"></h3>
            </div>
            <!--begin::Form-->
            <form method="POST" action="{{route('cities.update', $city->id)}}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    {{-- <div class="separator separator-dashed my-10"></div> --}}
                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-exclamation-triangle"></i> {{__('cms.error')}}!</h5>
                        <ul>
                            @foreach ($errors->all() as $error )
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    {{-- رسالة النجاح --}}
                    @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> {{__('cms.successfully')}}!</h5>
                        {{session('message')}}
                    </div>
                    @endif
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.name')}}:</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="text" class="form-control" id="name"
                                placeholder="name" value="{{old('name')}}" name="name" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.name')}}</span>
                        </div>
                    </div>


                        <div class="form-group row mt-4">
                            <label class="col-3 col-form-label">{{__('cms.longitude')}}:</label>
                            <div class="col-lg-4 col-md-9 col-sm-12">
                                <input type="number" class="form-control" id="longitude"
                                    placeholder="{{__('cms.longitude')}}" value="{{old('longitude')}}" name="longitude"/>
                                <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.longitude')}}</span>
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label class="col-3 col-form-label">{{__('cms.latitude')}}:</label>
                            <div class="col-lg-4 col-md-9 col-sm-12">
                                <input type="number" class="form-control" id="latitude"
                                    placeholder="{{__('cms.latitude')}}" value="{{old('latitude')}}" name="latitude"/>
                                <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.latitude')}}</span>
                            </div>
                        </div>

                        <div class="separator separator-dashed my-10"></div>
                        <h3 class="text-dark font-weight-bold mb-10">{{__('cms.settings')}}</h3>
                        {{-- <div class="form-group row">
                            <label class="col-3 col-form-label">{{__('cms.active')}}</label>
                            <div class="col-3">
                                <span class="switch switch-outline switch-icon switch-success">
                                    <label>
                                        <input type="checkbox" checked="checked" id="active" name="active">
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div> --}}
                        {{-- <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" name="active" id="active_chickbox">
                            <label class="custom-control-label" for="active_chickbox">active</label>
                        </div> --}}

                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input"name="active" id="active_chickbox" @if($city->active) checked @endif>
                            <label class="custom-control-label" for="active_chickbox">{{__('cms.active')}}</label>
                        </div>





                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-3">

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">sent</button>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Card-->
    </div>
</div>
<!--end::Container-->
@endsection

