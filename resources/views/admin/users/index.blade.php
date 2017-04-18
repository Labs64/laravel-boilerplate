@extends('admin.layouts.admin')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h1 class="h3">Users</h1>
        </div>
        <div class="title_right">
            <div class="pull-right">
                {!! Breadcrumbs::render() !!}
            </div>
        </div>
    </div>

    <div class="row">
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>@sortablelink('email', 'Email',['page' => $users->currentPage()])</th>
                <th>@sortablelink('name', 'Username',['page' => $users->currentPage()])</th>
                <th>@sortablelink('active', 'Active',['page' => $users->currentPage()])</th>
                <th>@sortablelink('confirmed', 'Confirmed',['page' => $users->currentPage()])</th>
                <th>@sortablelink('created_at', 'Created',['page' => $users->currentPage()])</th>
                <th>@sortablelink('updated_at', 'Last Updated',['page' => $users->currentPage()])</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->name }}</td>
                    <td>
                        @if($user->active)
                            <span class="label label-primary">Active</span>
                        @else
                            <span class="label label-danger">Inactive</span>
                        @endif
                    </td>
                    <td>
                        @if($user->confirmed)
                            <span class="label label-success">Confirmed</span>
                        @else
                            <span class="label label-warning">Not confirmed</span>
                        @endif</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="{{ route('admin.users.show', [$user->id]) }}" data-toggle="tooltip" data-placement="top" data-title="View">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-xs btn-info" href="{{ route('admin.users.edit', [$user->id]) }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <button class="btn btn-xs btn-danger user_destroy"
                                data-url="{{ route('admin.users.destroy', [$user->id]) }}">
                            <i class="fa fa-trash"></i>
                        </button>
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