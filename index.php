<?php

require_once ('includes/GamesClass.php');
$gamesClass = new GamesClass();


if(isset($_POST['submit']))
{
    switch(strtolower($_POST['submit']))
    {
        case 'create game':
            $result = $gamesClass->create($_POST);
            break;
        case 'edit game':
            //hide search result and create form. Show edit form
            $result = $gamesClass->read($_POST);
            break;
        case 'search game': //read
            $search_result = $gamesClass->read($_POST);
            break;
        case 'update game':
            $result = $gamesClass->update($_POST);
            break;
        default:
            // something
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <title>Eth Test</title>
    <link rel="stylesheet" href="assets/site.css">
    <style>
        .search_result, .search_result th {
            width: 200px;
        }
    </style>
</head>
<body>
<div id="main_container">

    <div id="search" style="display:block;">
        <div>
            <form method="post" action="" name="search_game">
                <label>SEARCH GAME</label>
                <div>
                    <input type="text" name="keyword" value="<?php echo (isset($_POST['keyword'])) ? $_POST['keyword'] : ''; ?>" />
                    <input type="submit" name="submit" value="Search Game" />
                </div>
            </form>
        </div>
        <div id="search_result_container">
            <?php

            if(isset($search_result) && count($search_result) > 1)
            {

                ?>
                <table class="search_result">
                    <tr>
                        <th>Publisher</th>
                        <th>Name</th>
                        <th>Nickname</th>
                        <th>Rating</th>
                        <th></th>
                    </tr>
                    <?php
                    //while($row = mysqli_fetch_array($search_result, MYSQLI_ASSOC))
                    foreach($search_result as $row)
                    {

                        ?>
                        <tr>
                            <td><?=$row['publisher']?></td>
                            <td><?=$row['name']?></td>
                            <td><?=$row['nickname']?></td>
                            <td><?=$row['rating']?></td>
                            <td>
                                <form method="post" action="" name="edit_game">
                                    <input type="hidden" name="publisher" value="<?=$row['publisher']?>" />
                                    <input type="hidden" name="name" value="<?=$row['name']?>" />
                                    <input type="submit" name="edit_game" value="Edit Game" />
                                </form>
                            </td>
                        </tr>
                    <?php } ?>

                </table>
            <?php } ?>

        </div>
    </div>
    <br/>
    <hr/>
    <br/>
    <div id="create" style="display:block;">
        <form method="post" action="" name="create_game">
            <label>CREATE GAME</label>
            <div>
                <div><input type="text" name="publisher" placeholder="Enter Publisher"/></div>
                <div><input type="text" name="name" placeholder="Enter Name"/></div>
                <div><input type="text" name="nickname" placeholder="Enter Nickname"/></div>
                <div><input type="text" name="rating" placeholder="Enter Number Rating"/></div>
                <div><input type="submit" name="submit" value="Create Game" /></div>
            </div>
        </form>
    </div>
    <div id="edit" style="display:none;">
        <form method="post" action="" name="update_game">
            <label>EDIT GAME</label>
            <div>
                <div><div>Publisher:</div><div><input type="text" name="publisher" value="<?php echo (isset($game['publisher'])) ? $game['publisher'] : ''; ?>"/></div></div>
                <div><div>Name:</div><div><input type="text" name="name" value="<?php echo (isset($game['name'])) ? $game['name'] : ''; ?>"/></div></div>
                <div><div>Nickname:</div><div><input type="text" name="nickname" value="<?php echo (isset($game['nickname'])) ? $game['nickname'] : ''; ?>"/></div></div>
                <div><div>Rating:</div><div><input type="text" name="rating" value="<?php echo (isset($game['rating'])) ? $game['rating'] : ''; ?>"/></div></div>
                <div><input type="submit" name="submit" value="Update Game" /></div>
            </div>
        </form>
    </div>
</div>
</body>
<footer>
    <script>
        $(document).ready(function(){

        });
    </script>

</footer>
</html>