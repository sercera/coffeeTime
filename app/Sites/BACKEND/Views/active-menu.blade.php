@if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('owner'))

    <li class="nav-parent">
    <a href="">
        <i class="fa fa-coffee"></i>
        <span>Kafići</span>
    </a>
    <ul class="children">
        @if(Auth::user()->hasRole('admin'))
        <li {{ request()->is('/caffe/add') ? 'class=active ' : '' }}>
            <a href="{{url(('/caffe/add'))}}">Dodajte novi kafić</a>
        </li>
        @endif
        <li {{ request()->is('/caffe') ? 'class=active ' : '' }}>
            <a href="{{url(('/caffe'))}}">Lista svih kafića</a>
        </li>
    </ul>
</li>
<li class="nav-parent">
    <a href="">
        <i class="fa fa-users"></i>
        <span>Korisnici</span>
    </a>
    <ul class="children">
        <li {{ request()->is('users/create') ? 'class=active ' : '' }}>
            <a href="{{url(('users/create'))}}"> Dodajte novog korisnika</a>
        </li>
        <li {{ request()->is('users') ? 'class=active ' : '' }}>
            <a href="{{url(('users'))}}"> Lista svih korisnika</a>
        </li>
    </ul>
</li>
@endif

<li class="nav-parent">
    <a href="">
        <i class="fa fa-circle"></i>
        <span>Stolovi</span>
    </a>
    <ul class="children">
        @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('owner'))

        <li {{ request()->is('table/add') ? 'class=active ' : '' }}>

            <a href="{{url(('table/add'))}}"> Dodajte novi sto</a>
        </li>
        @endif
        <li {{ request()->is('table') ? 'class=active ' : '' }}>
            <a href="{{url(('table'))}}"> Lista svih stolova</a>
        </li>
    </ul>
</li>

<li class="nav-parent">
    <a href="">
        <i class="fa fa-beer"></i>
        <span>Proizvodi</span>
    </a>
    <ul class="children">
        @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('owner'))

        <li {{ request()->is('article/add') ? 'class=active ' : '' }}>
            <a href="{{url(('article/add'))}}"> Dodajte novi proizvod</a>
        </li>
        @endif
        <li {{ request()->is('article') ? 'class=active ' : '' }}>
            <a href="{{url(('article'))}}"> Lista svih proizvoda</a>
        </li>
    </ul>
</li>
<li class="nav-parent">
    <a href="">
        <i class="fa fa-book"></i>
        <span>Menu</span>
    </a>
    <ul class="children">
        @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('owner'))

        <li {{ request()->is('/menu/create') ? 'class=active ' : '' }}>
            <a href="{{url(('/menu/create'))}}"> Dodajte novi meni</a>
        </li>
        @endif
        <li {{ request()->is('/menu') ? 'class=active ' : '' }}>
            <a href="{{url(('/menu'))}}"> Lista svih menija</a>
        </li>
    </ul>
</li>
<li class="nav-parent">
    <a href="">
        <i class="fa fa-file-text-o"></i>
        <span>Postovi</span>
    </a>
    <ul class="children">
        <li {{ request()->is('/post/add') ? 'class=active ' : '' }}>
            <a href="{{url(('/post/add'))}}">Dodajte novi post</a>
        </li>
        <li {{ request()->is('/post') ? 'class=active ' : '' }}>
            <a href="{{url(('/post'))}}">Lista svih postova</a>
        </li>
    </ul>
</li>


