{{-- @if (Auth::guard('user')->check())
<p class="text-success">Logged in as <b>USER</b></p>
@else
<p class="text-danger">Logged out as <b>USER</b></p>
@endif
<hr>
@if (Auth::guard('service-provider')->check())
<p class="text-success">Logged in as <b>PROVIDER</b></p>
@else
<p class="text-danger">Logged out as <b>PROVIDER</b></p>
@endif --}}

<hr>
@if (Auth::guard('super-admin')->check())
<p class="text-success">Logged in as <b>SUPERADMIN</b></p>
@else
<p class="text-danger">Logged out as <b>SUPERADMIN</b></p>
@endif
<hr>
@if (Auth::guard('admin')->check())
<p class="text-success">Logged in as <b>ADMIN</b></p>
@else
<p class="text-danger">Logged out as <b>ADMIN</b></p>
@endif

<hr>
@if (Auth::guard('admin-staff')->check())
<p class="text-success">Logged in as <b>ADMIN STAFF</b></p>
@else
<p class="text-danger">Logged out as <b>ADMIN STAFF</b></p>
@endif

{{--
<hr>
@if (Auth::guard('dist-user')->check())
<p class="text-success">Logged in as <b>DISTRIBUTOR</b></p>
@else
<p class="text-danger">Logged out as <b>DISTRIBUTOR</b></p>
@endif


<hr>
@if (Auth::guard('vndr-user')->check())
<p class="text-success">Logged in as <b>VENDOR</b></p>
@else
<p class="text-danger">Logged out as <b>VENDOR</b></p>
@endif --}}
