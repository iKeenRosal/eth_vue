<?php

if(isset($result) && count($result) > 1)
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
        //while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        foreach($result as $row)
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
                        <input type="submit" name="edit_game" value="Edit" />
                    </form>
                </td>
            </tr>
        <?php } ?>

    </table>
<?php } ?>