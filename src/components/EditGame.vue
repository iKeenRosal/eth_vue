<template>
    <div id="editGameContainer">
        <div>
            <h3 class="text-dark">Edit Game</h3>
            <hr class="bg-info">
            <div class="alert alert-danger" v-if="errorMsg">
                Error: Failed to update game. Please try again..
            </div>
            <div class="alert alert-success" v-if="successMsg">
                Game was updated
            </div>
        </div>
        <div class="text-left">
            <form class="editgame-form text-left" @submit.prevent="onSubmit" >
                <div class="form-group">
                    <label for="publisher">Publisher<span class="required">*</span></label>
                    <input class="form-control" id="publisher" ref="publisher" :value="currentGameData.publisher">
                </div> 
                <div class="form-group">
                    <label for="name">Name<span class="required">*</span></label>
                    <input class="form-control" id="name" ref="name" :value="currentGameData.name">
                </div>
                <div class="form-group">
                    <label for="nickname">Nickname<span class="required">*</span></label>
                    <input class="form-control" id="nickname" ref="nickname" :value="currentGameData.nickname">
                </div>
                <div class="form-group">
                    <br/>
                    <label for="rating">Rating<span class="required">*</span></label>&nbsp;&nbsp;
                    <select class="bootstraps-select" id="rating" ref="nickname">
                        <option value="-1">Select Rating Here</option>
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </div>
                <div class="form-group">
                    <br/>
                    <input class="btn btn-primary" type="submit" value="Submit Changes">
                </div>
            </form> 
        </div>
    </div>
</template>

<script>
export default {
  name: 'EditGame',
  props: {
    currentGameData: {
      type: Array,
      required: true
    }
  },
  data () {
    return {
        errorMsg: false,
        successMsg: false,
    }
  },
  method () {
  }
}
</script>
<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
