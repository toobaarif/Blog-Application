
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>EchoingThoughts - Clean Blog </title>
        <link rel="icon" type="image/x-icon" href="{{url('assets/imgs/favicon.ico')}}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{url('assets/css/styles.css')}}" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        @include('navbar')
        @include('header')


        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="">
                    <!-- Post preview-->
                    {{-- <div class="post-preview">
                        <a href="post.html">
                            <h2 class="post-title">Man must explore, and this is exploration at its greatest</h2>
                            <h3 class="post-subtitle">Problems look mighty small from 150 miles up</h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">Start Bootstrap</a>
                            on September 24, 2023
                        </p>
                    </div> --}}
                    <!-- Divider-->



    <!-- Blogs -->
    <!-- Blogs -->
    <div class="container py-4">
        <h2 class="mb-4"><a href="#" class="text-dark">Latest Blogs</a></h2>
        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-md-6 col-lg-4 mb-4"> 
                    <a href="{{ url('blog-details', $blog->id) }}" class="text-decoration-none">
                        <div class="card h-100">
                            <div style="height: 200px; overflow: hidden;">
                                <img src="blog_pic/{{ $blog->image }}" class="card-img-top w-100" alt="{{ $blog->title }}">
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title flex-fill mb-0"><a href="{{ url('blog-details', $blog->id) }}" class="text-dark">{{ $blog->title }}</a></h5>
                                <p class="card-text flex-fill" style="font-size: 15px">Posted: {{ $blog->created_at->format('Y-m-d') }}</p>
                                <a href="{{ url('blog-details', $blog->id) }}" class="btn btn-warning mt-auto">Read More</a>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    




                    <hr class="my-4" />
                    <!-- Pager-->
                    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="small text-center text-muted fst-italic">Copyright &copy; Blog Website 2023</div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{url('assets/js/scripts.js')}}"></script>
    </body>
</html>












































