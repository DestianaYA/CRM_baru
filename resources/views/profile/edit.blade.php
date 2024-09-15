    @extends('layouts.app')
    <body>
        @section('content')
        <div class="edit">
            <div class="container profile-container blue-padding">
                @if(session('success'))
                <div style="color: yellow;font-size: 24px;">
                    {{ session('success') }}
                </div>
                    <script>
                        setTimeout(function() {
                            document.getElementById('success-alert').style.display = 'none';
                        }, 5000); // 5000 milliseconds = 5 seconds
                    </script>
                @endif
                <div class="container profile-user">
                    <h2>User Profile</h2>
                </div>
                <div class="text-center">
                    @if($user->profile_image)
                        <img src="{{ asset('images/' . $user->profile_image) }}" alt="Profile Image" class="profile-image-icon">
                    @else
                        <img src="{{ asset('images/default-profile.png') }}" alt="Default Profile Image" class="profile-image-icon">
                    @endif
                </div>
                <!-- Profile Form -->
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="profile-form form-background-blue">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" value="{{ $user->email }}" disabled>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" value="********" disabled>
                    </div>

                    <div class="form-group">
                        <label for="role">Role:</label>
                        <input type="text" class="form-control" id="role" value="{{ $user->role }}" disabled>
                    </div>

                    <div class="form-group">
                        <label for="phone_number">Phone Number:</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $user->phone_number }}">
                    </div>

                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}">
                    </div>

                    <div class="form-group">
                        <label for="agent_id">Agent ID:</label>
                        <input type="text" class="form-control" id="agent_id" value="{{ $user->agent_id }}" disabled>
                    </div>

                    <div class="form-group text-center">
                        <label for="profile_image">Update Profile Image:</label>
                        <input type="file" class="form-control-file" id="profile_image" name="profile_image">
                    </div>
                    <div class="form-group text-center">
                        <button type="button" class="btn btn-secondary" onclick="goBack()">Kembali</button>
                        <button type="submit" class="btn btn-secondary">Update</button>
                    </div>
                </form>
            </div>
        </div>
        @endsection


        <!-- table list -->
        <script src="{{ asset('assets/js/previous.js') }}"></script>

    </body>
