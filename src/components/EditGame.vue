<template>
    <div v-if="editAction">
        <div id="editGameContainer">
            <div>
                <h3 class="text-dark">Edit Game</h3>
                <hr class="bg-info">
                <div class="alert alert-danger" v-if="errorMsg">
                    Error: Failed to update game. Please try again..
                </div>
                <div class="alert alert-danger" v-if="errorMsgDuplicate">
                    Invalid: Publisher and Name combination already exists. 
                </div>
                <div class="alert alert-success" v-if="successMsg">
                    Game was updated successfully
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
                        <select class="bootstraps-select" id="rating" ref="rating"  :value="currentGameData.rating">
                            <option value="-1">Select Rating Here</option>
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="index" ref="index" :value="currentGameData.index">
                        <br/>
                        <button class="btn btn-secondary" @click="cancelChanges">Cancel</button>
                        &nbsp;&nbsp;
                        <button class="btn btn-primary" @click="saveChanges">Save Changes</button>
                    </div>
                </form> 
            </div>
        </div>
    </div>
    
</template>

<script>
export default {
  name: 'EditGame',
  computed: {
    currentGameData() {
        return this.$store.state.currentGameData;
    },  
    allgames() {
        return this.$store.state.allgames;
    },
    editAction() {
        console.log('editAction = ' + this.$store.state.editAction);
        return this.$store.state.editAction;
    }
  },
  data () {
    return {
        errorMsgDuplicate: false,
        errorMsg: false,
        successMsg: false,
    }
  },
  methods: {
    saveChanges() {

      if ( this.$refs['publisher'].value === '' 
        || this.$refs['name'].value === '' 
        || this.$refs['nickname'].value === '' 
        || this.$refs['rating'].value === null || this.$refs['rating'].value == '-1') {
          this.successMsg = false;
          this.errorMsgDuplicate = false;
          this.errorMsg = true;
          return
      }

      for(let index=0; index < this.allgames.length; ++index) {
        const element = this.allgames[index];

        if(element.publisher == this.$refs['publisher'].value && element.name == this.$refs['name'].value
          && element.index != this.$refs['index'].value //and not the current element
        ) {
            this.successMsg = false;
            this.errorMsg = false;
            this.errorMsgDuplicate = true;
            return 
        }
      }

      this.$store.state.currentGameData.publisher = this.$refs['publisher'].value;
      this.$store.state.currentGameData.name = this.$refs['name'].value;
      this.$store.state.currentGameData.nickname = this.$refs['nickname'].value;
      this.$store.state.currentGameData.rating = this.$refs['rating'].value;

      this.successMsg = true;
      this.errorMsg = false;
      this.errorMsgDuplicate = false;
    },
    cancelChanges() {
      this.$store.state.editAction = false;
      this.$store.state.addAction = true;
      return
    }
  }
}
</script>