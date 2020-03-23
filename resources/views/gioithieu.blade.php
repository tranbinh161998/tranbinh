@extends('partial.layout')

@section('content')

 <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">id</th>
      <th scope="col">username</th>
      <th scope="col">email</th>
      <th scope="col">password</th>
      <th scope="col">phone_number</th>
      <th scope="col">date</th>
    </tr>
  </thead>
  <tbody>
    @foreach($caNhan as $key => $value)
    <tr>
      <th scope="row">{{$value->id}}</th>
      <td>{{$value->username}}</td>
      <td>{{$value->email}}</td>
      <td>{{$value->password}}</td>
      <td>{{$value->phone_number}}</td>
      <td>{{$value->date}}</td>
    </tr>
    @endforeach
  </tbody>
</table>



@endsection