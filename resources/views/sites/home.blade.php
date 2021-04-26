@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="grey-box-icon">
                <div class="icon-box-top grey-box-icon-pos">
                    <img src="{{asset('frontend/images/1.png')}}" alt="" />
                </div><!--icon box top -->
                <h4>{{config('sekolah.home_feature_column_1_title')}}</h4>
                <p>{{config('sekolah.home_feature_column_1_content')}}</p>
                <p><a href="#"><em>{{config('sekolah.home_feature_column_1_link_text')}} →</em></a></p>
            </div><!--grey box -->
        </div><!--/span3-->
        <div class="col-md-3">
            <div class="grey-box-icon">
                <div class="icon-box-top grey-box-icon-pos">
                    <img src="{{asset('frontend/images/2.png')}}" alt="" />
                </div><!--icon box top -->
                <h4>{{config('sekolah.home_feature_column_2_title')}}</h4>
                <p>{{config('sekolah.home_feature_column_2_content')}}</p>
                <p><a href="#"><em>{{config('sekolah.home_feature_column_2_link_text')}} →</em></a></p>
            </div><!--grey box -->
        </div><!--/span3-->
        <div class="col-md-3">
            <div class="grey-box-icon">
                <div class="icon-box-top grey-box-icon-pos">
                    <img src="{{asset('frontend/images/3.png')}}" alt="" />
                </div><!--icon box top -->
                <h4>{{config('sekolah.home_feature_column_3_title')}}</h4>
                <p>{{config('sekolah.home_feature_column_3_content')}}</p>
                <p><a href="#"><em>{{config('sekolah.home_feature_column_3_link_text')}} →</em></a></p>
            </div><!--grey box -->
        </div><!--/span3-->
        <div class="col-md-3">
            <div class="grey-box-icon">
                <div class="icon-box-top grey-box-icon-pos">
                    <img src="{{asset('frontend/images/4.png')}}" alt="" />
                </div><!--icon box top -->
                <h4>{{config('sekolah.home_feature_column_4_title')}}</h4>
                <p>{{config('sekolah.home_feature_column_4_content')}}</p>
                <p><a href="#"><em>{{config('sekolah.home_feature_column_1_link_text')}} →</em></a></p>
            </div><!--grey box -->
        </div><!--/span3-->
    </div>
</div>
    <section class="news-box top-margin">
    <div class="container">
        <h2><span>Kabar Terbaru</span></h2>
        <div class="row">
            @foreach($posts as $post)
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="newsBox">
                    <div class="thumbnail">
                        <figure><img src="{{$post->thumbnail()}}" alt=""></figure>
                        <div class="caption maxheight2">
                        <div class="box_inner">
                                    <div class="box">
                                        <a href = "{{route('site.single.post', $post->slug)}}"><p class="title"><h5>{{$post->title}}</h5></p></a>
                                        {!!$post->content!!}
                                    </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@stop