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
        <h2><span>New Courses</span></h2>
        <div class="row">
    
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="newsBox">
                    <div class="thumbnail">
                        <figure><img src="{{asset('frontend/images/news2.jpg')}}" alt=""></figure>
                        <div class="caption maxheight2">
                        <div class="box_inner">
                                    <div class="box">
                                        <p class="title"><h5>Developer</h5></p>
                                        <p>Lorem ipsum dolor sit amet, conc tetu er adipi scing. Praesent ves tibuum molestie lacuiirhs. Aenean.</p>
                                    </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="newsBox">
                    <div class="thumbnail">
                        <figure><img src="{{asset('frontend/images/news3.jpg')}}" alt=""></figure>
                        <div class="caption maxheight2">
                        <div class="box_inner">
                                    <div class="box">
                                        <p class="title"><h5>Photography   </h5></p>
                                        <p>Lorem ipsum dolor sit amet, conc tetu er adipi scing. Praesent ves tibuum molestie lacuiirhs. Aenean.</p>
                                    </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="newsBox">
                    <div class="thumbnail">
                        <figure><img src="{{asset('frontend/images/news4.jpg')}}" alt=""></figure>
                        <div class="caption maxheight2">
                        <div class="box_inner">
                                    <div class="box">
                                        <p class="title"><h5>Audio Editing</h5></p>
                                        <p>Lorem ipsum dolor sit amet, conc tetu er adipi scing. Praesent ves tibuum molestie lacuiirhs. Aenean.</p>
                                    </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop