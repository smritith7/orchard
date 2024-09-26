@extends('backend.layouts.main')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mt-5">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h2 class="m-0">Edit Role</h2>
            </div>
            <div class="card-body p-2.25rem">
                <form method="POST" action="{{ route('backend.roles.update', ['id' => $role->id]) }}">
                    @csrf
                    @method('PUT')
                    {{-- Edit form --}}
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="title">Title:</label>
                            <input type="text" name="title" id="title"
                                class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title', $role->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                     {{-- Permission checklist --}}
                    <div class="row align-items-center mb-3">
                        <div class="col d-flex align-items-center">
                            <h5 class="mr-3">Permissions</h5>
                            <div class="form-check mb-2">
                                <input type="checkbox" class="form-check-input" id="selectAll">
                                <label class="form-check-label" for="selectAll">Select All</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-6 pr-3 pl-3 mb-4">
                            @foreach (['manage_users', 'manage_roles', 'manage_customer_profiles', 'manage_products', 'manage_product_attributes', 'manage_orders'] as $permission)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input permission-checkbox"
                                        id="{{ $permission }}" name="permissions[]" value="{{ $permission }}"
                                        {{ in_array($permission, json_decode($role->permissions, true) ?? []) ? 'checked' : '' }}>
                                    <label class="form-check-label"
                                        for="{{ $permission }}">{{ ucfirst(str_replace('_', ' ', $permission)) }}</label>
                                </div>
                            @endforeach
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6 pl-4">
                            @foreach (['manage_finance', 'manage_customer_feedback/reviews', 'manage_customer_inquiries', 'view_order_history', 'view_reports', 'manage_settings'] as $permission)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input permission-checkbox"
                                        id="{{ $permission }}" name="permissions[]" value="{{ $permission }}"
                                        {{ in_array($permission, json_decode($role->permissions, true) ?? []) ? 'checked' : '' }}>
                                    <label class="form-check-label"
                                        for="{{ $permission }}">{{ ucfirst(str_replace('_', ' ', $permission)) }}</label>
                                </div>
                            @endforeach
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary shadow">Update Role</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
   <!-- Sellect all Checklist JS Function -->
    <script>
        document.getElementById('selectAll').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.permission-checkbox');
            checkboxes.forEach(checkbox => checkbox.checked = this.checked);
        });
    </script>
@endsection
