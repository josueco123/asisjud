<template>
    <li class="nav-item dropdown" id="markasared">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Notificaciones <span class="badge badge-pill badge-secondary" id="count-notification">
            {{ unreadNotifications.length }}</span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    
          <li style="background-color: lightgray">
            <notification-item v-for="unread in unreadNotifications" :unread="unread" :key="unread.id"> </notification-item>
          </li>
                      
        </div>
    </li>    
</template>
<script>
    import NotificationItem from './NotificationItem.vue';
    export default{
        props:['unreads','userid'],

        components:{NotificationItem},
        data(){
            return {
                unreadNotifications:this.unreads    
            }
        },

        mounted() {

            Echo.private('App.User.' + this.userid).notification((notification) => {
            console.log(notification);
            this.notifications.push(notification)
            let newUnreadNotifications={data:{proceso:notification.proceso}};
            this.UnreadNotifications.push(newUnreadNotifications);
            });
        },

    };
</script>