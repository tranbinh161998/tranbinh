<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{url('tem_web')}}/index.css">
    <LINK REL="SHORTCUT ICON"  HREF="{{url('tem_web')}}/logo-header.png">
    <link rel="stylesheet" type="text/css" href="{{url('tem_web')}}/font-css/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
    <select class="custom-select custom-select-sm">
          <option value="10">10</option>
          <option value="25">25</option>
          <option value="50">50</option>
          <option value="75">75</option>
          <option value="100">100</option>
    </select>
 <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">id</th>
      <th scope="col">Tên</th>
      <th scope="col">email</th>
      <th scope="col">phone</th>
      <th scope="col">Store_code</th>
      <th scope="col">type</th>
    </tr>
    </thead>
    <tbody>
        @foreach($admin as $key => $value)
            @if ($value->store_code == 'BLE')
            <tr>
              <th scope="row">{{$value->id}}</th>
              <td>{{$value->name}}</td>

              <td>{{$value->email}}</td>
              <td>{{$value->phone}}</td>
              <td>{{$value->store_code}}</td>
              <td>{{$value->type}}</td>
            </tr>
            @endif
        @endforeach
  </tbody>

  </thead>
  <tbody>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>