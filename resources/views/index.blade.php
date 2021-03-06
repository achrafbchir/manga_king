<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf" value="{{ csrf_token() }}">

        <title>Laravel</title>

        <link rel="icon" href="{{asset('manga_king.jpg')}}" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css')  }}">
        <script src="{{ mix('/js/app.js') }}"></script>

    </head>
    <body>
        <div id="main" class="container-fluid">
            <div class="row">
                @section('sidebar')
                
                <aside class="col-2">
                    <h2>{{__("Manga King")}}</h2>
                    
                    <hr />
                    <div class="nav flex-column nav-pills">
                        <a href="{{route('home')}}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}" id="v-pills-home-tab" data-toggle="pill"  role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fas fa-home"></i> Home</a>
                        <a href="{{route('admin.manga.index')}}" class="nav-link {{ request()->is('admin/manga') || request()->is('admin/manga/*') ? 'active' : '' }}"><i class="fas fa-book"></i> Manga</a>
                        <a href="{{route('admin.categorie.index')}}" class="nav-link {{ request()->is('admin/categorie') || request()->is('admin/categorie/*') ? 'active' : '' }}"><i class="far fa-sticky-note"></i> Categories</a>
                        <a class="nav-link"><i class="fas fa-chart-area"></i> Statistics</a>
                        <a class="nav-link"><i class="fas fa-cog"></i> Settings</a>
                    </div>
                    
                </aside>
                @show

                <section class="col-10">
                    <div class="container-fluid py-5">
                        @yield('content')
                    </div>
                </section>

                {{--
                <section class="col-10">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            Cillum ad ut irure tempor velit nostrud occaecat ullamco aliqua anim Lorem sint. Veniam sint duis incididunt do esse magna mollit excepteur laborum qui. Id id reprehenderit sit est eu aliqua occaecat quis et velit excepteur laborum mollit dolore eiusmod. Ipsum dolor in occaecat commodo et voluptate minim reprehenderit mollit pariatur. Deserunt non laborum enim et cillum eu deserunt excepteur ea incididunt minim occaecat.
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            Culpa dolor voluptate do laboris laboris irure reprehenderit id incididunt duis pariatur mollit aute magna pariatur consectetur. Eu veniam duis non ut dolor deserunt commodo et minim in quis laboris ipsum velit id veniam. Quis ut consectetur adipisicing officia excepteur non sit. Ut et elit aliquip labore Lorem enim eu. Ullamco mollit occaecat dolore ipsum id officia mollit qui esse anim eiusmod do sint minim consectetur qui.
                        </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                            Fugiat id quis dolor culpa eiusmod anim velit excepteur proident dolor aute qui magna. Ad proident laboris ullamco esse anim Lorem Lorem veniam quis Lorem irure occaecat velit nostrud magna nulla. Velit et et proident Lorem do ea tempor officia dolor. Reprehenderit Lorem aliquip labore est magna commodo est ea veniam consectetur.
                        </div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                            Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.
                        </div>
                    </div>
                </section>
                --}}
            </div>
        </div>
        

        <script>
            $(document).ready(function(){
                $('#v-pills-tab a').on('click', function (e) {
                    e.preventDefault()
                    $(this).tab('show')
                })
            })
            
        </script>
    </body>
</html>
