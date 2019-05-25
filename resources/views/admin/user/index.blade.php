@php
{{
/**
 * @var $users array
 **/
}}
@endphp

@extends('admin.layout')


@section('content')

    <div class="container">

        @include('admin.user.modal')

        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="mb-lg-3">
                    <a class="btn btn-outline-primary btn-sm" href="{{ route('admin-user-create') }}" role="button">Create new user</a>
                </div>

                @include('admin.alert')

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">email</th>
                            <th scope="col">name</th>
                            <th scope="col">created at</th>
                            <th scope="col">email verified</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th scope="row">{{ $user['id'] }}</th>
                                <td>{{ $user['email'] }}</td>
                                <td>{{ $user['name'] }}</td>
                                <td>{{ $user['created_at'] }}</td>
                                <td>@if ($user['email_verified_at']) Yes @else — @endif</td>
                                <td><a href="{{ route('admin-user-update', ['id' => $user['id']]) }}">edit</a></td>
                                <td>
                                    <a class="user-remove" href="{{ route('admin-user-remove', ['id' => $user['id']]) }}">remove</a>
                                </td>
                            </tr>
                        @endforeach

                        @if (!empty($users))
                            <form id="remove-form" method="POST">
                                @csrf
                            </form>
                            <script>
                                const btnRemove = document.querySelectorAll('.user-remove')
                                const form = document.getElementById('remove-form')

                                btnRemove.forEach(el => {
                                    el.addEventListener('click', e => {
                                        e.preventDefault()
                                        promptRemove(el)
                                    })
                                })

                                const promptRemove = (el) => {
                                    const handleOkButton = () => {
                                        form.action = el.href
                                        form.submit();
                                    }
                                    $('#confirm').modal()
                                        .on('click', '#delete-btn', handleOkButton)
                                        .on('hide.bs.modal', function () {
                                            $(this).off('click', handleOkButton)
                                        })
                                }
                            </script>
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection
