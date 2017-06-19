@extends('admin.layouts.admin')

@section('title', __('views.permissions.license.title'))

@section('content')
    <div class="row">
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>@sortablelink('email', __('views.netlicensing.permissions.table_header_0'),['page' => $users->currentPage()])</th>
                <th>@sortablelink('name',  __('views.netlicensing.permissions.table_header_1'),['page' => $users->currentPage()])</th>
                <th>{{ __('views.netlicensing.permissions.table_header_2') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->name }}</td>
                    <td>
                        <a title="Repeat validation" class="btn btn-default pull-right" href="{{ route('admin.permissions.repeat',$user) }}">
                            <i class="fa fa-refresh" aria-hidden="true"></i>
                        </a>
                        @if($user->nlicValidation)
                            <table class="table table-striped table-bordered dt-responsive nowrap">
                                <thead>
                                <tr>
                                    <th>{{ __('views.netlicensing.permissions.table_header_3') }}</th>
                                    <th>{{ __('views.netlicensing.permissions.table_header_4') }}</th>
                                    <th>{{ __('views.netlicensing.permissions.table_header_5') }}</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($user->nlicValidation->validation_result as $result)
                                    <tr>
                                        <td style="width: 30%">{{ $result['productModuleNumber'] }}</td>
                                        <td style="width: 10%">
                                            @if($result['valid'])
                                                <span class="label label-primary">{{ __('views.netlicensing.permissions.valid') }}</span>
                                            @else
                                                <span class="label label-danger">{{ __('views.netlicensing.permissions.not_valid') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ isset($result['expires'])?$result['expires']:''  }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="line_30 h4">
                                Not validated
                            </div>
                        @endif
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