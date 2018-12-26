<template>
    <li class="nav-item dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            Notificaciones <span class="badge badge-pill badge-secondary" id="count-notification">
            {{ unreadNotifications.length }}</span>
        </a>

        <ul class="dropdown-menu" role="menu">
                                    
          <li>
            <notification-item v-for="unread in unreadNotifications" :unread="unread" :key="unread.id"> </notification-item>
          </li>
                      
        </ul>
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