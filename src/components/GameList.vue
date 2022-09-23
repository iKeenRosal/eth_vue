<template>
    <table class="table table-bordered table-stripped mr-20">
        <thead>
          <tr class="text-center bg-dark text-light">
            <th>Publisher</th>
            <th>Name</th>
            <th>Nickname</th>
            <th>Rating</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <tr class="text-center" v-for="(newgame, index) in newgames" :key="index">
            <td>{{ newgame.publisher }}</td>
            <td>{{ newgame.name }}</td>
            <td>{{ newgame.nickname }}</td>
            <td>{{ newgame.rating }}</td>
            <td><a href="#" class="text-success"><i class="fa fa-edit"></i> id: {{ index }}</a></td>
            <td><a href="#" class="text-danger"><i class="fa fa-trash"></i> id: {{ index }}</a></td>
          </tr>
        </tbody>
    </table>
</template>


<script>
export default {
  name: 'GameList',
  data () {
    return {
    }
  },
  props: {
    newgames: {
      type: Array,
      required: true
    }
  },
  
}
</script>