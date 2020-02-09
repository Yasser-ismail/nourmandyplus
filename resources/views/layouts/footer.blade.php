<footer class="footer footer-black  footer-white ">
    <div class="container">
        <div class="row">
            <nav class="footer-nav">
                <ul>
                    @if($pages)
                        @foreach($pages as $page)
                            <li>
                                <a href="{{route('front.page', ['slug'=>$page->slug])}}">{{$page->name}}</a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </nav>
            <div class="credits ml-auto">
            <span class="copyright">
              ©
              <script>
                document.write(new Date().getFullYear())
              </script>Normandyplus.com
            </span>
            </div>
        </div>
    </div>
</footer>
