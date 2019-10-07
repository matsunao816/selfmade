<template>
    <div v-if="preview">
        <img v-bind:src="preview" style="width: 100%; margin-top:20px;">
        <label class="btn btn-danger" style="margin:30px 0 15px -20px;">
            別のイラストを選択
            <input type="file" name="image" v-on:change="handleChange">
        </label>
    </div>
    <div v-else>
        <label class="btn btn-danger btn-lg" style="margin:30px 0 15px -20px;">
            イラスト選択
            <input type="file" name="image"  v-on:change="handleChange">
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