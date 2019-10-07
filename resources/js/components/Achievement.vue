<template>
<div>
  <img v-bind:src="fileName" style="margin:30px;"><br>
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6 col-lg-4">
        <img src="/img/title1.png" >
        <div >
          <h6 ></h6>
          <h6 ><i class="fas fa-heart text-danger"></i>100</h6>
          <div v-if="likesum>=0" >
            <label class="btn btn-danger"><input type="radio" value="/img/title1.png" v-model="fileName" name="achievement" >
            選択</label>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <img src="/img/title2.png">
        <div >
          <h6 ></h6>
          <h6 ><i class="fas fa-heart text-danger"></i>300</h6>
          <div v-if="likesum>=300" >
            <label class="btn btn-danger"><input type="radio" value="/img/good2.png" v-model="fileName" name="achievement" >
            選択</label>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <img src="/img/title3.png">
        <div >
          <h6 ></h6>
          <h6 ><i class="fas fa-heart text-danger"></i>1000</h6>
          <div v-if="likesum>=1000" >
            <label class="btn btn-danger"><input type="radio" value="/img/good3.png" v-model="fileName" name="achievement" >
            選択</label>
          </div>
        </div>
      </div>
      <!--<div class="col-6 col-md-3 col-lg-2">
        <img style="wicth:100px; height:130px;" src="/img/level1.png">
        <div >
          <h6 ></h6>
          <h6 >Lv:5</h6>
          <div v-if="level>=5" >
            <label class="btn btn-danger"><input type="radio" value="/img/level1.png" v-model="fileName" name="achievement" >
            選択</label>
          </div>
        </div>
      </div>
      <div class="col-6 col-md-3 col-lg-2">
        <img src="/img/level2.png">
        <div >
          <h6 ></h6>
          <h6 >Lv:10</h6>
          <div v-if="level>=10" >
            <label class="btn btn-danger"><input type="radio" value="/img/level2.png" v-model="fileName" name="achievement" >
            選択</label>
          </div>
        </div>
      </div>
      <div class="col-6 col-md-3 col-lg-2">
        <img src="/img/level3.png">
        <div >
          <h6 ></h6>
          <h6 >Lv:15</h6>
          <div v-if="level>=15" >
            <label class="btn btn-danger"><input type="radio" value="/img/level3.png" v-model="fileName" name="achievement" >
            選択</label>
          </div>
        </div>
      </div>
      <div class="col-6 col-md-3 col-lg-2">
        <img src="/img/god2.png">
        <div >
          <h6 ></h6>
          <h6 >Lv:10</h6>
          <h6 ><i class="fas fa-heart text-danger"></i>:300</h6>
          <div v-if="level>=10&&likesum>=200" >
            <label class="btn btn-danger"><input type="radio" value="/img/god2.png" v-model="fileName" name="achievement" >
            選択</label>
          </div>
        </div>
      </div>
      <div class="col-6 col-md-3 col-lg-2">
        <img src="/img/god.png">
        <div >
          <h6 ></h6>
          <h6 >Lv:15</h6>
          <h6 ><i class="fas fa-heart text-danger"></i>:1000</h6>
          <div v-if="level>=20&&likesum>=1000" >
            <label class="btn btn-danger"><input type="radio" value="/img/god.png" v-model="fileName" name="achievement" >
            選択</label>
          </div>
        </div>
      </div>-->
    </div>
  </div>
</div>
</template>
<script>
export default{
  props:['likesum','postsum','level'],
  el: '#app',
		data() {
      return {
				fileName: ''
      };
    },
}
</script>

