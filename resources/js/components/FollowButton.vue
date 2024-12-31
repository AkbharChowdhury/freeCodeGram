<template>
    <div>
        <button class="btn btn-primary ml-4 text-capitalize" id="followButton" @click="followUser"
                v-text="btnText"></button>
    </div>
</template>

<script>
export default {
    props: ['userId', 'follows'],
    data: function () {
        return {
            isFollowing: this.follows,
        }

    },

    mounted() {
        console.log('Component mounted.')
    },
    computed: {
        btnText() {
            return this.isFollowing ? 'unfollow' : 'Follow';

        }

    },
    methods: {

        getFollowersCount() {
            axios.get(`/followersCount/${this.userId}`).then(response => {
                document.getElementById('followersCountSpan').innerText = response.data;
            }).catch(error => {
                console.warn(error)

            });

        },
        followUser() {
            axios.post(`/follow/${this.userId}`).then(response => {
                this.isFollowing = !this.isFollowing;
                this.getFollowersCount();
            }).catch(error => {
                if (error.response.status === 401) {
                    window.location = '/login';
                }
            });

        }
    }
}
</script>
