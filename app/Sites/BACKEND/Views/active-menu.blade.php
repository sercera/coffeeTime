<li class="nav-parent">
    <a href="">
        <i class="fa glyphicon glyphicon-globe"></i>
        <span>Kafić</span>
    </a>
    <ul class="children">
        <li>
            <a href="#">Upravljaj korisnicima</a>
        </li>
        <li>
            <a href="{{url(('caffe'))}}">Lista svih kafića</a>
        </li>
        <li>
            <a href="{{url(('caffe/add'))}}">Dodaj novi kafić</a>
        </li>

    </ul>
</li>
<li class="nav-parent">
    <a href="">
        <i class="fa glyphicon glyphicon-book"></i>
        <span>Sto</span>
    </a>
    <ul class="children">
        <li>
            <a href="#"> Lista stolova</a>
        </li>
        <li>
            <a href="{{url(('table/add'))}}"> Dodaj novi sto</a>
        </li>


    </ul>
</li>
<li class="nav-parent">
    <a href="">
        <i class="fa fa-users"></i>
        <span>Radnici</span>
    </a>
    <ul class="children">
        <li>
            <a href="{{url(('employees'))}}"> Lista radnika</a>
        </li>
        <li>
            <a href="{{url(('employees/add'))}}"> Dodaj radnika</a>
        </li>
    </ul>
</li>
