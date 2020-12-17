@extends('layout.master')
@section('content')

<body>
    
    
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
            </div>
        </div>
    </div>
    <!-- End All Title Box -->
    
    <!-- Start About Page  -->
    <div class="about-box-main">
        <div class="container">
            <div class="row">
                @foreach ($stories as $item)
                <div class="col-lg-10 mt-3">
                    <h2 class="noo-sh-title-top">{{$item->judul}}</span></h2>
                    <p>Author : {{$item->author}}</p>
                    <br>
                    <img src="{{asset('storage/'. $item->avatar_pengalaman)}}" alt="" width="600">
                    <br>
                    <br>            
                    <p>{{$item->konten}}</p>
                    @endforeach
                    <br>
                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Komentar</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </form>
                    <br>
                    <br>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-sm-20">
                                <div class="contact-form-left">
                                    <h2>Tambahkan Komentar</h2>
                                    <form id="contactForm">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea class="form-control" id="message" placeholder="tulis komentar anda" rows="4" data-error="Write your message" required></textarea>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="submit-button text-center">
                                                    <button class="btn hvr-hover" id="submit" type="submit">Bagikan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>    
                    <br>
                    <br>
                    <a class="btn hvr-hover" href="{{url('/testimoni')}}">Kembali</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Page -->
    
    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-01.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-02.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-03.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-04.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-06.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-07.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-08.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-09.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagram Feed  -->
    
    
    
    
</body>

</html>



@endsection
