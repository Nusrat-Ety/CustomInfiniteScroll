@foreach($users as $user)
<div class="card" style="margin-top:20px;">
<div class="card-header">
    <h3>{{$user->id}}</h3>
</div>
<div class="card-body">
    <p>{{$user->full_name}}</p>
    <p>{{$user->email}}</p>
</div>
</div>
@endforeach