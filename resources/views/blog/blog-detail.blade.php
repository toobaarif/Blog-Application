<!-- resources/views/blogs/show.blade.php -->
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
 
    
      

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">{{ $blog->title }}</h2>
            </div>
            <div class="card-body">
                @if ($blog->image)
                    <img src="{{ asset('blog_pic/' . $blog->image) }}" class="img-fluid" style="width: 100%;" alt="{{ $blog->title }}">
                @endif
            </div>
            
            
            
            <div class="card-footer">
                <p class="card-text">{{ $blog->content }}</p>
                <p>Published at: {{ $blog->updated_at->format('Y-m-d') }}</p>
                
                <!-- Show delete button if the logged-in user is the author of the blog -->
                @auth
                @if ($blog->user_id === auth()->id())
                    <form method="POST" action="{{ route('blogs.destroy', $blog->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirmDelete()">Delete</button>
                    </form>
                    <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-primary">Edit</a>
                @elseif (auth()->user()->role === 1)
                    <form method="POST" action="{{ route('blogs.destroy', $blog->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirmDelete()">Delete</button>
                    </form>
                @endif
            @endauth
            
        
            
            </div>
            <script>
                function confirmDelete() {
                    if (confirm("Are you sure you want to delete this blog?")) {
                        document.getElementById("deleteForm").submit();
                        return true;
                    } else {
                        return false;
                    }
                }
            </script>
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
