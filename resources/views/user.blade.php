@if($user)
    <p>
        Hello, you just got to the profile page for {{ $user }}!
    </p>
@else
    <p>
        No user page found.
    <p>
@endif