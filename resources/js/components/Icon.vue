<template>
    <div v-if="preview">
        <i class="fas fa-angle-double-down fa-5x"></i><br>
        <img v-bind:src="preview" style="width: 200px; height:200px; border-radius: 50%; ">
        <br>
        <label class="btn btn-danger" style="margin:30px 0 15px 0;">
            別のファイルを選択
            <input type="file" name="icon" v-on:change="handleChange">
        </label>
    </div>
    <div v-else>
        <label class="btn btn-danger btn-lg" style="margin:30px 0 15px 0;">
            ファイル選択
            <input type="file" name="icon"  v-on:change="handleChange">
        </label>
    </div>
</template>
<script>
    export default{
        el: '#app',
        data() {
            return {
                preview: ''
            };
        },
        methods: {
            handleChange: function (event) {
            var file = event.target.files[0]
            if (file && file.type.match(/^image\/(png|jpeg)$/)) {
                this.preview = window.URL.createObjectURL(file)
            }
        }
    }
    }
</script>