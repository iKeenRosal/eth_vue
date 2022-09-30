<template>
    <div v-if="addAction">
        <div id="addGameContainer">
            <div>
                <h3 class="text-dark">Add a New Game</h3>
                <hr class="bg-info">
                <div class="alert alert-danger" v-if="errorMsg">
                    Error: All fields are required. Please try again..
                </div>
                <div class="alert alert-danger" v-if="errorMsgDuplicate">
                    Invalid: Publisher and Name combination already exists. 
                </div>
                <div class="alert alert-success" v-if="successMsg">
                    Well Done! Game was added successfully. 
                    <br/> Check it out in the List of Games table
                </div>
            </div>
            <div class="text-left">
                <form class="addgame-form text-left" @submit.prevent="onSubmit"> 
                    <div class="form-group">
                        <label for="publisher">Publisher<span class="required">*</span></label>
                        <input class="form-control" id="publisher" v-model="publisher" placeholder="Enter Publisher">
                    </div>
                    <div class="form-group">
                        <label for="name">Name<span class="required">*</span></label>
                        <input class="form-control" id="name" v-model="name" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="nickname">Nickname<span class="required">*</span></label>
                        <input class="form-control" id="nickname" v-model="nickname" placeholder="Enter Nickname">
                    </div>
                    <div class="form-group">
                        <br/>
                        <label for="rating">Rating<span class="required">*</span></label>&nbsp;&nbsp;
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
                        <!-- button type="reset" class="btn btn-secondary" @click="cancelAdd">Cancel</button -->
                        <button type="reset" class="btn btn-secondary" @click="cancelAdd">Cancel</button>
                        &nbsp;&nbsp;
                        <input name="submit" class="btn btn-primary" type="submit" value="Add New Game">
                    </div>
                </form> 
            </div>
        </div>
    </div>
</template>

<script>
export default {
  name: 'AddNewGame',
    computed: {
        allgames() {
            return this.$store.state.allgames;
        },
        addAction() {
            return this.$store.state.addAction;
        }
    },
    data() {
        return {
            publisher: '',
            name: '',
            nickname: '',
            rating: null,
            errorMsgDuplicate: false,
            errorMsg: false,
            successMsg: false,
        }
    },
    methods: {
        onSubmit() {
            if (this.publisher === '' || this.name === '' || this.nickname === '' || this.rating === null || this.rating == '-1') {
                this.successMsg = false;
                this.errorMsgDuplicate = false;
                this.errorMsg = true;
                return
            }

            for(let index=0; index < this.allgames.length; ++index) {
                const element = this.allgames[index];
                if(element.publisher == this.publisher && element.name == this.name) {
                    this.successMsg = false;
                    this.errorMsg = false;
                    this.errorMsgDuplicate = true;
                    return 
                }
            }

            let newgame = {
                publisher: this.publisher,
                name: this.name,
                nickname: this.nickname,
                rating: this.rating,
            }

            newgame.index = this.$store.state.rowCounter;  //this is temporary until we are saving in the database
            this.$store.state.allgames.push(newgame);
            this.$store.state.hasGames = true;
            this.$store.state.rowCounter++;

            this.publisher = '';
            this.name = '';
            this.nickname = '';
            this.rating = null;
            this.errorMsg = false;
            this.errorMsgDuplicate = false;
            this.successMsg = true;
        },
        cancelAdd() {
            this.errorMsgDuplicate = false;
            this.errorMsg = false;
            this.successMsg = false;
        },
    },
}
</script>