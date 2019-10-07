<template>
  <div class="container">
    <h4>
      <p v-if="!liked" :disabled="processing" @click.prevent="like(postId)"><i class="far fa-heart text-danger"></i> {{ likeCount }}</p>
      <p v-else :disabled="processing" @click="unlike(postId)"><i class="fas fa-heart text-danger"></i> {{ likeCount }}</p>
    </h4>
  </div>
</template>

<script>
export default {
  props:['postId','userId', 'defaultLiked', 'defaultCount'],
  data() {
      return {
          liked: false,
          likeCount: 0,
          processing: false,
      };
  },
  created () {
      this.liked = this.defaultLiked
      this.likeCount = this.defaultCount
  },
  methods:{
    like(postId){
      //二重送信
      if (this.processing) return;
      this.processing = true;
      this.doSomething()
        .then(() => {
          this.processing = false;
      });
      //処理
      let url=`/api/posts/${postId}/like`
      axios.post(url,{
        user_id: this.userId
      })
      .then(response=>{
        this.liked = true
        this.likeCount = response.data.likeCount
      })
      .catch(error=>{
        alert(error)
      })
    }, 
    unlike(postId){
      //二重送信
      if (this.processing) return;
      this.processing = true;
      this.doSomething()
        .then(() => {
          this.processing = false;
      });
      //処理
      let url=`/api/posts/${postId}/unlike`
      axios.post(url,{
        user_id: this.userId
      })
      .then(response=>{
        this.liked = false
        this.likeCount = response.data.likeCount
      })
      .catch(error=>{
        alert(error)
      })
    },
    //二重送信を防止するため
    doSomething() {
      return new Promise((resolve) => {
        setTimeout(() => {
          console.log(`Submitted on ${new Date()}`);
          resolve();
        }, 500);
      });
    },
  }
}
</script>