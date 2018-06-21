<template>
    <div class="btn-group">
        <ul>
            <li class="nav-item-dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bell"></i> Notification <span class="badge" id="count-notification">
                                    {{caffes.length}}</span><span class="caret"></span>
                </a>
                <div class="dropdown-contet" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#" v-for="caffe in caffes">
                        {{caffe.data}}
                    </a>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: ['caffes'],
    };
</script>
