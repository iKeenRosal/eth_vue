<template>
    <div id="addGameContainer">
        <div>
            <h3 class="text-dark">Add a New Game</h3>
            <hr class="bg-info">
            <div class="alert alert-danger" v-if="errorMsg">
                Error: All fields are required. Please try again..
            </div>
            <div class="alert alert-success" v-if="successMsg">
                Well Done! Game was added successfully. 
                <br/> Check it out in the List of Games table
            </div>
        </div>
        <div class="text-left">
            <form class="addgame-form text-left" @submit.prevent="onSubmit">
                <div class="form-group">
                    <label for="publisher">Publisher</label>
                    <input class="form-control" id="publisher" v-model="publisher" placeholder="Enter Publisher">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" id="name" v-model="name" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="nickname">Nickname</label>
                    <input class="form-control" id="nickname" v-model="nickname" placeholder="Enter Nickname">
                </div>
                <div class="form-group">
                    <br/>
                    <label for="rating">Rating</label>&nbsp;&nbsp;
                    <select class="bootstraps-select" id="rating" v-model.number="rating">
                        <option value="-1" selected="selected">Select Rating Here</option>
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </div>
                <div class="form-group">
                    <br/>
                    <input class="btn btn-primary" type="submit" value="Add New Game">
                </div>
            </form> 
        </div>
    </div>
</template>

<script>
export default {
  name: 'AddNewGameVersion2',
  props: {
    msg: String
  },
  data() {
        return {
            publisher: '',
            name: '',
            nickname: '',
            rating: null,
            errorMsg: false,
            successMsg: false,
        }
    },
    methods: {
      onSubmit() {
        if (this.publisher === '' || this.name === '' || this.nickname === '' || this.rating === null) {
          this.successMsg = false;
          this.errorMsg = true;
          return
        }

        let gameReview = {
            publisher: this.publisher,
            name: this.name,
            nickname: this.nickname,
            rating: this.rating,
        }
        this.$emit('addgame-submitted', gameReview)
        
        this.publisher = ''
        this.name = ''
        this.nickname = ''
        this.rating = null
        this.errorMsg = ''
        this.successMsg = true
      }
    }
}
</script>