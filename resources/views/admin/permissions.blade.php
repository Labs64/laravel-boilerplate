@extends('admin.layouts.admin')

@section('title', __('views.membership.title'))

@section('content')
    <div class="row">
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>@sortablelink('email', __('views.membership.table_header_0'),['page' => $users->currentPage()])</th>
                <th>@sortablelink('name',  __('views.membership.table_header_1'),['page' => $users->currentPage()])</th>
                <th>{{ __('views.membership.table_header_2') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->name }}</td>
                    <td>
                        @if($user->hasRoles(config('protection.except_roles')))
                            <div class="line_30 h5">
                                &nbsp;
                            </div>
                        @else
                            <a title="Repeat validation" class="btn btn-default pull-right" href="{{ route('admin.permissions.repeat',$user) }}">
                                <i class="fa fa-refresh" aria-hidden="true"></i>
                            </a>
                            @if($user->protectionValidation)
                                <table class="table table-striped table-bordered dt-responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th>{{ __('views.membership.table_header_3') }}</th>
                                        <th>{{ __('views.membership.table_header_4') }}</th>
                                        <th>{{ __('views.membership.table_header_5') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($user->protectionValidation->validation_result as $result)
                                        <tr>
                                            <td style="width: 30%">{{ $result['productModuleNumber'] }}</td>
                                            <td style="width: 10%">
                                                @if($result['valid'])
                                                    <span class="label label-primary">{{ __('views.membership.valid') }}</span>
                                                @else
                                                    <span class="label label-danger">{{ __('views.membership.not_valid') }}</span>
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
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pull-right">
            Powered by <a href="http://netlicensing.io/?utm_source=Laravel_Boilerplate&utm_medium=github&utm_campaign=laravel_boilerplate&utm_content=poweredby" target="_blank"/>Labs64 NetLicensing</a>
        </div>
        <div class="pull-right">
            {{ $users->links() }}
        </div>
        <div>
            <h4>How To</h4>
            <ul>
              <li>Manage available membership plans - <a href="https://go.netlicensing.io/console/v2/content/vendor/licensetemplate.xhtml?filterkey=productModuleNumber&filtervalue={{ config('protection.membership.product_module_number') }}" target="_blank"/>NetLicensing Management Console » License Templates</a></li>
              <li>View and manage registered users - <a href="https://go.netlicensing.io/console/v2/content/vendor/licensee.xhtml?filterkey=productNumber&filtervalue={{ config('protection.product_number') }}" target="_blank"/>NetLicensing Management Console » Licensees</a></li>
            </ul>
        </div>
    </div>
@endsection
