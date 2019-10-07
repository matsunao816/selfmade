<template>
    <div>
        <textarea  v-model="myText"></textarea>
        <p v-bind:style="{color: computedColor}">残り {{ remaining }} 文字です。</p>
    </div>
</template>
<script>
    export default{
        el: '#app',
        data(){
            return{
            myText:''
            }
        },
        computed: {
            // myTextの長さが変わったら、残りの文字数を算出する
            remaining: function() {
                return 140 - this.myText.length;
            },
            // remainingが変わったら、computedColorを算出する
            computedColor: function() {
                //col = "green";
                let col = "green"; // <- letを追加することで解決しました。
                if (this.remaining < 20) {
                    col = "orange";
                }
                if (this.remaining < 1) {
                    col = "red";
                }
                return col;
            }
        }
    }
</script>
