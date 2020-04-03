@extends('admin.layouts.admin')

@section('title',__('views.package.edit.title', ['name' => $package->name]) )

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            {{ Form::open(['route'=>['admin.packages.update', $package->id],'method' => 'put','class'=>'form-horizontal form-label-left']) }}
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">{{__('views.package.type')}}</label>
                <div class="col-md-2 col-sm-2 col-xs-12">
                    <input id="type" type="text" class="form-control col-md-7 col-xs-12" name="type" value="{{ $package->type }}">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">{{__('views.package.name')}}</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="name" type="text" class="form-control col-md-7 col-xs-12" name="name" value="{{ $package->name }}">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">{{__('views.package.desc')}}</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea rows="10" cols="30" id="description" class="form-control col-md-7 col-xs-12" name="description"> {{ $package->description }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="active" >
                    {{ __('views.package.active') }}
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="checkbox">
                        <label>
                            <input id="active" type="checkbox" class="@if($errors->has('active')) parsley-error @endif"
                                   name="active" @if($package->active) checked="checked" @endif value="1">Active
                                   
                            @if($errors->has('active'))
                                <ul class="parsley-errors-list filled">
                                    @foreach($errors->get('active') as $error)
                                        <li class="parsley-required">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">{{__('views.package.price')}} (RM)</label>
                <div class="col-md-2 col-sm-2 col-xs-12">
                    <input id ="price" step="0.01" type="number" class="form-control col-md-7 col-xs-12" name="price" value="{{ number_format($package->price, 2) }}">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">{{__('views.package.minperson')}}</label>
                <div class="col-md-2 col-sm-2 col-xs-12">
                    <input id ="min_person" type="number" class="form-control col-md-7 col-xs-12" name="min_person" value="{{ $package->min_person }}">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">{{__('views.package.category')}}</label>
                <div class="col-md-2 col-sm-2 col-xs-12">
                    <select class="form-control col-md-7 col-xs-12" id="category_id" name="category_id">
                        <option value="">Select Category</option>
                        <option value="1" {{ $package->category_id == 1 ? 'selected' : '' }}>Student With IC</option>
                        <option value="2" {{ $package->category_id == 2 ? 'selected' : '' }}>Adult With IC</option>
                        <option value="3" {{ $package->category_id == 3 ? 'selected' : '' }}>Student Without IC</option>
                        <option value="4" {{ $package->category_id == 4 ? 'selected' : '' }}>Adult Without IC</option>
                        <option value="5" {{ $package->category_id == 5 ? 'selected' : '' }}>General</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-md-3 col-sm-3 col-xs-12 center-margin">
                    <a class="btn btn-primary" href="{{ URL::previous() }}"> {{ __('views.admin.users.edit.cancel') }}</a>
                    <button type="submit" class="btn btn-success"> {{ __('views.admin.users.edit.save') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/users/edit.css')) }}
@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/users/edit.js')) }}
@endsection