@extends('partial.layOutAdmin')

@section('content')
<link rel="stylesheet" type="text/css" href="{{url('/')}}/css/admin/contact.css">
    <section id="contact">
        <h1 class="section-header">Liên Hệ Của Admin</h1>
        <div class="contact-wrapper">
            <form style="width: 500px;" class="form-horizontal"  method='post' action="{{route('contactUpdate')}}">
                {!! csrf_field() !!}
                <div class="form-group">
                    <div class="col-sm-12">
                        <input style="background: #111;" type="text" class="form-control" id="name" placeholder="Tên Của Bạn" name="name" value="{{$contact->name}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                    <input style="background: #111;" type="number" class="form-control" id="phoneNumber" placeholder="Số Điện Thoại" name="phoneNumber" value="{{$contact->phoneNumber}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                    <input style="background: #111;" type="text" class="form-control" id="address" placeholder="Địa chỉ của bạn" name="address" value="{{$contact->address}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                    <input style="background: #111;" type="email" class="form-control" id="email" placeholder="G-MAIL Của Bạn" name="gmail" value="{{$contact->gmail}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                    <input style="background: #111;" type="text" class="form-control" id="facebook" placeholder="Link FaceBook Của Bạn" name="facebook" value="{{$contact->facebook}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                    <input style="background: #111;" type="text" class="form-control" id="Twitter" placeholder="Link Twitter Của Bạn" name="twitter" value="{{$contact->twitter}}">
                    </div>
                </div>
                
                <button style="width: 100%; background: #111; text-align: center; color: #e9ebec; border-radius: 7px; cursor: pointer; "  type="submit">Gửi</button>
            </form>
    

    
            <div class="direct-contact-container">

                <ul class="contact-list">
                    <li class="list-item"><i class="fa fa-map-marker fa-2x"><span class="contact-text place">Hiệp Hòa | Bắc Giang </span></i></li>
                    <li class="list-item"><i class="fa fa-phone fa-2x"><span class="contact-text phone"><a href="tel:1-212-555-5555" title="Give me a call">036-283-4046</a></span></i></li>
                    <li class="list-item"><i class="fa fa-envelope fa-2x"><span class="contact-text gmail"><a href="mailto:#" title="Send me an email">tranbinh16101998@gmail.com</a></span></i></li>
                </ul>
                <ul class="social-media-list">
                    <li><a href="{{url('/')}}" target="_blank" class="contact-icon">
                    <i class="fas fa-id-card-alt"></i></a>
                    </li>
                    <li><a href="{{url('/')}}" target="_blank" class="contact-icon">
                    <i class="fab fa-facebook-messenger"></i></a>
                    </li>
                    <li><a href="{{url('/')}}" target="_blank" class="contact-icon">
                    <i class="fab fa-google-plus-g"></i></a>
                    </li>
                </ul>
                <div class="copyright">&copy; Liên hệ với chúng tôi </div>

            </div>
    
  </div>
  
</section>  
  
  
@endsection