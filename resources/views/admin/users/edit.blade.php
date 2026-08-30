@extends('layouts.admin')

@section('content')

<div class="container">

```
<div class="card shadow mb-4">

    <div class="card-header">
        <h4>Edit User</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('backend.users.update', $user->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')


            <!-- User Name -->
            <div class="mb-3">
                <label class="form-label">User Name</label>

                <input type="text"
                       name="name"
                       value="{{ old('name', $user->name) }}"
                       class="form-control @error('name') is-invalid @enderror">

                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <!-- Phone -->
            <div class="mb-3">
                <label class="form-label">Phone</label>

                <input type="text"
                       name="phone"
                       value="{{ old('phone', $user->phone) }}"
                       class="form-control @error('phone') is-invalid @enderror">

                @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <!-- Profile Image -->
            <div class="mb-3">

                <label class="form-label">Profile</label>

                <ul class="nav nav-tabs" id="myTab" role="tablist">

                    <li class="nav-item" role="presentation">
                        <button class="nav-link active"
                                id="profile-tab"
                                data-bs-toggle="tab"
                                data-bs-target="#profile-tab-pane"
                                type="button"
                                role="tab">

                            Current Image

                        </button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link"
                                id="new_profile-tab"
                                data-bs-toggle="tab"
                                data-bs-target="#new_profile-tab-pane"
                                type="button"
                                role="tab">

                            New Image

                        </button>
                    </li>

                </ul>


                <div class="tab-content">

                    <!-- Current Image -->
                    <div class="tab-pane fade show active"
                         id="profile-tab-pane"
                         role="tabpanel">

                        @if($user->profile)
                            <img src="{{ asset($user->profile) }}"
                                 class="w-25 my-2"
                                 alt="Current Profile">
                        @endif

                        <input type="hidden"
                               name="old_profile"
                               value="{{ $user->profile }}">

                    </div>


                    <!-- New Image -->
                    <div class="tab-pane fade"
                         id="new_profile-tab-pane"
                         role="tabpanel">

                        <input type="file"
                               accept="image/*"
                               class="form-control mt-2 @error('profile') is-invalid @enderror"
                               name="profile">

                        @error('profile')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>

            </div>


            <!-- Email -->
            <div class="mb-3">

                <label class="form-label">
                    Email Address
                </label>

                <input type="email"
                       name="email"
                       value="{{ old('email', $user->email) }}"
                       class="form-control @error('email') is-invalid @enderror">

                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <!-- Password -->
            <div class="mb-3">

                <label class="form-label">
                    New Password
                </label>

                <input type="password"
                       name="password"
                       class="form-control @error('password') is-invalid @enderror"
                       autocomplete="new-password">

                <small class="text-muted">
                    Leave blank if you don't want to change the password.
                </small>

                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <!-- Confirm Password -->
            <div class="mb-3">

                <label class="form-label">
                    Confirm New Password
                </label>

                <input type="password"
                       name="password_confirmation"
                       class="form-control"
                       autocomplete="new-password">

            </div>


            <!-- Role -->
            <div class="mb-3">

                <label for="role" class="form-label">
                    Role
                </label>

                <select name="role"
                        id="role"
                        class="form-select @error('role') is-invalid @enderror">

                    <option value="">
                        Select Role
                    </option>

                    <option value="1"
                        {{ old('role', $user->role) == 1 ? 'selected' : '' }}>
                        User
                    </option>

                    <option value="0"
                        {{ old('role', $user->role) == 0 ? 'selected' : '' }}>
                        Admin
                    </option>

                </select>

                @error('role')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <!-- Buttons -->
            <div class="mt-3">

                <button type="submit"
                        class="btn btn-primary">
                    Update User
                </button>

                <a href="{{ route('backend.users.index') }}"
                   class="btn btn-secondary">
                    Cancel
                </a>

            </div>


        </form>

    </div>
</div>
```

</div>
@endsection
