@extends('partial.layout_news')

@section('content')
  <div class="container" style="padding-bottom: 20px; background: #eee; min-height: 500px;
                                margin-top: 20px; 
                                -webkit-box-shadow: -3px 2px 18px 6px rgba(0,0,0,0.45);
                                -moz-box-shadow: -3px 2px 18px 6px rgba(0,0,0,0.45);
                                box-shadow: -3px 2px 18px 6px rgba(0,0,0,0.45); ">
    <h2 style="margin-top: 1em; width: 100%;">Tin {{$nameCategory[0]}}</h2>
    <div class="col-md-8">                            
      @foreach($news as $key => $val)
      <link rel="stylesheet" type="text/css" href="{{url('/')}}/css/css/detail.css">
          <div class="contentDetail" >
            <a class="BB" href="{{url('/')}}/news_detail/{{$val->slug}}-{{$val->id}}.html" style="cursor: pointer; ">
              <div class="media" style=" border-bottom: 1px solid black ; margin-top: 10px; padding-bottom: 5px;">
                <img class="align-self-center mr-3" src="{{$val->image}}" alt="Generic placeholder image" style="width: 100px; height: 100px; float: left; padding: 3px 0px; border:1px solid; padding: 3px; color: #727272;">
                <div class="media-body">
                  <p style="margin-left: 10px; font-size: 23px; ">{{$val->tieu_de}}</p>
                  <h6 style="margin-left: 10px;">{{$val->noi_dung_tom_tat}}</h6>
                </div>
              </div>
            </a>
          </div> 
      @endforeach
    </div>
    <div class="col-md-4" >
      <div  style="min-height: 250px;">
            Tin {{$nameCategoryOffer1[0]}}
            @foreach($contentOffer1 as $key => $offer1)
              <div>
                <a href="{{url('/')}}/news_detail/{{$offer1->slug}}-{{$offer1->id}}.html" style="cursor: pointer;">
                  <img style="width: 50px; height: 50px; float: left; clear: left;padding: 2px; border: 1px solid; margin-right: 10px;" src="{{$offer1->image}}">
                  <p>{{$offer1->tieu_de}}</p>
                </a>
              </div>
            @endforeach
      </div>
      <div  style="min-height: 250px; clear: left;">
            Tin {{$nameCategoryOffer2[0]}}
            @foreach($contentOffer2 as $key => $offer2)
              <div>
                <a href="{{url('/')}}/news_detail/{{$offer2->slug}}-{{$offer2->id}}.html" style="cursor: pointer;">
                  <img style="width: 50px; height: 50px; float: left; clear: left; padding: 2px; border: 1px solid; margin-right: 10px;" src="{{$offer2->image}}">
                  <p>{{$offer2->tieu_de}}</p>
                </a>
              </div>
            @endforeach
      </div>
    </div>
  </div>
@endsection