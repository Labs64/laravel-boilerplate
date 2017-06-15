@extends('admin.layouts.admin')

@section('title', __('views.netlicensing.license.title'))

@section('content')
    <div class="row">
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>@sortablelink('email', __('views.netlicensing.license.table_header_0'),['page' => $users->currentPage()])</th>
                <th>@sortablelink('name',  __('views.netlicensing.license.table_header_1'),['page' => $users->currentPage()])</th>
                <th>{{ __('views.netlicensing.license.table_header_2') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->name }}</td>
                    <td>
                        <table class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                            <tr>
                                <th>{{ __('views.netlicensing.license.table_header_3') }}</th>
                                <th>{{ __('views.netlicensing.license.table_header_4') }}</th>
                                <th>{{ __('views.netlicensing.license.table_header_5') }}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($user->license as $license)
                                <tr>
                                    <td style="width: 30%">{{ $license['productModuleNumber'] }}</td>
                                    <td style="width: 10%">
                                        @if($license['valid'])
                                            <span class="label label-primary">{{ __('views.netlicensing.license.valid') }}</span>
                                        @else
                                            <span class="label label-danger">{{ __('views.netlicensing.license.not_valid') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ isset($license['expires'])?$license['expires']:''  }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pull-right">
            {{ $users->links() }}
        </div>
    </div>
@endsection