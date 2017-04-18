@extends('admin.layouts.admin')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h1 class="h3">{{ $user->name }}</h1>
        </div>
        <div class="title_right">
            <div class="pull-right">
                {!! Breadcrumbs::render() !!}
            </div>
        </div>
    </div>
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
            <tr>
                <th>Avatar</th>
                <td><img src="{{ $user->avatar }}" class="user-profile-image"></td>
            </tr>

            <tr>
                <th>Name</th>
                <td>{{ $user->name }}</td>
            </tr>

            <tr>
                <th>E-mail</th>
                <td>
                    <a href="mailto:{{ $user->email }}">
                        {{ $user->email }}
                    </a>
                </td>
            </tr>

            <tr>
                <th>Status</th>
                <td>
                    @if($user->active)
                        <span class="label label-primary">Active</span>
                    @else
                        <span class="label label-danger">Deactivated</span>
                    @endif
                </td>
            </tr>

            <tr>
                <th>Confirmed</th>
                <td>
                    @if($user->confirmed)
                        <span class="label label-success">Confirmed</span>
                    @else
                        <span class="label label-warning">Not confirmed</span>
                    @endif</td>
                </td>
            </tr>

            <tr>
                <th>Created At</th>
                <td>{{ $user->created_at }} ({{ $user->created_at->diffForHumans() }})</td>
            </tr>

            <tr>
                <th>Last Updated</th>
                <td>{{ $user->updated_at }} ({{ $user->updated_at->diffForHumans() }})</td>
            </tr>

            </tbody></table>
    </div>
@endsection