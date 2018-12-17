<template>
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Notificaciones <span class="badge badge-pill badge-secondary" id="count-notification">
            {{ procesos.length }}</span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    
            <a class="dropdown-item" href="#" v-on:click="markAsRead(proceso)" v-for="proceso in procesos">
                actulizacion estado 
                {{proceso.data['proceso']['radicacion']}} {{proceso.created_at}}
            </a>

            <a class="dropdown-item" href="#" v-if="procesos.length==0"> no hay notificaciones </a>                       
        </div>
    </li>    
</template>
<script>
    export default{
        props:['procesos'],

        methods: {
            markAsRead: function(proceso){
                var data = {

                    not_id: proceso.id, 
                    proceso_id: proceso.data.proceso.id,
                };

                axios.post("/notification/markasread",data).then(response => {
                    window.location.href="/notification/procesoread/" + data.proceso_id;
                });
            }
        },
    };
</script>