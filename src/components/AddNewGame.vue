<template>
    <div id="addGameContainer">
        <div>
            <h3 class="text-dark">Add a new game (HTML Version)</h3>
            <hr class="bg-info">
            <div class="alert alert-danger" v-if="errorMsg">
                Error Message
            </div>
            <div class="alert alert-success" v-if="successMsg">
                Success Message
            </div>
        </div>
        <div class="text-left">
            <form method="post" action="" name="create_game">
                <div class="form-group">
                    <label for="gameInputPublisher">Publisher</label>
                    <input type="email" class="form-control" id="gameInputPublisher" placeholder="Enter Publisher">
                </div>
                <div class="form-group">
                    <label for="gameInputName">Name</label>
                    <input type="password" class="form-control" id="gameInputName" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="gameInputNickname">Nickname</label>
                    <input type="password" class="form-control" id="gameInputNickname" placeholder="Enter Nickname">
                </div>
                <div class="form-group">
                    <label for="gameInputNumberRating">Name</label>
                    <input type="password" class="form-control" id="gameInputNumberRating" placeholder="Enter Number Rating">
                </div>
                <div class="form-group">
                    <br/>
                    <button type="submit" class="btn btn-primary">Add Game</button>
                </div>
            </form> 
        </div>
    </div>
</template>

<script>
export default {
  name: 'AddNewGame',
  props: {
    msg: String
  },
  data () {
    return {
        errorMsg: false,
        successMsg: false,
    }
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
