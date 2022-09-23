<template>
    <div id="searchGameContainer">
        <form class="form-inline">
            <div class="form-group mb-2">
                <label for="searchGame" class="sr-only">Type in keywords to search...</label>
                <input type="text" class="form-control" id="searchGame" placeholder="Enter keyword to search..">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Search</button>
        </form>
    </div>
</template>

<script>
export default {
  name: 'SearchForm',
  data () {
    return {
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
