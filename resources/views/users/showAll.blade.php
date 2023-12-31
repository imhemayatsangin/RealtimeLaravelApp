@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow rounded">
                <div class="card-header">Users</div>

                <div class="card-body">
                <ul id="users"></ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

<script type="module">

window.axios.get('/api/users')
.then(response => {
    let users = response.data;

    const UserElement=document.getElementById('users');

users.forEach((user,index) => {
    let element= document.createElement('li');
    element.setAttribute('id',user.id);
    element.innerHTML=`${user.name} ${user.email}`;
    UserElement.appendChild(element);
    
});

});


//     Echo.channel('users')
//     .listen('UserCreated', (e)=>{
//      const UserElement=document.getElementById('users');
//    let element= document.createElement('li');
//     element.setAttribute('id',e.user.id);
//     element.innerHTML=`${e.user.name} ${e.user.email}`;
//     UserElement.appendChild(element);

//     })
  
//     .listen('UserUpdated', (e)=>{
//         let element=document.getElementById(e.user.id);
//         element.innerHTML=`${e.user.name} ${e.user.email}`;

//     })
 
//     .listen('UserDeleted', (e)=>{
//         let element=document.getElementById(e.user.id);
//         element.parentNode.removeChild(element);

//     });



</script>


@endpush