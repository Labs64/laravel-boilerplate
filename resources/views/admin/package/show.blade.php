@extends('admin.layouts.admin')

@section('title', __('views.package.show.title', ['name' => $package->name]))

@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
           
            <tr>
                <th>{{ __('views.package.type') }}</th>
                <td>{{ $package->type }}</td>
            </tr>

            <tr>
                <th>{{ __('views.package.name') }}</th>
                <td>{{ $package->name }}</td>
            </tr>

            <tr>
                <th>{{ __('views.package.desc') }}</th>
                <td>
                    @foreach(explode('.', $package->description) as $info)
                    <li>{{ $info }}</li>
                     @endforeach
                </td>
            </tr>
            <tr>
                <th>{{ __('views.package.price') }}</th>
                <td>
                    
                        RM {{ number_format($package->price, 2) }}
                    
                </td>
            </tr>
            <tr>
                <th>{{ __('views.package.category') }}</th>
                <td>
                    @if($package->category_id == 1)
                    <span>{{ __('views.admin.pakej_1') }}</span>
                    
                    @elseif($package->category_id == 2)
                    <span>{{ __('views.admin.pakej_2') }}</span>
                    
                    @elseif($package->category_id == 3)
                    <span>{{ __('views.admin.pakej_3') }}</span>
                    
                    @elseif($package->category_id == 4)
                    <span>{{ __('views.admin.pakej_4') }}</span>

                    @elseif($package->category_id == 5)
                    <span>General</span>
            
                @endif
                    
                </td>
            </tr>
            <tr>
                <th>{{ __('views.package.active') }}</th>
                <td>
                    @if($package->active)
                        <span class="label label-primary">{{ __('views.admin.users.show.active') }}</span>
                    @else
                        <span class="label label-danger">{{ __('views.admin.users.show.inactive') }}</span>
                    @endif
                </td>
            </tr>

            <tr>
                <th>{{ __('views.admin.users.show.table_header_6') }}</th>
                <td>{{ \Carbon\Carbon::parse($package->created_at)->format('d/m/Y h:m:s')}}</td>
            </tr>

            <tr>
                <th>{{ __('views.admin.users.show.table_header_7') }}</th>
                <td>{{ \Carbon\Carbon::parse($package->updated_at)->format('d/m/Y h:m:s')}}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection