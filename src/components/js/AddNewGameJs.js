import { apply } from "core-js/fn/reflect";

apply.component('addgame-form', {
    template:
    /*html*/
    `<form class="addgame-form" @submit.prevent="onSubmit">
        <h3>Create a new game</h3>
        <label for="publisher">Publisher:</label>
        <input id="publisher" v-model="publisher">

        <label for="name">Name:</label>
        <input id="name" v-model="name">

        <label for="nickname">Nickname:</label>
        <input id="nickname" v-model="nickname">

        <label for="rating">Rating:</label>
        <select id="rating" v-model.number="rating">
        <option>5</option>
        <option>4</option>
        <option>3</option>
        <option>2</option>
        <option>1</option>
        </select>

        <input class="button" type="submit" value="Submit">
    </form>`,
    data() {
        return {
            publisher: '',
            name: '',
            nickname: '',
            rating: null
        }
    },
    methods: {
      onSubmit() {
        let productReview = {
            publisher: this.publisher,
            name: this.name,
            nickname: this.nickname,
            rating: this.rating,
        }
        this.$emit('addgame-submitted', productReview)
        
        this.publisher = ''
        this.name = ''
        this.nickname = ''
        this.rating = null
      }
    }
})