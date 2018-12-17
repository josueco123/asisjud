<template>
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                Notificaciones <span class="badge badge-pill badge-secondary">1</span>
        </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <li v-for="notification in notifications">
                                            
                        </li>
                 </div>
     </li>
</template>

<script>
    export default {
        props: ['notifications']
    }
</script>
