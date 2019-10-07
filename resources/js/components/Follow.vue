<template>
    <span>
        <button v-if="!followed" type="button" class="btn btn-primary btn-sm " style="border-radius: 30px;" @click="postFollow()">フォローする</button>
        <button v-else type="button" class="btn btn-primary btn-sm" style="border-radius: 30px;" @click="postUnFollow()">フォロー解除</button>
    </span>
</template>

<script>
    export default {
        props: ['followUser', 'authUser', 'defaultFollowed'],
        data() {
            return {
                followed: false
            }
        },
        created() {
            this.followed = this.defaultFollowed
        },
        methods: {
            postFollow(){
                let url = `/api/users/${this.followUser.id}/follow`

                axios.post(url,{
                    authUser: this.authUser
                })
                    .then(res => {
                        this.followed = true
                    })
                    .catch(err => {})
            },
            postUnFollow(){
                let url = `/api/users/${this.followUser.id}/unfollow`

                axios.post(url,{
                    authUser: this.authUser
                })
                    .then(res => {
                        this.followed = false
                    })
                    .catch(err => {})
            }
        }
    }
</script>
