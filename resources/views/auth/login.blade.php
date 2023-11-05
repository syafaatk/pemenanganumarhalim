@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row col-md-12">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row">
                                <label for="email" class="col-md-6 col-form-label">{{ __('E-Mail Address') }}</label>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <label for="password" class="col-md-6 col-form-label">{{ __('Password') }}</label>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
    {{-- 
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="page-content">
                            <div data-elementor-type="wp-page" data-elementor-id="219" class="elementor elementor-219">
                                <section class="elementor-section elementor-top-section elementor-element elementor-element-22dbecbd elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="22dbecbd" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;jet_parallax_layout_list&quot;:[]}">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-50fdedfd" data-id="50fdedfd" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated elementor-motion-effects-parent">
                                                <section class="elementor-section elementor-inner-section elementor-element elementor-element-4bff0470 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-motion-effects-element elementor-motion-effects-element-type-background" data-id="4bff0470" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;background_motion_fx_motion_fx_mouse&quot;:&quot;yes&quot;,&quot;background_motion_fx_mouseTrack_effect&quot;:&quot;yes&quot;,&quot;jet_parallax_layout_list&quot;:[],&quot;background_motion_fx_mouseTrack_speed&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]}}">
                                                    <div class="elementor-motion-effects-container">
                                                        <div class="elementor-motion-effects-layer" style="width: 110%; height: 110%; --translateX: -95.54450867052013px; --translateY: -10.084444561774026px; transform: translateX(var(--translateX))translateY(var(--translateY));">
                                                        </div>
                                                    </div>
                                                    <div class="elementor-container elementor-column-gap-default">
                                                        <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-fac5678 animated-slow animated zoomIn" data-id="fac5678" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;zoomIn&quot;,&quot;animation_delay&quot;:500}">
                                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                                <div class="elementor-element elementor-element-361d8de3 elementor-widget elementor-widget-heading" data-id="361d8de3" data-element_type="widget" data-widget_type="heading.default">
                                                                    <div class="elementor-widget-container">
                                                                        <style>/*! elementor - v3.12.1 - 02-04-2023 */
                                                                            .elementor-heading-title
                                                                            {
                                                                                padding:0;
                                                                                margin:0;
                                                                                line-height:1
                                                                            }
                                                                            .elementor-widget-heading .elementor-heading-title[class*=elementor-size-]>a
                                                                            {
                                                                                color:inherit;
                                                                                font-size:inherit;
                                                                                line-height:inherit
                                                                            }
                                                                            .elementor-widget-heading .elementor-heading-title.elementor-size-small
                                                                            {
                                                                                font-size:15px
                                                                            }
                                                                            .elementor-widget-heading .elementor-heading-title.elementor-size-medium   
                                                                            {
                                                                                font-size:19px
                                                                            }
                                                                            .elementor-widget-heading .elementor-heading-title.elementor-size-large
                                                                            {
                                                                                font-size:25px
                                                                            }
                                                                            .elementor-widget-heading .elementor-heading-title.elementor-size-xl
                                                                            {
                                                                                font-size:35px
                                                                            }
                                                                            .elementor-widget-heading .elementor-heading-title.elementor-size-xxl
                                                                            {
                                                                                font-size:40px
                                                                            }
                                                                        </style>
                                                                        <h1 class="elementor-heading-title elementor-size-medium">BANTU RAKYAT</h1>	
                                                                        {{-- <h2 class="elementor-heading-title elementor-size-small">Menuju Indonesia Sejahtera dan Maju</h2>		 --}}
                                                                    </div>
                                                                </div>
                                                                <div class="elementor-element elementor-element-46901ca6 elementor-widget elementor-widget-heading" data-id="46901ca6" data-element_type="widget" data-widget_type="heading.default">
                                                                    <div class="elementor-widget-container">
                                                                        <p class="elementor-heading-title elementor-size-default">
                                                                            Palembang - Banyuasin - Musi Banyuasin - Musi Rawas - Lubuk linggau - Musi Rawas Utara
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="elementor-element elementor-element-11d9ad2 elementor-hidden-mobile elementor-widget elementor-widget-video" data-id="11d9ad2" data-element_type="widget" data-settings="{&quot;youtube_url&quot;:&quot;https:\/\/youtu.be\/gsqWKOmcpy4&quot;,&quot;video_type&quot;:&quot;youtube&quot;,&quot;controls&quot;:&quot;yes&quot;}" data-widget_type="video.default">
                                                                    <div class="elementor-widget-container">
                                                                        <style>/*! elementor - v3.12.1 - 02-04-2023 */
                                                                            .elementor-widget-video .elementor-widget-container{overflow:hidden;transform:translateZ(0)}.elementor-widget-video .elementor-wrapper iframe,.elementor-widget-video .elementor-wrapper video{height:100%;width:100%;display:flex;border:none;background-color:#000}.elementor-widget-video .elementor-open-inline .elementor-custom-embed-image-overlay{position:absolute;top:0;left:0;width:100%;height:100%;background-size:cover;background-position:50%}.elementor-widget-video .elementor-custom-embed-image-overlay{cursor:pointer;text-align:center}.elementor-widget-video .elementor-custom-embed-image-overlay:hover .elementor-custom-embed-play i{opacity:1}.elementor-widget-video .elementor-custom-embed-image-overlay img{display:block;width:100%}.elementor-widget-video .e-hosted-video .elementor-video{-o-object-fit:cover;object-fit:cover}.e-con-inner>.elementor-widget-video,.e-con>.elementor-widget-video{width:var(--container-widget-width);--flex-grow:var(--container-widget-flex-grow)}
                                                                        </style>
                                                                        <div class="elementor-wrapper elementor-open-inline">
                                                                            <video class="elementor-video" width="320" height="240" controls>
                                                                                <source src="{{ url('/upload/post/cea7ef3b.mp4') }}" type="video/mp4">
                                                                                    Your browser does not support the video tag.
                                                                                </video>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-408f3c4e" data-id="408f3c4e" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;slideshow&quot;,&quot;background_slideshow_gallery&quot;:[{&quot;id&quot;:1737,&quot;url&quot;:&quot;https:\/\/template2.kamisatu.co.id\/wp-content\/uploads\/2023\/04\/14321b05-ellipse-1.png&quot;}],&quot;background_slideshow_loop&quot;:&quot;yes&quot;,&quot;background_slideshow_slide_duration&quot;:5000,&quot;background_slideshow_slide_transition&quot;:&quot;fade&quot;,&quot;background_slideshow_transition_duration&quot;:500}"><div class="elementor-background-slideshow swiper-container" dir="rtl"><div class="swiper-wrapper"><div class="elementor-background-slideshow__slide swiper-slide">
                                                                
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-6affffe elementor-absolute elementor-widget__width-auto elementor-position-top elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-id="6affffe" data-element_type="widget" data-settings="{&quot;_animation_mobile&quot;:&quot;slideInUp&quot;,&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="image-box.default">
                                                        <div class="elementor-widget-container">
                                                            <style>/*! elementor - v3.12.1 - 02-04-2023 */
                                                                .elementor-widget-image-box .elementor-image-box-content{width:100%}@media (min-width:768px){.elementor-widget-image-box.elementor-position-left .elementor-image-box-wrapper,.elementor-widget-image-box.elementor-position-right .elementor-image-box-wrapper{display:flex}.elementor-widget-image-box.elementor-position-right .elementor-image-box-wrapper{text-align:right;flex-direction:row-reverse}.elementor-widget-image-box.elementor-position-left .elementor-image-box-wrapper{text-align:left;flex-direction:row}.elementor-widget-image-box.elementor-position-top .elementor-image-box-img{margin:auto}.elementor-widget-image-box.elementor-vertical-align-top .elementor-image-box-wrapper{align-items:flex-start}.elementor-widget-image-box.elementor-vertical-align-middle .elementor-image-box-wrapper{align-items:center}.elementor-widget-image-box.elementor-vertical-align-bottom .elementor-image-box-wrapper{align-items:flex-end}}@media (max-width:767px){.elementor-widget-image-box .elementor-image-box-img{margin-left:auto!important;margin-right:auto!important;margin-bottom:15px}}.elementor-widget-image-box .elementor-image-box-img{display:inline-block}.elementor-widget-image-box .elementor-image-box-title a{color:inherit}.elementor-widget-image-box .elementor-image-box-wrapper{text-align:center}.elementor-widget-image-box .elementor-image-box-description{margin:0}</style><div class="elementor-image-box-wrapper"><figure class="elementor-image-box-img"><img decoding="async" width="512" height="493" src="{{ url('/upload/post/15906538096.jpg') }}" class="attachment-full size-full wp-image-1576" alt="" loading="lazy" srcset="{{ url('/upload/post/15906538096.jpg') }}" sizes="(max-width: 512px) 100vw, 512px"></figure></div>		</div>
                                                            </div>
                                                            <div class="elementor-element elementor-element-571c87c elementor-widget elementor-widget-heading" data-id="571c87c" data-element_type="widget" data-settings="{&quot;_animation_mobile&quot;:&quot;zoomIn&quot;}" data-widget_type="heading.default">
                                                                <div class="elementor-widget-container">
                                                                    <h3 class="elementor-heading-title elementor-size-small">DAPIL SUMSEL 1</h3></div>
                                                                </div>
                                                                <div class="elementor-element elementor-element-154f9b1a animated-slow elementor-widget elementor-widget-image animated fadeIn" data-id="154f9b1a" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeIn&quot;,&quot;_animation_delay&quot;:1000}" data-widget_type="image.default">
                                                                    <div class="elementor-widget-container">
                                                                        <img decoding="async" width="700" height="988" style="width:100%;" src="{{ url('/upload/post/1588539656.png') }}" class="attachment-full size-full wp-image-2129" alt="" loading="lazy" srcset="{{ url('/upload/post/1588539656.png') }}">															</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                    <div class="elementor-element elementor-element-7ea8a32 elementor-hidden-desktop elementor-hidden-tablet elementor-widget elementor-widget-video" data-id="7ea8a32" data-element_type="widget" data-settings="{&quot;youtube_url&quot;:&quot;https:\/\/youtu.be\/gsqWKOmcpy4&quot;,&quot;video_type&quot;:&quot;youtube&quot;,&quot;controls&quot;:&quot;yes&quot;}" data-widget_type="video.default">
                                                        <div class="elementor-widget-container">
                                                            <div class="elementor-wrapper elementor-open-inline">
                                                                <iframe class="elementor-video" frameborder="0" allowfullscreen="1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" title="Anda Seorang Caleg? Luangkan waktu 3 menit melihat video ini" width="640" height="360" src="{{ url('/upload/post/cea7ef3b.mp4') }}" id="widget4"></iframe>		</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
