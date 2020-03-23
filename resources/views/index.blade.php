
@extends('partial.layout_news')

@section('content')
		@yield('content2')
		@php
            $category = \App\Models\category::all();
        @endphp
		<!-- section -->
		<div class="section" id="scroll"  >
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">	
					<!-- post -->
					@foreach($noi_dung as $key => $value)
					<div class="col-md-6 testTween">
						<div class="post post-thumb">
							<a class="post-img" href="{{url('/')}}/news_detail/{{$value->slug}}-{{$value->id}}.html"><img style="max-height:300px;" src="{{$value->image}}" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									@foreach($category as $key => $val)
										@if($value->id == $val->id_news)
											@foreach($categoryName as $key => $vlu)
												@if ($val->id_cate == $vlu->id)
													<a class="post-category cat-3" >{{$vlu->name}}</a>
												@endif
											@endforeach
										@endif
									@endforeach
									@php
										$test = date("d/m/Y", strtotime($value->date));
									@endphp
									<span class="post-date">{{$test}}</span>
								</div>
								<h3 class="post-title"><a href="{{url('/')}}/news_detail/{{$value->slug}}-{{$value->id}}.html">{{$value->noi_dung_tom_tat}}</a></h3>
							</div>
						</div>
					</div>
					@endforeach
				</div>
				<!-- /row -->

				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="section-title">
							<h2>Gần đây nhất</h2>
						</div>
					</div>

					<!-- post -->
					@foreach($noi_dung2 as $key => $val)
					<div class="col-md-4">
						<div class="post">
							<a class="post-img" href="{{url('/')}}/news_detail/{{$val->slug}}-{{$val->id}}.html"><img style="max-height: 200px;" src="{{$val->image}}" alt="" style=" width: 100%;
							height: 100%; "></a>
							<div class="post-body">
								<div class="post-meta">

									<a class="post-category cat-1"{{$val->the_loai}}</a>
										@php
											$date = date("d/m/Y", strtotime($val->date));
										@endphp
									<span class="post-date">{{$date}}</span>
								</div>
								<h3 class="post-title"><a href="{{url('/')}}/news_detail/{{$val->slug}}-{{$val->id}}.html">{{$val->noi_dung_tom_tat}}</a></h3>
							</div>
						</div>
					</div>
					@endforeach
					<!-- /post -->
					<!-- 3 end -->

					<div class="clearfix visible-md visible-lg"></div>
					</div>
	
				<!-- /row -->

				<!-- row -->
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<!-- post -->
							<div class="col-md-12 more2" >
								<div class="post post-thumb">
									<a class="post-img" href="{{url('/')}}/news_detail/{{$news->slug}}-{{$news->id}}.html"><img src="{{$news->image}}" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											@php
												$datenews = date("d/m/Y", strtotime($news->date));
											@endphp
												<span class="post-date">{{$datenews}}</span>
										</div>
										<h3 class="post-title"><a href="{{url('/')}}/news_detail/{{$news->slug}}-{{$news->id}}.html">{{$news->tieu_de}}</a></h3>
									</div>
								</div>
							</div>
							<!-- /post -->

							<!-- post -->
							@foreach ($news2 as $key=>$value)
							<div class="col-md-6">
								<div class="post">
									<a class="post-img" href="{{url('/')}}/news_detail/{{$value->slug}}-{{$value->id}}.html"><img src="{{$value->image}}" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											@php
												$date = date("d/m/Y", strtotime($value->date));
											@endphp
											<span class="post-date">{{$date}}</span>
										</div>
										<h3 class="post-title"><a href="{{url('/')}}/news_detail/{{$value->slug}}-{{$value->id}}.html">{{$value->tieu_de}}</a></h3>
									</div>
								</div>
							</div>
							@endforeach
							<!-- /post -->
							<!-- /post -->

							<div class="clearfix visible-md visible-lg"></div>

							<!-- post -->
							@foreach ($news3 as $key=>$value)
							<div class="col-md-6">
								<div class="post">
									<a class="post-img" href="{{url('/')}}/news_detail/{{$value->slug}}-{{$value->id}}.html"><img src="{{$value->image}}" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											@php
												$date = date("d/m/Y", strtotime($value->date));
											@endphp
											<span class="post-date">{{$date}}</span>
										</div>
										<h3 class="post-title"><a href="{{url('/')}}/news_detail/{{$value->slug}}-{{$value->id}}.html">{{$value->tieu_de}}</a></h3>
									</div>
								</div>
							</div>
							@endforeach
							<!-- /post -->

							<div class="clearfix visible-md visible-lg"></div>

							@foreach ($news5 as $key=>$value)
							<div class="col-md-6">
								<div class="post">
									<a class="post-img" href="{{url('/')}}/news_detail/{{$value->slug}}-{{$value->id}}.html"><img src="{{$value->image}}" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											@php
												$date = date("d/m/Y", strtotime($value->date));
											@endphp
											<span class="post-date">{{$date}}</span>
										</div>
										<h3 class="post-title"><a href="{{url('/')}}/news_detail/{{$value->slug}}-{{$value->id}}.html">{{$value->tieu_de}}</a></h3>
									</div>
								</div>
							</div>
							@endforeach
							<!-- /post -->
						</div>
					</div>

					<div class="col-md-4">
						<!-- post widget -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Đọc nhiều nhất</h2>
							</div>
							@foreach($contentHightView as $key => $value)
								<div class="post viewNumber post-widget" >
									<a class="post-img" href="{{url('/')}}/news_detail/{{$value->slug}}-{{$value->id}}.html"><img style=" width: 100px;height: 100px; border: 1px solid; padding: 3px;" src="{{url('/')}}/{{$value->image}}" alt=""></a>
									<div class="post-body" style="min-height: 80px;">
										<h3 class="post-title"><a href="{{url('/')}}/news_detail/{{$value->id}}">{{$value->tieu_de}}</a></h3>
									</div>
									<i style=" color: #A9A9A9; margin-bottom:0px;" class="fas fa-eye"> {{$value->viewNumber}}</i>
								</div>
							@endforeach
						<!-- /post widget -->

						<!-- post widget -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Xem phim hay tại đây</h2>
							</div>
							<div class="post post-thumb">
								<a class="post-img" href="{{url('/')}}/videos"><img src="{{url('/')}}/image/unnamed.jpg" alt=""></a>
								<div class="post-body">
									<div class="post-meta">
										<span class="post-date">Avenger end Game</span>
									</div>
									<h3 class="post-title"><a href="{{url('/')}}/videos">Avenger end Game</a></h3>
								</div>
							</div>

							<div class="post post-thumb">
								<a class="post-img" href="{{url('/')}}/videos"><img src="{{url('/')}}/image/27404f8e7ecd9793cedc.jpg" alt=""></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category cat-2" href="{{url('/')}}/videos">HD</a>
										<span class="post-date"></span>
									</div>
									<h3 class="post-title"><a href="{{url('/')}}/videos">Lưỡng thế hoan</a></h3>
								</div>
							</div>
						</div>
						<!-- /post widget -->
						
						<!-- ad -->
						<div class="aside-widget text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="" alt="">
							</a>
						</div>
						<!-- /ad -->
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->
		
		<!-- section -->
		<div class="section section-grey more" >
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="section-title text-center" >
							<h2>Tin thể thao</h2>
						</div>
					</div>

					<!-- post -->
					@foreach ( $the_thao as $key=>$value)
						<div class="col-md-4" >
							<div class="post">
								<a class="post-img" href="{{url('/')}}/news_detail/{{$value->slug}}-{{$value->id}}.html"><img src="{{$value->image}}" alt=""></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category cat-2" href="category.html">Thể thao</a>
										@php
											$date = date("d/m/Y", strtotime($value->date));
										@endphp
										<span class="post-date">{{$date}}</span>
									</div>
									<h3 class="post-title"><a href="{{url('/')}}/news_detail/{{$value->slug}}-{{$value->id}}.html">{{$value->tieu_de}}</a></h3>
								</div>
							</div>
						</div>
					@endforeach
					<!-- /post -->

					<!-- /post -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->

		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-12">
								<div class="section-title">
									<h2>Tin Giải Trí</h2>
								</div>
							</div>
							<!-- post -->
							@foreach ( $giai_tri as $key=>$value)
							<div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="{{url('/')}}/news_detail/{{$value->slug}}-{{$value->id}}.html"><img src="{{$value->image}}" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="{{url('/')}}/news_detail/{{$value->slug}}-{{$value->id}}.html">Giải Trí</a>
										@php
											$date = date("d/m/Y", strtotime($value->date));
										@endphp
										<span class="post-date">{{$date}}</span>
										</div>
										<h3 class="post-title"><a href="{{url('/')}}/news_detail/{{$value->slug}}-{{$value->id}}.html">{{$value->tieu_de}}</a></h3>
										<p>{{$value->noi_dung_tom_tat}}</p>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					<div class="col-md-4">
						<!-- ad -->
						<div class="aside-widget text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="{{url('/')}}/css/img/ad-1.jpg" alt="">
							</a>
						</div>

						<!-- /ad -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Thịnh hành</h2>
							</div>
							<div class="category-widget">
								<ul>
								</ul>
							</div>
						</div>
						<!-- /catagories -->
						
						<!-- tags -->
						<div class="aside-widget">
							<div class="tags-widget">
								<ul>
									@foreach ($popular as $key=>$value)
									<li><a href="">#{{$key + 1}} {{$value}}</a></li>
									@endforeach
								</ul>
							</div>
						</div>
						<!-- /tags -->
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- @yield('content2') -->

		<!-- /section -->
@endsection
