<template>
    <div class="wrap">
        <a class="dropdown-item" :href="procesoUrl" >
           Actualizacion Estado {{unread.data.proceso.radicacion}}
        </a>

    </div>
</template>
<script>
    export default{
        props:['unread'],

        data(){
            return {
                procesoUrl:""
            }
        },

        mounted() {
            this.procesoUrl = "notification/" + this.unread.data.proceso.id +"/"+this.unread.id
        },

    };
</script>