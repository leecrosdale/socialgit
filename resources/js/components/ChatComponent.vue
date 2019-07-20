<template>
    <div class="container">
        <div v-for="chat in chats">
            {{ chat }}
        </div>
    </div>
</template>

<script>
    export default {
        props: ['chat'],
        data() {
            return {
                chats: this.chat
            }
        }
    }
</script>
