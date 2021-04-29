@extends('layouts.frontend')

@section('content')

<div class="container">
				<div class="row">
					<div class="col-md-8">
						<h3 class="section-title">{{$post->title}}</h3>
						{!!$post->content!!}
                    </div>
					<div class="col-md-4">
						<div class="row">
							<div class="col-md-6">
								<h3 class="section-title">Credits</h3>
								<div class="contact-info">
									<h5>Penulis</h5>
									<p>{{$post->user->name}}</p>
									
									<h5>Diposting tanggal :</h5>
									<p>{{$post->created_at->format('D, d M Y')}}</p>
									
								</div>
							</div> 
						</div> 						
					</div>
				</div>
			</div>

@stop