{{-- @dd($user) --}}
<!-- HTML -->
@extends('layouts.app')
@section('content')
@foreach($get as $user)
<div class="user-details-container">
    <header>
        <img src="profile-picture.jpg" alt="Profile Picture" class="profile-picture">
        <h2>{{ $user['name']}}</h2>
        <button class="edit-profile-btn">Edit Profile</button>
    </header>
    
    <section class="personal-info-section">
        <h3>Personal Information</h3>
        <form >
            <div class="mb-3">
                <label for="full-name">Full Name:</label>
                <input type="text" id="full-name" readonly value="{{ $user['name'] }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="email">Email:</label>
                <input type="email" id="email" value="{{ $user['email'] }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="phone-number">Phone Number:</label>
                <input type="tel" id="phone-number" value="{{ $user['phone_number'] }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="address">Address:</label>
                <input type="text" id="address" value="{{ $user['address'] }}" class="form-control">
            </div>
        </form>
    </section>

    {{-- <button class="save-changes-btn">Save Changes</button>   --}}
</div>
<style>
/* CSS */
.user-details-container {
    max-width: 800px;
    margin: 40px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

header {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.profile-picture {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin-right: 10px;
}

.edit-profile-btn {
    background-color: #4CAF50;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
}

.edit-profile-btn:hover {
    background-color: #3e8e41;
}

section {
    margin-bottom: 20px;
}

h3 {
    margin-top: 0;
}

form .mb-3 {
    margin-bottom: 1rem;
}

form .mb-3 label {
    display: block;
    margin-bottom: 0.5rem;
}

form .mb-3 input {
    width: 100%;
    padding: 0.5rem;
    box-sizing: border-box;
}

.save-changes-btn {
    background-color: #007BFF;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
}

.save-changes-btn:hover {
    background-color: #0056b3;
}
</style>
@endforeach
@endsection
