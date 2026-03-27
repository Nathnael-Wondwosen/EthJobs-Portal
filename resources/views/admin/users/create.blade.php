@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Users</h1>
        </div>

        <div class="section-body">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Users</h4>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.users.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control {{ hasError($errors, 'name') }}" name="name" value="{{ old('name') }}">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control {{ hasError($errors, 'email') }}" name="email" value="{{ old('email') }}">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="text" class="form-control {{ hasError($errors, 'password') }}" name="password" value="{{ old('password') }}">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <div class="form-group">
                                <label for="">Role</label>
                                <select class="form-control {{ hasError($errors, 'role') }}" name="role">
                        <option>---Select Role---</option>
                        <option value="Company" {{ old('role') === 'Company' ? 'selected' : '' }}>Employer</option>
                        <option value="Candidate" {{ old('role') === 'Candidate' ? 'selected' : '' }}>Job Seeker</option>
                                </select>
                                <x-input-error :messages="$errors->get('role')" class="mt-2" />
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <div>
                                    <label for="email_verified_true">
                                        <input type="radio" id="email_verified_true" name="email_verified" value="1" {{ old('email_verified') ? 'checked' : '' }}>
                                        Verified
                                    </label>
                                    <label for="email_verified_false">
                                        <input type="radio" id="email_verified_false" name="email_verified" value="0" {{ old('email_verified') === '0' ? 'checked' : '' }}>
                                        Not Verified
                                    </label>
                                </div>
                                <x-input-error :messages="$errors->get('email_verified')" class="mt-2" />
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
